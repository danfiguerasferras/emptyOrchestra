<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 08/08/2016
 * Time: 18:01
 */
?>
<script src="../js/player.js"></script>
<link rel="stylesheet" type="text/css" href="../css/player.css">

<body>
    <audio controls id="audioPlayer" onplay="startLyricTrack();" onpause="stopLyricTrack();">
        <source src="../src/music/001_en_peu_de_guerra.mp3" type="audio/mpeg"/>
        Your browser does not support the audio tag.
    </audio>
    <button name="test" onclick="javascript:getSecondPlayer();">Test</button>
    <div id="catalanLyrics">
        <p class="lyricsLanguageTitle">Language: Catalan</p>
        <div class="lyricsContainer">
            <p id="cat_line_1" class="lyricsLine"></p>
            <p id="cat_line_2" class="lyricsLine"></p>
            <p id="cat_line_3" class="actualLyricsLine lyricsLine"></p>
            <p id="cat_line_4" class="lyricsLine"></p>
            <p id="cat_line_5" class="lyricsLine"></p>
        </div>
    </div>

    <button name="test2" onclick="javascript:previousLine();">Test -></button>
    <button name="test3" onclick="javascript:nextLine();">Test <-</button>

    <script>
        setLine(0);
    </script>
</body>