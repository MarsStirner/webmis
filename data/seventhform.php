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
?>
<?php
/*
	echo $callback_name ?>({"data":[{"name":{"first":"Алена","last":"Ежова","middle":"Юрьевна","raw":"Ежова Алена Юрьевна"},"id":1,"birthDate":893707200000,"sex":"female","snils":"","idCards":[{"id":1,"number":"364032","date":null,"docType":{"name":"СВИД О РОЖД","id":3},"issued":"","series":"I-ГН "},{"id":3,"number":"364032","date":null,"docType":{"name":"СВИД О РОЖД","id":3},"issued":"","series":"I ГН"}],"payments":[],"relations":[],"phones":[],"patientCode":1}],"requestData":{"filter":{"document":null,"birthDate":null,"fullName":"Ежова","patientCode":0},"limit":0,"pagesCount":5,"page":0,"sortingMethod":null,"sortingField":null}})
*/


echo $callback_name ?>(
	{"requestData":null,"data":{"counts":[{"id":1,"name":{"id":-1,"name":"Всего"},"code":"","deployedBed":30,"closedBed":1,"movement":{"atBeginingLastDay":9,"received":{"summary":0,"fromDayHospital":0,"including":{"villagers":0,"before17age":0,"after60age":0}},"moving":{"from":0,"in":0},"leaved":{"summary":0,"including":{"toOtherHospital":0,"toHourHospital":0,"toDayHospital":0}},"died":0},"atBeginingOfDay":{"summary":9,"mothers":7,"freePlaces":{"male":0,"female":0}}},{"id":2,"name":{"id":4,"name":"Хирургические (общие)"},"code":"28","deployedBed":30,"closedBed":1,"movement":{"atBeginingLastDay":9,"received":{"summary":0,"fromDayHospital":0,"including":{"villagers":0,"before17age":0,"after60age":0}},"moving":{"from":0,"in":0},"leaved":{"summary":0,"including":{"toOtherHospital":0,"toHourHospital":0,"toDayHospital":0}},"died":0},"atBeginingOfDay":{"summary":9,"mothers":7,"freePlaces":{"male":0,"female":0}}}],"patients":{"received":[],"receivedFromHourHospital":[],"leaved":[],"moving":{"toDepartment":[],"toHospital":[]},"died":[],"toVacation":[]}}}
);
