<?php
include_once(dirname(__FILE__)."/mysqlConfig.php");
$mysql_link = mysqli_connect(MYSQL_IP, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE_NAME);

if (!$mysql_link) {
    echo "We were not able to connect to the DB" . PHP_EOL;
    echo "\n";
    echo "Errno error: " . mysqli_connect_errno() . PHP_EOL;
    echo "\n";
    echo "Depuration error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if (!$mysql_link->set_charset("utf8mb4")) {
    printf("Error loading utf8 charset: %s\n", $mysqli->error);
    exit();
}