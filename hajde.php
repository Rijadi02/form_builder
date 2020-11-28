<?php

$birthday = htmlspecialchars($_POST["birthday"]);
$time = date("G:i", strtotime(htmlspecialchars($_POST["time"])));
$id = htmlspecialchars($_POST["id"]);

$query = "INSERT INTO table_name(`birthday`, `time`, `id`) VALUES(STR_TO_DATE('$birthday', '%Y-%m-%d'), '$time', '$id');"

?>