<?php
header("Content-Type:application/json; charset=utf-8");

$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}

echo $callback_name ?>(
	{
		requestData: {},
		data: [ {
			id: 1,
			name: "ФНКЦ ДГОИ"
		},   {
			id: 3,
			name: "Стационар"
		},   {
			id: 15,
			name: "Регистратура"
		},   {
			id: 16,
			name: "Кабинеты врачей"
		},   {
			id: 17,
			name: "Отделение трансплантации гемопоэтических стволовых клеток №1"
		},   {
			id: 18,
			name: "Отделение трансплантации гемопоэтических стволовых клеток №2"
		},   {
			id: 19,
			name: "Отделение гематологии и депрессий кроветворения"
		},   {
			id: 20,
			name: "Отделение онкогематологии"
		}]
    }
);
