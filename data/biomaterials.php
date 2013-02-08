<?php
header("Content-Type:application/json; charset=utf-8");

$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}

echo $callback_name ?>({"requestData":{"filter":{"fullName":""}},"data":[
{id: '1',fullName: 'Фамилия И.О.',sex: 'М',birthDate: '829512000000',actionType: 'Биохимия крови "МИКРО"',testTube: {name:'MONOVETTE 4',color:'#3399cc'},status: 'ожидается'},
{id: '2',fullName: 'Фамилия И.О.',sex: 'М',birthDate: '829512000000',actionType: 'Биохимия крови "МИКРО"',testTube: {name:'MONOVETTE 2',color:'#9999cc'},status: 'ожидается'}]});
