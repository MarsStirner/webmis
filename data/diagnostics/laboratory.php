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
    	"filter": {"code": "2_%"},
    	"sortingField": "id",
    	"sortingMethod": "asc",
    	"limit": 10,
    	"page": 0,
    	"recordsCount": 4,
    	"eventId": 4350,
    	"patientId": 28,
    	"coreVersion": "1.0.0.3"
	},
	"data": [
    	{
        	"id": 8899,
        	"directionDate": 1326830400000,
        	"diagnosticDate": "",
        	"diagnosticName": {
            	"id": 1441,
            	"name": "ИФА исследование"
        	},
        	"urgent": true,
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
        	"status": {
            	"id": 0,
            	"name": "Начато"
        	}
    	},
    	{
        	"id": 9345,
        	"directionDate": 1327003200000,
        	"diagnosticDate": "",
        	"diagnosticName": {
            	"id": 5,
            	"name": "Общий анализ мочи (полный)"
        	},
        	"urgent": true,
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
        	"status": {
            	"id": 0,
            	"name": "Начато"
        	}
    	},
    	{
        	"id": 9346,
        	"directionDate": 1327003200000,
        	"diagnosticDate": 1327003200000,
        	"diagnosticName": {
            	"id": 178,
            	"name": "Анализ мочи (по Нечипоренко)"
        	},
        	"urgent": false,
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
        	"status": {
            	"id": 2,
            	"name": "Закончено"
        	}
    	},
    	{
        	"id": 9347,
        	"directionDate": 1327003200000,
        	"diagnosticDate": "",
        	"diagnosticName": {
            	"id": 181,
            	"name": "Анализ Мочи (по Зимницкому)"
        	},
        	"urgent": false,
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
        	"status": {
            	"id": 3,
            	"name": "Отменено"
        	}
    	}
	]
}
);