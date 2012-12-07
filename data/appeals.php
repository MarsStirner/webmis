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
	{
		"requestData": {
			"filter": {
				"fullName": "",
				"patientCode": ""
			}
		},
	   "data": [
			{
			  "id":13,
			  "number":"2012/1224",
			  "urgent":true,
			  "ambulanceNumber":"а12",
			  "rangeAppealDateTime":{
				 "end":1515161,
				 "start":1526272
			  },
			  "patient":{
				 "id":14,
				 "name": {
					"first": "Ололош",
					"last": "Мягкий",
					"middle": "Сокович"
				},
				"sex": "male"
			  },
			  "appealType":{
				 "id":1,
				 "name":"срочный"
			  },
			  "relations":[
				 {
					"id":1,
					"relationType":{
					   "id":1,
					   "name":"sister"
					}
				 }
			  ],
			  "agreedType":{
				 "id":1,
				 "name":"заведующий"
			  },
			  "assignment":{
				 "assignmentDate":142526262,
				 "number":"2012/1224",
				 "mkb":{
					"code":"dgydsh1535",
					"diagnosis":"Опухоль левого предушья"
				 },
				 "directed":{
					"id":1,
					"name":"УПЧК"
				 },
				 "doctor":{
					"id":1,
					"name":{
					   "first":"Александр",
					   "middle":"Виссарионович",
					   "last":"Сталин",
					   "raw":"Филипп Филиппыч Преображенский"
					}
				 }
			  },
			  "hospitalizationType":{
				 "id":1,
				 "name":"в плановом порядке"
			  },
			  "hospitalizationPointType":{
				 "id":1,
				 "name":"Лечение"
			  },
			  "hospitalizationChannelType":{
				 "id":1,
				 "name":"канал госпитализации"
			  },
			  "deliveredType":{
				 "id":1,
				 "name":"Самостоятельно"
			  },
			  "deliveredAfterType":{
				 "id":1,
				 "name":"Через 12 часов"
			  },
			  "stateType":{
				 "id":1,
				 "name":"состояние при поступлении"
			  },
			  "drugsType":{
				 "id":1,
				 "name":"Наркотического"
			  },
			  "physicalParameters":{
				 "height":161.4,
				 "weight":87.5,
				 "temperature":36.6,
				 "bloodPressure":{
					"left":"120/80",
					"right":"120/80"
				 }
			  },
			  "branchType":{
				 "id":1,
				 "name":"Гематологическое отделение"
			  },
			  "placeType":{
				 "id":1,
				 "name":"Хирургический"
			  },
			  "diagnoses":[
				 {
					"diagnosisKind":"main",
					"description":"Клиническое описание",
					"injury":"Травма",
					"mkb":{
					   "code":"tst1717",
					   "diagnosis":"Расстройство"
					}
				 }
			  ],
			  "agreedDoctor":{
				 "id":1
			  }

			  }
	   		]

	}
);
