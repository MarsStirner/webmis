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

echo $callback_name ?>(
	{
	"requestData": {
    filter: {
    code: null
    },
    sortingField: null,
    sortingMethod: null,
    limit: "10",
    page: "1",
    recordsCount: "14"
        	}  ,
    	"data": [
			{
				"id": 462,
				"assessmentDate": 1323791987000,
				"assessmentName": {
					"id": 644,
					"name": "К-я офтальмолога"
				},
				"doctor": {
					"id": 1,
					"name": {
						"first": "",
						"last": "Администратор",
						"middle": "",
						"raw": "Администратор "
					},
					"specs": null
				}
			},
			{
				"id": 620,
				"assessmentDate": 1323934045000,
				"assessmentName": {
					"id": 139,
					"name": "Врач приемного отделения"
				},
				"doctor": {
					"id": 1,
					"name": {
						"first": "",
						"last": "Администратор",
						"middle": "",
						"raw": "Администратор "
					},
					"specs": null
				}
			},
			{
				"id": 12796,
				"assessmentDate": 1329387298000,
				"assessmentName": {
					"id": 552,
					"name": "Гематолог - отделение гематологии и депрессий кроветворения"
				},
				"doctor": {
					"id": 181,
					"name": {
						"first": "Анна",
						"last": "Серегина",
						"middle": "",
						"raw": "Серегина Анна "
					},
					"specs": {
						"id": 1,
						"name": "специальность"
					}
				}
			},
			{
				"id": 12905,
				"assessmentDate": 1329463715000,
				"assessmentName": {
					"id": 1463,
					"name": "Лучевой терапевт - отделение лучевой терапии"
				},
				"doctor": {
					"id": 196,
					"name": {
						"first": "Ирина",
						"last": "Курганова",
						"middle": "Николаевна",
						"raw": "Курганова Ирина Николаевна"
					},
					"specs": {
						"id": 59,
						"name": "Радиолог"
					}
				}
			},
			{
				"id": 13031,
				"assessmentDate": 1329488754000,
				"assessmentName": {
					"id": 631,
					"name": "Гематолог - Дневной стационар - дневниковый осмотр"
				},
				"doctor": {
					"id": 283,
					"name": {
						"first": "Алена",
						"last": "Карасева",
						"middle": "Игоревна",
						"raw": "Карасева Алена Игоревна"
					},
					"specs": null
				}
			},
			{
				"id": 14616,
				"assessmentDate": 1329911788000,
				"assessmentName": {
					"id": 1480,
					"name": "Анестезиолог - отделение хирургической анестезиологии и реанимации"
				},
				"doctor": {
					"id": 283,
					"name": {
						"first": "Алена",
						"last": "Карасева",
						"middle": "Игоревна",
						"raw": "Карасева Алена Игоревна"
					},
					"specs": null
				}
			},
			{
				"id": 15719,
				"assessmentDate": 1330506094000,
				"assessmentName": {
					"id": 629,
					"name": "Педиатр - дневной стационар"
				},
				"doctor": {
					"id": 289,
					"name": {
						"first": "Роман",
						"last": "Чумаков",
						"middle": "Васильевич",
						"raw": "Чумаков Роман Васильевич"
					},
					"specs": null
				}
			},
			{
				"id": 15720,
				"assessmentDate": 1330506095000,
				"assessmentName": {
					"id": 630,
					"name": "Гематолог - дневной стационар"
				},
				"doctor": {
					"id": 289,
					"name": {
						"first": "Роман",
						"last": "Чумаков",
						"middle": "Васильевич",
						"raw": "Чумаков Роман Васильевич"
					},
					"specs": null
				}
			},
			{
				"id": 15721,
				"assessmentDate": 1330506095000,
				"assessmentName": {
					"id": 640,
					"name": "Гематолог - Дневной стационар - осмотр после ТГСК"
				},
				"doctor": {
					"id": 289,
					"name": {
						"first": "Роман",
						"last": "Чумаков",
						"middle": "Васильевич",
						"raw": "Чумаков Роман Васильевич"
					},
					"specs": null
				}
			},
			{
				"id": 17655,
				"assessmentDate": 1331476480000,
				"assessmentName": {
					"id": 780,
					"name": "Гематолог - отделение ТГСК - первичный осмотр"
				},
				"doctor": {
					"id": 283,
					"name": {
						"first": "Алена",
						"last": "Карасева",
						"middle": "Игоревна",
						"raw": "Карасева Алена Игоревна"
					},
					"specs": null
				}
			},
			{
				"id": 18528,
				"assessmentDate": 1331724162000,
				"assessmentName": {
					"id": 1480,
					"name": "Анестезиолог - отделение хирургической анестезиологии и реанимации"
				},
				"doctor": {
					"id": 534,
					"name": {
						"first": "Владислав",
						"last": "Щукин",
						"middle": "Владимирович",
						"raw": "Щукин Владислав Владимирович"
					},
					"specs": {
						"id": 4,
						"name": "Анестезиолог-реаниматолог"
					}
				}
			},
			{
				"id": 20033,
				"assessmentDate": 1332311622000,
				"assessmentName": {
					"id": 1495,
					"name": "К-я диетолога"
				},
				"doctor": {
					"id": 517,
					"name": {
						"first": "Татьяна",
						"last": "Хижняк",
						"middle": "Геннадьевна",
						"raw": "Хижняк Татьяна Геннадьевна"
					},
					"specs": null
				}
			},
			{
				"id": 20132,
				"assessmentDate": 1332325374000,
				"assessmentName": {
					"id": 1479,
					"name": "К-я стоматолога"
				},
				"doctor": {
					"id": 1,
					"name": {
						"first": "",
						"last": "Администратор",
						"middle": "",
						"raw": "Администратор "
					},
					"specs": null
				}
			},
			{
				"id": 24701,
				"assessmentDate": 1333526420000,
				"assessmentName": {
					"id": 1508,
					"name": "К-я Врач кабинета лечебной физкультуры"
				},
				"doctor": {
					"id": 517,
					"name": {
						"first": "Татьяна",
						"last": "Хижняк",
						"middle": "Геннадьевна",
						"raw": "Хижняк Татьяна Геннадьевна"
					},
					"specs": null
				}
			}
		]
	}
);
