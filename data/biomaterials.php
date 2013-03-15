<?php
header("Content-Type:application/json; charset=utf-8");

$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}

echo $callback_name ?>({"requestData":{"filter":{"fullName":""}},"data":[
{id: '1',datetime:1356072424000,fullName: 'Фамилия Имя Отчество',sex: 'М',birthDate: '829512000000',actionType: {name: 'Биохимия крови "МИКРО"',isUrgent:true},testTube: {name:'MONOVETTE 4',color:'#3399cc'},status: {name:'ожидается',code:0}},
{id: '2',datetime:1356072424000,fullName: 'Фамилия Имя Отчество',sex: 'М',birthDate: '829512000000',actionType: {name: 'Биохимия крови "МИКРО"',isUrgent:false},testTube: {name:'MONOVETTE 2',color:'#9999cc'},status: {name:'ожидается',code:0}},
{id: '3',datetime:1356072424000,fullName: 'Фамилия Имя Отчество',sex: 'М',birthDate: '829512000000',actionType: {name:'Биохимия крови "МИКРО"',isUrgent:false},testTube: {name:'MONOVETTE 2',color:'#9999cc'},status: {name:'ожидается',code:0}},
{id: '4',datetime:1356072424000,fullName: 'Фамилия Имя Отчество',sex: 'М',birthDate: '829512000000',actionType: {name: 'Биохимия крови "МИКРО"',isUrgent:true},testTube: {name:'MONOVETTE 2',color:'#9999cc'},status: {name:'выполняется',code:1}},
{id: '5',datetime:1356072424000,fullName: 'Фамилия Имя Отчество',sex: 'М',birthDate: '829512000000',actionType: {name:'Биохимия крови "МИКРО"',isUrgent:false},testTube: {name:'MONOVETTE 2',color:'#9999cc'},status: {name:'закончено',code:2}}]});
