<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/playlist.css">
    <script src="../js/externalLibraries/jquery.min.js"></script>
    <script src="../js/playlist.js"></script>
</head>
<body>
<div id="fullPage">
    <div id="menuBar">
        <p class="menuItem" id="salutation">Hello <?php echo ucfirst($_SESSION["user_name"]); ?></p>
        <p class="menuItem" id="quote"><?php echo $quoteClass->value; ?></p>
    </div>
    <div id="quoteList">
        <p>Quote List</p>
        <?php
        $i = 0;
        foreach ($quotesSeen as $qs) {
            $i++;
            $qs["timesSeen"]==0?$value="???":$value=$qs["value"];
            echo '<p>Nº' . $i . ' - Seen ' . $qs["timesSeen"] . ' times: ' . $value . '</p>';
        }
        ?>
    </div>
    <div id="playlist">
        <div class="hidden" id="songPlayer">
            <audio controls id="audio_player" class="playlistPlayer">
                <source id="audio_player_source" src="" type="audio/mpeg"/>
                Your browser does not support the audio tag.
            </audio>
        </div>
        <div id="itemList">
            <?php
            foreach ($playlist->getSongs() as $song) {
                ?>
                <div id="song_information_<?php echo $song->id_song; ?>" itemNumber="<?php echo $song->id_song; ?> "
                     class="listItem">
                    <img src="../images/play-button.png" class="play_button"
                         id="play_button_<?php echo $song->id_song; ?>" songName="<?php echo $song->file_name; ?>"
                         itemNumber="<?php echo $song->id_song; ?>">
                    <p class="listText songTitle" id=""><?php echo $song->name; ?></p>
                    <p class="listText songSinger"><?php echo $song->singer->name; ?></p>
                    <p class="listText songAlbum"><?php echo $song->album->name; ?></p>
                    <p class="listText songFavorite"><?php echo $song->favorite; ?></p>
                </div>
                <div id="lyrics_song_<?php echo $song->id_song; ?>" class="song_lyrics">
                    test
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>