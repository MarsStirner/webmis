<?php
	$callback_name = "callback";

	if ( isset($_GET) && !empty($_GET["callback"]) ) {
		$callback_name = $_GET["callback"];
	}
?>
<?php echo $callback_name ?>([{
	"value": "1-",
	"text": "0(I)Rh-"
},
{
	"value": "1+",
	"text": "0(I)Rh+"
},
{
	"value": "2-",
	"text": "A(II)Rh-"
},
{
	"value": "2+",
	"text": "A(II)Rh+"
},
{
	"value": "3-",
	"text": "B(III)Rh-"
},
{
	"value": "3+",
	"text": "B(III)Rh+"
},
{
	"value": "4-",
	"text": "AB(IV)Rh-"
},
{
	"value": "4+",
	"text": "AB(IV)Rh+"
}])