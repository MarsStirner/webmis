<?php
header("Content-Type:application/json; charset=utf-8");


if (isset($_GET) && !empty($_GET["filter"]["patientCode"])) {
	$patientCode = $_GET["filter"]["patientCode"];
}else {
	$patientCode = 1;
}
$callback_name = "callback";

if ( isset($_GET) && !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}
?>
<?php echo $callback_name ?>({"requestData":{},"data":{"id":140,"patientCode":140,"birthDate":1217707200000,"birthPlace":"Ереван","snils":"11223344595","sex":"female","phones":[{"id":122,"typeId":3,"typeName":"мобильный телефон","number":"89250225577111","comment":"мама Ольга"}],"payments":[],"relations":[],"idCards":[],"address":{"registered":{"localityType":0,"kladr":true,"republic":null,"district":null,"city":"7700000000000","locality":null,"street":"","house":"5","building":"2","flat":"37","fullAddress":""},"residential":{"localityType":0,"kladr":true,"republic":null,"district":null,"city":"7700000000000","locality":null,"street":"","house":"2","building":"","flat":"112","fullAddress":""}},"medicalInfo":{"blood":{"id":16,"group":"A(II)Rh+","checkingDate":1325102400000},"allergies":[{"id":18,"substance":"шашлыки","degree":3,"checkingDate":1341950400000,"comment":""}],"drugIntolerances":[{"id":8,"substance":"тест","degree":2,"checkingDate":1341950400000,"comment":""}]},"name":{"first":"Дарья","last":"Мкртычян","middle":"Вадимовна","raw":"Мкртычян Дарья Вадимовна"},"disabilities":[],"occupations":[],"citizenship":{"first":null,"second":null}}})