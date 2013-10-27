<?php
namespace Webmis\Controllers\Rls;

// use \Propel;
// use \PDO;
// use \BasePeer;
// use \Criteria;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
// use Webmis\Models\DrugComponentQuery;
use Webmis\Models\RlsBalanceOfGoodsQuery;
use Webmis\Models\rlsNomenQuery;

class RlsController
{

    public function listAction(Request $request, Application $app)
    {

        $page = (int) $request->get('page') ?: 1;
        $limit = (int) $request->get('limit') ?: 20;
        $name = $request->get('name');
        $material = $request->get('material');

        $data = array();

        $items = rlsNomenQuery::create()
        ->useRlsTradeNameQuery()
            ->filterByLocalName($name.'%')
            ->orderByLocalName()
        ->endUse()
        ->with('rlsTradeName')

        ->useRlsActMattersQuery()
            // ->filterByName($material.'%')
        ->endUse()
        ->with('rlsActMatters')

        ->leftJoinWithrlsForm()
        ->leftJoinWithrlsFilling()
        ->leftJoinWithrlsPacking()
        ->leftJoinWithrbUnitRelatedByunitId()

        ->paginate($page, $limit);

        foreach ($items as $item) {
            $i = array(
                'id' => null,
                'tradeName' => '',
                'tradeLocalName' => '',
                'formName' => '',
                'packingName' => '',
                'actMattersName' => '',
                'fillingName' => '',
                'unitCode' => '',
                'unitName' => '',
                'dosageValue' => ''
                );

            $i['id'] = $item->getId();

            if($item->getRlsTradeName()){
                $i['tradeName'] = $item->getRlsTradeName()->getName();
                $i['tradeLocalName'] = $item->getRlsTradeName()->getLocalName();
            }

            if($item->getRlsForm()){
                $i['formName'] = $item->getRlsForm()->getName();
            }

            if ($item->getRlsPacking()) {
                $i['packingName'] = $item->getRlsPacking()->getName();
            }

            if($item->getRlsActMatters()){
                $i['actMattersName'] = $item->getRlsActMatters();
            }

            if($item->getRlsFilling()){
                $i['fillingName'] = $item->getRlsFilling();
            }

            if($item->getRbUnitRelatedByunitId()){
                $i['unitCode'] = $item->getRbUnitRelatedByunitId()->getCode();
                $i['unitName'] = $item->getRbUnitRelatedByunitId()->getName();
            }

            $i['dosageValue'] = $item->getDosageValue();


            $data[] = $i;
        }

        return $app['jsonp']->jsonp(array(
            'data' => $data,
            'request' => array(
                'page' => $page
                ,'limit' => $limit
                ,'count'=> $items->getNbResults()
                )
            ));
    }

    public function readAction(Request $request, Application $app)
    {
        return $app['jsonp']->jsonp(array('message' => 'тут ничего нет, иди домой' ));
    }

    public function balanceAction(Request $request, Application $app)
    {
        $route_params = $request->get('_route_params') ;
        $nomenId = (int) $route_params['nomenId'];
        $data = array();

        $balance = RlsBalanceOfGoodsQuery::create()
        ->filterByRlsNomenId($nomenId)
        ->useRlsNomenQuery('nomen')
            ->leftJoinRlsTradeName('tradeName')
        ->endUse()
        ->with('nomen')
        ->with('tradeName')

        ->leftJoinWithRbStorage()
        ->find();

        foreach ($balance as $item) {
            $tradeLocalName = $item->getRlsNomen()->getRlsTradeName()->getLocalName();

            $data[] = array_merge(
                $item->toArray(),
                array('storageName' => $item->getRbStorage()->getName()),
                array('tradeLocalName' => $tradeLocalName)
                );
        }



        return $app['jsonp']->jsonp(array('data' => $data ));
    }




}
