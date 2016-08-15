<?php
/**
 * Created by PhpStorm.
 * User: blad3r
 * Date: 08/08/2016
 * Time: 18:01
 */

$songToPlayName = "001_en_peu_de_guerra";
?>
<script type="text/javascript">
    // We load the content of the lyricsJson in the variable
    var lyrics = "";
    // TODO check all the file exist, etc.
    lyrics = <?php include_once "../src/lyrics/catalan/".$songToPlayName.".json"; ?>;
    console.log(lyrics);
</script>
<script src="../js/player.js"></script>
<link rel="stylesheet" type="text/css" href="../css/player.css">

<body>
<div class="content">
    <div class="songInformation">
        <div class="songImageDiv">
            <img src="../src/img/<?php echo $songToPlayName; ?>.jpg" id="songImage">
        </div>
        <div class="audioPlayer">
            <audio controls id="audioPlayer">
                <!-- TODO check all the file exist, etc -->
                <source src="../src/music/<?php echo $songToPlayName; ?>.mp3" type="audio/mpeg"/>
                Your browser does not support the audio tag.
            </audio>
        </div>
    </div>
    <div class="lyrics">
        <div id="catalanLyrics">
            <p class="lyricsLanguageTitle">Catalan</p>
            <div class="lyricsContainer">
                <p id="cat_line_1" class="lyricsLine"></p>
                <p id="cat_line_2" class="lyricsLine"></p>
                <p id="cat_line_3" class="actualLyricsLine lyricsLine"></p>
                <p id="cat_line_4" class="lyricsLine"></p>
                <p id="cat_line_5" class="lyricsLine"></p>
            </div>
        </div>
        <div id="spanishLyrics">
            <p class="lyricsLanguageTitle">Spanish</p>
            <div class="lyricsContainer">
                <p id="esp_line_1" class="lyricsLine"></p>
                <p id="esp_line_2" class="lyricsLine"></p>
                <p id="esp_line_3" class="actualLyricsLine lyricsLine"></p>
                <p id="esp_line_4" class="lyricsLine"></p>
                <p id="esp_line_5" class="lyricsLine"></p>
            </div>
        </div>
        <div id="englishLyrics">
            <p class="lyricsLanguageTitle">English</p>
            <div class="lyricsContainer">
                <p id="eng_line_1" class="lyricsLine"></p>
                <p id="eng_line_2" class="lyricsLine"></p>
                <p id="eng_line_3" class="actualLyricsLine lyricsLine"></p>
                <p id="eng_line_4" class="lyricsLine"></p>
                <p id="eng_line_5" class="lyricsLine"></p>
            </div>
        </div>
    </div>
</div>
    <script>
        document.getElementById('audioPlayer').width=1000;
        getElements();
        setLine(0);
    </script>
</body>