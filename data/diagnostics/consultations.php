<?php
header("Content-Type:application/json; charset=utf-8");

if (isset($_GET) && !empty($_GET["filter"]["patientCode"])) {
	$patientCode = $_GET["filter"]["patientCode"];
}else {
	$patientCode = 1;
}
$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}

echo $callback_name ?>(
{
	"requestData": {
    	"filter": {"code": "1_3_%"},
    	"sortingField": "id",
    	"sortingMethod": "asc",
    	"limit": 10,
    	"page": 0,
    	"recordsCount": 1,
    	"eventId": 4350,
    	"patientId": 28,
    	"coreVersion": "1.0.0.3"
	},
	"data": [{
    	"id": 23745,
    	"diagnosticDate": 1333350963000,
    	"diagnosticName": {
        	"id": 1479,
        	"name": "К-я стоматолога"
    	},
    	"assignPerson": {
			id: 123,
			name: {
				"first": "Гарик",
				"last": "Гаспарян",
				"middle": "Норайрович",
				"raw": "Гаспарян Гарик Норайрович"
			}
		},
		"execPerson": {
			id: 321,
			name: {
				"first": "Жорик",
				"last": "Вартанов",
				"middle": "Арапетович",
				"raw": "Вартанов Жорик Арапетович"
			}
		},
		urgent: true,
    	"office": "",
    	"status": {
        	"id": 2,
        	"name": "Закончено"
    	}
	}]
}
);