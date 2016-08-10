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
    <audio controls id="audioPlayer">
        <!-- TODO check all the file exist, etc -->
        <source src="../src/music/<?php echo $songToPlayName; ?>.mp3" type="audio/mpeg"/>
        Your browser does not support the audio tag.
    </audio>
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

    <script>
        setLine(0);
    </script>
</body>