<?php
namespace Webmis\Controllers\Rls;

// use \Propel;
// use \PDO;
// use \BasePeer;
// use \Criteria;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
// use Webmis\Models\DrugComponentQuery;
// use Webmis\Models\DrugChartQuery;
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
            ->filterByName($material.'%')
        ->endUse()
        ->with('rlsActMatters')

        ->JoinWithrlsForm()
        ->JoinWithrlsFilling()
        ->JoinWithrlsPacking()
        ->JoinWithrbUnitRelatedByunitId()

        ->paginate($page, $limit);

        foreach ($items as $item) {

            $data[] = array(
                'id' => $item->getId(),
                'tradeName' => $item->getRlsTradeName()->getName(),
                'tradeLocalName' => $item->getRlsTradeName()->getLocalName(),
                'formName' => $item->getRlsForm()->getName(),
                'packingName' => $item->getRlsPacking()->getName(),
                'actMattersName' => $item->getRlsActMatters()->getName(),
                'fillingName' => $item->getRlsFilling()->getName(),
                'unitCode' => $item->getRbUnitRelatedByunitId()->getCode(),
                'unitName' => $item->getRbUnitRelatedByunitId()->getName(),
                'dosageValue' => $item->getDosageValue()
                );
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




}
