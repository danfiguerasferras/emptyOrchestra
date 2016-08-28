<?php
include_once("config.php");
$mysql_link = mysqli_connect(MYSQL_IP, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE_NAME);

if (!$mysql_link) {
echo "We were not able to connect to the DB" . PHP_EOL;
echo "Errno error: " . mysqli_connect_errno() . PHP_EOL;
echo "Depuration error: " . mysqli_connect_error() . PHP_EOL;
exit;
}