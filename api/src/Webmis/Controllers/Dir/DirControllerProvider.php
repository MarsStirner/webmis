<?php
namespace Webmis\Controllers\Dir;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class DirControllerProvider implements ControllerProviderInterface
{
	public function connect(Application $app)
	{
		// creates a new controller based on the default route
		$controllers = $app['controllers_factory'];

		//справочник QuotaType
		$controllers->get('/quotaType', function(Request $request)  use ($app){

			$callback = $request->query->get('callback');
			$callback = $callback ? $callback : 'callback';

			$mkbId = $request->query->get('mkbId');

			$teenOlder = (int) ($request->query->get('teenOlder'));
			$teenOlder = $teenOlder ? $teenOlder : 0;

			$select_sql = "SELECT qt.id, qt.code, qt.name FROM QuotaType AS qt WHERE qt.teenOlder = :teenOlder";

			$select_sql_with_mkb = "SELECT qt.id, qt.code, qt.name FROM MKB_QuotaType_PacientModel AS mmm "
			."JOIN QuotaType AS qt ON qt.id = mmm.quotaType_id "
			."WHERE mmm.MKB_id = :mkbId AND qt.teenOlder = :teenOlder";


			if($mkbId){
				$statement = $app['db']->prepare($select_sql_with_mkb);
				$statement->bindValue('mkbId', $mkbId);
			}else{
				$statement = $app['db']->prepare($select_sql);
			}


			$statement->bindValue('teenOlder', $teenOlder);
			$statement->execute();
			$quotaType = $statement->fetchAll();


			return $app->json(array('data'=>$quotaType))->setCallback($callback);

		});



		//справочник rbResult
		$controllers->get('/result', function(Request $request)  use ($app){

			$callback = $request->query->get('callback');
			$callback = $callback ? $callback : 'callback';

			$appealId = $request->query->get('appealId');

			$select_sql = "SELECT rbResult.id,rbResult.name FROM rbResult";

			$select_sql_with_purpose = "SELECT r.id, r.name FROM Event as e "
			."join EventType as et on e.eventType_id = et.id "
			."join rbResult as r on r.eventPurpose_id = et.purpose_id "
			."where e.id = :appealId";

			if($appealId){
				$statement = $app['db']->prepare($select_sql_with_purpose);
				$statement->bindValue('appealId', $appealId);
			}else{
				$statement = $app['db']->prepare($select_sql);
			}

			$statement->execute();
			$result = $statement->fetchAll();


			return $app->json(array('data'=>$result))->setCallback($callback);

		});


		//справочник rbTreatment
		$controllers->get('/treatment', function(Request $request)  use ($app){

			$callback = $request->query->get('callback');
			$callback = $callback ? $callback : 'callback';

			$pacientModelId = $request->query->get('pacientModelId');

			$select_sql = "SELECT rbTreatment.id,rbTreatment.name FROM rbTreatment";

			$select_sql_with_pacientModelId = "SELECT rbTreatment.id,rbTreatment.name FROM rbTreatment WHERE pacientModel_id = :pacientModelId";

			if($pacientModelId){
				$statement = $app['db']->prepare($select_sql_with_pacientModelId);
				$statement->bindValue('pacientModelId', $pacientModelId);

			}else{
				$statement = $app['db']->prepare($select_sql);
			}

			$statement->execute();
			$treatment = $statement->fetchAll();


			return $app->json(array('data'=>$treatment))->setCallback($callback);

		});


		//справочник rbPacientModel
		$controllers->get('/pacient_model', function(Request $request)  use ($app){//?dictName=pacientModel

			$callback = $request->query->get('callback');
			$callback = $callback ? $callback : 'callback';

			$quotaTypeId = $request->query->get('quotaTypeId');
			$mkbId = $request->query->get('mkbId');

			// quotaTypeId

			$select_sql = "SELECT pm.id,pm.name FROM rbPacientModel AS pm";

			$select_sql_with_quotaTypeId = "SELECT DISTINCT pm.* FROM MKB_QuotaType_PacientModel as mmm "
			."JOIN rbPacientModel AS pm ON mmm.pacientModel_id = pm.id "
			."WHERE mmm.quotaType_id = :quotaTypeId AND mmm.MKB_id = :mkbId";

			if($quotaTypeId && $mkbId){
				$statement = $app['db']->prepare($select_sql_with_quotaTypeId);
				$statement->bindValue('quotaTypeId', $quotaTypeId);
				$statement->bindValue('mkbId', $mkbId);
			}else{
				$statement = $app['db']->prepare($select_sql);
			}


			$statement->execute();
			$pacientModel = $statement->fetchAll();


			return $app->json(array('data'=>$pacientModel))->setCallback($callback);

		});





		return $controllers;
	}
}
