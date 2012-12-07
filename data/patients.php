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
	   "requestData":{
<?php /*
			"filter": {
				"patientCode": "<?php echo !empty($_GET["filter"]["patientCode"]) ? $_GET["filter"]["patientCode"] : "" ?>",
				"fullName": "<?php echo !empty($_GET["filter"]["fullName"]) ? $_GET["filter"]["fullName"] : "" ?>"
			},
			"page": <?php echo !empty($_GET["page"]) ? $_GET["page"] : "" ?>,
			"pagesCount": 10
*/
?>
		},
	   "data": [
	   		{
			"id":15,
			"patientCode":"12321132",
			"birthDate":3882929,
			"birthPlace":"Москва",
			"snils":"172828",
			"sex":"male",
			"phones":[
				{
					"id":1,
					"number":79051112234,
					"typeId":1,
					"typeName":"mobile",
					"comment":"Коммент"
				}
			],
			"payments":[
				{
					"id":0,
					"policyType":{
						"id":1,
						"name":"ОМС Территориальный"
					},
					"series":"5306",
					"number":"0000002692",
					"smo":{
						"id":3888,
						"name":"ЗАО\"МАКС-М\""
					},
					"issued":"ЗАО\"МАКС-М\""
				}
			],
			"relations":[
				{
					"id":1,
					"phones":[
						{
							"id":1,
							"number":79051112233,
							"typeId":1,
							"typeName":"mobile",
							"comment":"Коммент"
						}
					],
					"name":{
						"first":"Михаил",
						"last":"Прохоров",
						"middle":"Владимирович",
						"raw":"Михаил Владимирович Прохоров"
					},
					"relationType":{
						"id":15,
						"name":"sister"
					}
				}
			],
			"idCards":[
				{
					"id":1,
					"series":"ХЗ123ПО",
					"number":377261,
					"issued":"МВД Магаданской области",
					"date":{
						"start":3882929,
						"end":3882929
					},
					"docType":{
						"id":11,
						"name":"Паспорт гражданина РФ"
					}
				}
			],
			"address":{
				"registered":{
					"house":"10",
					"building":"2a",
					"flat":"303",
					"fullAddress":"Москва, ул. Физиков-теоретиков 12, квартира любая и никакой одновременно",
					"district":"обширный",
					"locality":10,
					"street":5,
					"city":13,
					"republic":7
				},
				"residential":{
					"house":"10",
					"building":"2a",
					"flat":"303",
					"fullAddress":"Москва, ул. Физиков-теоретиков 12, квартира любая и никакой одновременно",
					"site":"обширный",
					"locality":10,
					"street":5,
					"city":13,
					"republic":7
				}
			},
			"name":{
				"first":"Михаил",
				"last":"Прохоров",
				"middle":"Владимирович",
				"raw":"Михаил Владимирович Прохоров"
			},
			"medicalInfo":{
				"blood":{
					"id":1,
					"group":"0(I) Rh-",
					"checkingDate":3882929
				},
				"allergies":[
					{
						"id":1,
						"substance":"Кошачий корм",
						"degree":"Первая",
						"checkingDate":3882929,
						"comment":"Странная сыпь на волосах"
					}
				],
				"drugIntolerances":[
					{
						"id":1,
						"substance":"Кошачий корм",
						"degree":"Первая",
						"checkingDate":3882929,
						"comment":"Странная сыпь на волосах"
					}
				]
			},
			"disabilities":[
				{
					"id":1,
					"comment":"Выглядит подозрительно здоровым",
					"disabilityType":{
						"id":16,
						"name":"Первая группа"
					},
					"rangeDisabilityDate":{
						"start":3882929,
						"end":3882929
					},
					"document":{
						"id":34,
						"name":"Зявление"
					},
					"benefitsCategory":{
						"id":90,
						"name":"Бесплатная еда"
					}
				}
			],
			"occupations":[
				{
					"id":1,
					"comment":"Странный тип",
					"preschoolNumber":"12я",
					"schoolNumber":"33",
					"classNumber":"10Ъ",
					"militaryUnit":"1249",
					"workingPlace":"ООО Гугель",
					"position":"Компьютерщик",
					"socialStatus":{
						"id":18,
						"name":"Дошкольник"
					},
					"rank":{
						"id":16,
						"name":"Генералисимус"
					},
					"forceBranch":{
						"id":24,
						"name":"Политические войска"
					},
					"relationType":{
						"id":22,
						"name":"Брат"
					}
				}
			],
			"citizenship":{
				"first":{
					"id":1,
					"name":"Россия"
				},
				"second":{
					"id":2,
					"name":"Украина"
				}
			}
		}
		]
	}
);
