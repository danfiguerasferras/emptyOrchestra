<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 08/08/2016
 * Time: 18:01
 */
?>
<script src="../js/player.js"></script>

<body>
    <audio controls id="audioPlayer" onplay="hello();">
        <source src="../src/001_en_peu_de_guerra.mp3" type="audio/mpeg"/>
        Your browser does not support the audio tag.
    </audio>
    <button name="test" onclick="javascript:getSecondPlayer();">Test</button>
</body>