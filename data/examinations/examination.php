<?php
header("Content-Type:application/json; charset=utf-8");

$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}
?>
<?php

echo $callback_name ?>(
{
    "requestData": {},
   "data":{
      "groupList":[
         {
            "id":12345,
            "type":"mainPage",
            "name":"Имя группы",
            "title":"заголовок группы",
            "designIsVisible":"true",
            "parentID":{},
            "childList":[
               {
                  "type":"hGroup",
                  "id":1,
                  "layoutProperties":{
                     "order":1,
					 "hAlign":"left",
                     "vAlign":"bottom",
                     "hSize":"small",
                     "visible":"true",
                     "adParams":[
                        {
                           "name":"hSimbolsCount",
                           "value":"15"
                        },
                        {
                           "name":"mask",
                           "value":"[12345]"
                        }
                     ]
                  }
               }
            ]
         }
      ],
      "guiElementList":[
         {
            "id":"1059",
			"name":"Patient Nose Status",
			"title":"Patient Nose Status",
            "type":"editBox",
            "readOnly":"false",
            "mandatory":"true",
            "mask":"//",
            "datasourceType":"value",
            "datasourceParams":[
               {
                  "name":"flatDictionaryID",
                  "value":5
               }
            ],
            "widgetName":"Widget X",
			"widgetParams":[
               {
                  "name":"flatDictionaryID",
                  "value":8
               }
            ],
			"adParams":[
               {
                  "name":"Something",
                  "value":"Somewhere"
               }
            ]

         }
      ],
      "adParams":[
         {
            "name":"examinationID",
            "value":"23141"
         }
      ],
      "guiElementDataList":[
         {
            "guiElementID":1059,
            "sourceDataList":[
			   {
                  "id":"321"
                  "title":"Мокрый и холодный"
               },
               {
                  "id":"2345",
                  "title":"Сухой и горячий"
               }
            ],
            "valueList":[
               {
                  "type":"valueString",
                  "name":"ID in List",
                  "value":12345
               }
            ]
         }
      ]
   }
})