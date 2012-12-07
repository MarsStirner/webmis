<?php
header("Content-Type:application/json; charset=utf-8");

//echo file_get_contents('php://input');



if (isset($_GET) && !empty($_GET["filter"]["patientCode"])) {
	$patientCode = $_GET["filter"]["patientCode"];
}else {
	$patientCode = 1;
}
$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}

$rootTypes = <<<EOD
	(
    	{
            "requestData": {
                "filter": {
                    "code": "3",
                    "groupId": 0
                },
                "sortingField": "id",
                "sortingMethod": "asc",
                "limit": 10,
                "page": 1,
                "recordsCount": 0,
                "coreVersion": "1.0.0.5"
            },
            "data": [
                {
                    "id": 94,
                    "groupId": 783,
                    "code": "3_02",
                    "name": "Эндоскопические исследования"
                },
                {
                    "id": 658,
                    "groupId": 783,
                    "code": "3_03",
                    "name": "Функциональная диагностика"
                },
                {
                    "id": 906,
                    "groupId": 783,
                    "code": "3_01",
                    "name": "Лучевая диагностика"
                }
            ]
        }
    );
EOD;

$ray = '({"requestData":{"filter":{"code":"3_01","groupId":0},"sortingField":"id","sortingMethod":"asc","limit":10,"page":1,"recordsCount":0,"coreVersion":"1.0.0.5"},"data":[{"id":123,"groupId":43,"code":"3_1_05","name":"Назначения"},{"id":263,"groupId":43,"code":"3_1_01","name":"Режим"},{"id":264,"groupId":43,"code":"3_1_02","name":"Стол"},{"id":447,"groupId":906,"code":"3_1_4","name":"УЗИ"},{"id":753,"groupId":43,"code":"3_1_04","name":"Инфузионная терапия"},{"id":754,"groupId":43,"code":"3_1_03","name":"Анальгезия"},{"id":907,"groupId":906,"code":"3_1_1","name":"Рентгенография"},{"id":972,"groupId":906,"code":"3_1_2","name":"Магнитнорезонансная томография"},{"id":1078,"groupId":906,"code":"3_1_3","name":"Компьютерная томография"},{"id":1347,"groupId":906,"code":"3_1_5","name":"Радиоизотопная диагностика"}]})';
$endo = '({"requestData":{"filter":{"code":"3_02","groupId":0},"sortingField":"id","sortingMethod":"asc","limit":10,"page":1,"recordsCount":0,"coreVersion":"1.0.0.6"},"data":[{"id":66,"groupId":94,"code":"3_02_01","name":"Эзофагогастродуоденскопия"},{"id":271,"groupId":94,"code":"3_02_06","name":"Еюноскопия"},{"id":287,"groupId":94,"code":"3_02_05","name":"Цистоскопия"},{"id":323,"groupId":94,"code":"3_02_02","name":"Колоноскопия"},{"id":324,"groupId":94,"code":"3_02_03","name":"Ректороманоскопия"},{"id":325,"groupId":94,"code":"3_02_04","name":"Сигмоскопия"},{"id":329,"groupId":94,"code":"_3_02_09","name":"Уреазный дыхательный тест"},{"id":475,"groupId":94,"code":"_3_02_08","name":"Суточный мониторинг PH"},{"id":1491,"groupId":94,"code":"3_02_07","name":"Фиброскопия гортани"},{"id":1492,"groupId":94,"code":"3_02_08","name":"Эндоскопическое исследование носоглотки"}]})';
$func = '({"requestData":{"filter":{"code":"3_03","groupId":0},"sortingField":"id","sortingMethod":"asc","limit":10,"page":1,"recordsCount":0,"coreVersion":"1.0.0.6"},"data":[{"id":59,"groupId":58,"code":"3_3_01","name":"ЛФК"},{"id":60,"groupId":58,"code":"3_3_06","name":"Психотерапия"},{"id":62,"groupId":58,"code":"3_3_05","name":"Физиотерапия"},{"id":64,"groupId":58,"code":"3_3_03","name":"Иглорефлексотерапия"},{"id":102,"groupId":58,"code":"3_3_04","name":"Логопед"},{"id":390,"groupId":58,"code":"3_3_02","name":"Массаж"},{"id":727,"groupId":658,"code":"3_03_02","name":"Эхокардиография"},{"id":728,"groupId":658,"code":"3_03_03","name":"ФВД"},{"id":729,"groupId":658,"code":"3_03_04","name":"КИГ"},{"id":730,"groupId":658,"code":"3_03_05","name":"Суточное мониторирование"}]})';

if (isset($_GET) && !empty($_GET["filter"]["code"])) {
	if ($_GET["filter"]["code"] == "3") {
		echo $callback_name.$rootTypes;
	} else if ($_GET["filter"]["code"] == "3_01") {
		echo $callback_name.$ray;
	} else if ($_GET["filter"]["code"] == "3_02") {
		echo $callback_name.$endo;
	} else if ($_GET["filter"]["code"] == "3_03") {
		echo $callback_name.$func;
	}
}else {
	echo $callback_name.$rootTypes;
}
?>
