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
   "requestData":null,
   "data":{
      "id":15706,
      "number":"2012/794",
      "urgent":true,
      "ambulanceNumber":"2345",
      "rangeAppealDateTime":{
         "start":1345795200000,
         "end":1346396400000
      },
      "patient":{
         "id":1679,
         "patientCode":1679,
         "birthDate":1343764800000,
         "birthPlace":"Прага",
         "snils":"11223344595",
         "sex":"male",
         "phones":[
            {
               "id":1800,
               "typeId":1,
               "typeName":"домашний телефон",
               "number":"54223545",
               "comment":""
            },
            {
               "id":1801,
               "typeId":3,
               "typeName":"мобильный телефон",
               "number":"+7921 112233445",
               "comment":""
            },
            {
               "id":1803,
               "typeId":2,
               "typeName":"рабочий телефон",
               "number":"+78123333333",
               "comment":""
            }
         ],
         "payments":[
            {
               "id":1594,
               "policyType":{
                  "id":1,
                  "name":"ОМС Территориальный"
               },
               "series":"02",
               "number":"12313",
               "smo":{
                  "id":3888,
                  "name":"ЗАО \" МАКС-М\""
               },
               "issued":"ЗАО \"МАКС-М\"",
               "rangePolicyDate":{
                  "start":1344801600000,
                  "end":1439496000000
               },
               "comment":"примечание полиса ОМС"
            },
            {
               "id":1595,
               "policyType":{
                  "id":3,
                  "name":"ДМС"
               },
               "series":"1442",
               "number":"1214235",
               "smo":{
                  "id":3903,
                  "name":"ОАО \"Газпроммедстрах\""
               },
               "issued":"ОАО \"Газпроммедстрах\"",
               "rangePolicyDate":{
                  "start":1344888000000,
                  "end":1377115200000
               },
               "comment":""
            }
         ],
         "relations":[
            {
               "id":6,
               "phones":[
                  {
                     "id":1804,
                     "typeId":1,
                     "typeName":"домашний телефон",
                     "number":"02",
                     "comment":""
                  }
               ],
               "name":{
                  "first":"Эммануил",
                  "last":"Началов",
                  "middle":"Петрович",
                  "raw":"Началов Эммануил Петрович"
               },
               "relationType":{
                  "id":3,
                  "name":"Отец"
               }
            },
            {
               "id":7,
               "phones":[
                  {
                     "id":1802,
                     "typeId":1,
                     "typeName":"домашний телефон",
                     "number":"03",
                     "comment":""
                  }
               ],
               "name":{
                  "first":"Надежда",
                  "last":"Началова",
                  "middle":"Яковлена",
                  "raw":"Началова Надежда Яковлена"
               },
               "relationType":{
                  "id":1,
                  "name":"Мать"
               }
            }
         ],
         "idCards":[
            {
               "id":2507,
               "series":"4010",
               "number":"112233",
               "issued":"",
               "rangeDocumentDate":{
                  "start":1344542400000,
                  "end":1345752000000
               },
               "docType":{
                  "id":1,
                  "name":"ПАСПОРТ РФ"
               }
            }
         ],
         "address":{
            "registered":{
               "localityType":0,
               "kladr":true,
               "republic":null,
               "district":null,
               "city":"0400400000000",
               "locality":null,
               "street":"04004000004000300",
               "house":"13",
               "building":"1",
               "flat":"12",
               "fullAddress":""
            },
            "residential":{
               "localityType":0,
               "kladr":true,
               "republic":null,
               "district":null,
               "city":"0400400001300",
               "locality":null,
               "street":"04004000004000300",
               "house":"13",
               "building":"1",
               "flat":"12",
               "fullAddress":""
            }
         },
         "medicalInfo":{
            "blood":{
               "id":4,
               "group":"A(II)Rh+",
               "checkingDate":1345579200000
            },
            "allergies":[
               {
                  "id":21,
                  "substance":"молоко",
                  "degree":1,
                  "checkingDate":1345060800000,
                  "comment":"молоко любое"
               },
               {
                  "id":22,
                  "substance":"дрожжи",
                  "degree":3,
                  "checkingDate":1344974400000,
                  "comment":"противопоказано категорически"
               }
            ],
            "drugIntolerances":[
               {
                  "id":11,
                  "substance":"аспирин",
                  "degree":3,
                  "checkingDate":1345579200000,
                  "comment":"может умереть"
               },
               {
                  "id":12,
                  "substance":"пумпан",
                  "degree":1,
                  "checkingDate":1345060800000,
                  "comment":"примечание4"
               }
            ]
         },
         "name":{
            "first":"Сигизмунд",
            "last":"Началов",
            "middle":"Эммануилович",
            "raw":"Началов Сигизмунд Эммануилович"
         },
         "disabilities":[
            {
               "id":554,
               "comment":"бессрочно",
               "disabilityType":{
                  "id":308,
                  "name":"Ребенок-инвалид"
               },
               "rangeDisabilityDate":{
                  "start":1343851200000,
                  "end":2702577600000
               },
               "document":{
                  "id":20,
                  "document":"II ИК 634490"
               },
               "benefitsCategory":{
                  "id":89,
                  "category":""
               }
            }
         ],
         "occupations":[
            {
               "id":555,
               "comment":"условно",
               "socialStatus":{
                  "id":4,
                  "status":"В/с не из действ.армии"
               },
               "works":[
                  {
                     "id":1655,
                     "preschoolNumber":null,
                     "schoolNumber":null,
                     "classNumber":null,
                     "militaryUnit":null,
                     "workingPlace":"",
                     "position":"",
                     "rank":null,
                     "forceBranch":null,
                     "relationType":null
                  },
                  {
                     "id":1656,
                     "preschoolNumber":null,
                     "schoolNumber":null,
                     "classNumber":null,
                     "militaryUnit":null,
                     "workingPlace":"",
                     "position":"",
                     "rank":null,
                     "forceBranch":null,
                     "relationType":null
                  }
               ]
            }
         ],
         "citizenship":{
            "first":{
               "id":556,
               "socStatusType":{
                  "id":72,
                  "name":"Албания"
               },
               "comment":""
            },
            "second":{
               "id":557,
               "socStatusType":{
                  "id":75,
                  "name":"Восточное Самоа (США)"
               },
               "comment":""
            }
         }
      },
      "appealType":{
         "id":168,
         "name":"Дневной стационар"
      },
      "agreedType":{
         "id":174,
         "name":""
      },
      "agreedDoctor":"Теплухов И.В.",
      "assignment":{
         "assignmentDate":1345579200000,
         "number":"123",
         "directed":"Врач по месту жительства",
         "doctor":"Иванов-Пассе"
      },
      "hospitalizationType":{
         "id":133,
         "name":""
      },
      "hospitalizationPointType":{
         "id":135,
         "name":""
      },
      "hospitalizationChannelType":{
         "id":-1,
         "name":null
      },
      "hospitalizationWith":[
         {
            "id":"1679"
         }
      ],
      "deliveredType":"Самостоятельно",
      "deliveredAfterType":"течении 7-24 часов",
      "movingType":"Может идти",
      "stateType":"155",
      "physicalParameters":{
         "height":61,
         "weight":38,
         "temperature":3500,
         "bloodPressure":{
            "left":"77",
            "right":"88"
         }
      },
      "diagnoses":[
         {
            "diagnosisKind":"assignment",
            "description":"клин описание направительного диагноза",
            "injury":"",
            "mkb":{
               "code":"A17.0",
               "diagnosis":"Туберкулезный менингит (G01*)"
            }
         },
         {
            "diagnosisKind":"aftereffect",
            "description":"клин описание Диагноз направившего учреждения",
            "injury":"",
            "mkb":{
               "code":"G43.0",
               "diagnosis":"Мигрень без ауры [простая мигрень]"
            }
         },
         {
            "diagnosisKind":"attendant",
            "description":"сопутствующий",
            "injury":"",
            "mkb":{
               "code":"Q10.0",
               "diagnosis":"Врожденный птоз"
            }
         }
      ],
      "injury":"бытовая",
      "ward":null,
      "totalDays":null
   }
}
);
