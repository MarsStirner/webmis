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
	echo $callback_name ?>({"data":[{"name":{"first":"Алена","last":"Ежова","middle":"Юрьевна","raw":"Ежова Алена Юрьевна"},"id":1,"birthDate":893707200000,"sex":"female","snils":"","idCards":[{"id":1,"number":"364032","date":"","docType":{"name":"СВИД О РОЖД","id":3},"issued":"","series":"I-ГН "},{"id":3,"number":"364032","date":"","docType":{"name":"СВИД О РОЖД","id":3},"issued":"","series":"I ГН"}],"payments":[],"relations":[],"phones":[],"patientCode":1}],"requestData":{"filter":{"document":"","birthDate":"","fullName":"Ежова","patientCode":0},"limit":0,"pagesCount":5,"page":0,"sortingMethod":"","sortingField":""}})
*/


echo $callback_name ?>(
	{
		requestData:   {
			filter:   {
				departmentId: 18,
				doctorId: 241,
				beginDate: 1233522800000,
				endDate: 1434300400000
			},
			sortingField: "",
			sortingMethod: "",
			limit: "10",
			page: "1",
			recordsCount: ""
		},
		data:   [  {
			id: 504,
			number: "2012/81",
			name:   {
				first: "Ян",
				last: "Гертер",
				middle: "Дмитриевич",
				raw: "Гертер Ян Дмитриевич"
			},
			birthDate: 1308340800000,
			hospitalBed:   {
				id: 288,
				department:   {
					id: 27,
					name: "Отделение реанимации и интенсивной терапии"
				},
				room: "",
				bed: "3",
				code: "ОРИТ_3",
				name: "ОРИТ 1 пост 3 койка",
				raw: ""
			},
			doctor:   {
				id: 241,
				name:   {
					first: "Вероника",
					last: "Синицына",
					middle: "Владимировна",
					raw: "Синицына Вероника Владимировна"
				},
				specs:   {
					id: 52,
					name: "Педиатр"
				},
				department:   {
					id: 28,
					name: "Приемное отделение"
				}
			},
			createDateTime: 1327993775000,
			checkOut: ""
		},   {
			id: 515,
			number: "2012/558",
			name:   {
				first: "Александр",
				last: "Ильясов",
				middle: "Константинович",
				raw: "Ильясов Александр Константинович"
			},
			birthDate: 1301515200000,
			hospitalBed:   {
				id: 56,
				department:   {
					id: 18,
					name: "Отделение трансплантации гемопоэтических стволовых клеток №2"
				},
				room: "",
				bed: "1",
				code: "ОТСК2_1",
				name: "Отделение трансплантации стволовых клеток №2 койка 1",
				raw: ""
			},
			doctor:   {
				id: 241,
				name:   {
					first: "Вероника",
					last: "Синицына",
					middle: "Владимировна",
					raw: "Синицына Вероника Владимировна"
				},
				specs:   {
					id: 52,
					name: "Педиатр"
				},
				department:   {
					id: 28,
					name: "Приемное отделение"
				}
			},
			createDateTime: 1332313541000,
			checkOut: ""
		},   {
			id: 436,
			number: "2012/615",
			name:   {
				first: "Никита",
				last: "Черевиченко",
				middle: "Сергеевич",
				raw: "Черевиченко Никита Сергеевич"
			},
			birthDate: 1197234000000,
			hospitalBed:   {
				id: 57,
				department:   {
					id: 18,
					name: "Отделение трансплантации гемопоэтических стволовых клеток №2"
				},
				room: "",
				bed: "2",
				code: "ОТСК2_2",
				name: "Отделение трансплантации стволовых клеток №2 койка 2",
				raw: ""
			},
			doctor:   {
				id: 241,
				name:   {
					first: "Вероника",
					last: "Синицына",
					middle: "Владимировна",
					raw: "Синицына Вероника Владимировна"
				},
				specs:   {
					id: 52,
					name: "Педиатр"
				},
				department:   {
					id: 28,
					name: "Приемное отделение"
				}
			},
			createDateTime: 1332831005000,
			checkOut: ""
		}]
	}
);
