<?php
$connect = new mysqli('localhost', 'root', NULL, 'orms');


if ($connect->connect_error)
	echo '<div>An errors occurred conecting with MySqli: ' . $connect->connect_error . '</div>';
