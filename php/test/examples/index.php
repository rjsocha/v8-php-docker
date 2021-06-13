<?php

$v8 = new V8Js();

/* basic.js */
$JS = <<< EOT
len = print('Hello' + ' ' + 'World from PHP/V8!' + "\\n");
len;
EOT;

try {
	  var_dump($v8->executeString($JS, 'basic.js'));
} catch (V8JsException $e) {
	  var_dump($e);
}

?>
