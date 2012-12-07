<?php
header("Content-Type:application/json; charset=utf-8");

$callback_name = "callback";

if ( !empty($_GET["callback"]) ) {
	$callback_name = $_GET["callback"];
}

echo $callback_name ?>(
	{
		requestData: {},
		data: [{
			id: 170,
			name:   {
				first: "Мария",
				last: "Мартынова",
				middle: "",
				raw: "Мартынова Мария "
			}
		},   {
			id: 171,
			name:   {
				first: "Иван",
				last: "Иванов",
				middle: "Иванович",
				raw: "Иванов Иван Иванович"
			}
		},   {
			id: 172,
			name:   {
				first: "Кирилл",
				last: "Киргизов",
				middle: "Игоревич",
				raw: "Киргизов Кирилл Игоревич"
			}
		},   {
			id: 173,
			name:   {
				first: "Анна",
				last: "Лукьянова",
				middle: "Дмитриевна",
				raw: "Лукьянова Анна Дмитриевна"
			}
		},   {
			id: 174,
			name:   {
				first: "Петр",
				last: "Удалить",
				middle: "",
				raw: "Удалить Петр "
			}
		}]
	}
);
