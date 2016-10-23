<?php
/*
include_once "../models/menu/quoteClass.php";
include_once "../config/mysql/connection.php";

$qc = new quoteClass($mysql_link);
$qc->getSeenQuotes(2);*/
?>
<script src="../js/externalLibraries/jquery.min.js"></script>
<script>
    $.get("../src/lyrics/001_en_peu_de_guerra.json", function(response) {
        var logfile = response;
        console.log(response);
    });
</script>