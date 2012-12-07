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
    	"filter": {"code": "3_%"},
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
    	"id": 7342,
    	"diagnosticDate": 1324966331000,
    	"diagnosticName": {
        	"id": 733,
        	"name": "Электрокардиография"
    	},
    	"assignPerson": {
        	"id": 312,
        	"name": {
            	"first": "Юлия",
            	"last": "Демидова",
            	"middle": "Владимировна",
            	"raw": "Демидова Юлия Владимировна"
        	}
    	},
    	"execPerson": {
        	"id": 312,
        	"name": {
            	"first": "Юлия",
            	"last": "Демидова",
            	"middle": "Владимировна",
            	"raw": "Демидова Юлия Владимировна"
        	}
    	},
    	"office": "",
    	"urgent": true,
    	"status": {
        	"id": 4,
        	"name": "Без результата"
    	}
	}]
}
);