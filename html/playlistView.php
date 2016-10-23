<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/playlist.css">
    <link rel="stylesheet" type="text/css" href="../css/playlistLyricPlayer.css">
    <script src="../js/externalLibraries/jquery.min.js"></script>
    <script src="../js/playlist.js"></script>
    <script src="../js/playlistLyricPlayer.js"></script>
</head>
<body>
<div id="fullPage">
    <div id="emptyOrchestraLogo">
        <p id="emptyOrchestraTitle">Empty Orchestra</p>
        <p id="salutation">Hello <?php echo ucfirst($_SESSION["user_name"]); ?></p>
    </div>
    <div id="menuBar">
        <p class="menuItem" id="quote"><?php echo $quoteClass->value; ?></p>
    </div>
    <div id="quoteList">
        <p>Quote List</p>
        <?php
        $i = 0;
        $totalSeen = 0;
        $totalSeenNotUnique = 0;
        foreach ($quotesSeen as $qs) {
            $i++;
            if ($qs["timesSeen"] == 0) {
                $value = "???";
                $justShown = false;
            } else {
                $value = $qs["value"];
                $justShown = ($value == $quoteClass->value) ? true : false;
                $totalSeen++;
                $totalSeenNotUnique += $qs["timesSeen"];
            }
            $classJustSeen = $justShown?' justSeen':'';
            echo '<p class="quoteContent'.$classJustSeen.'">Nº' . $i . ' - Seen ' . $qs["timesSeen"] . ' times: ' . $value . '</p>';
        }
        /**
         * Calculating the resume
         * */
        $percent = 100 / $i * $totalSeen;
        $percent = round($percent);
        echo '<p>Has visto ' . $totalSeenNotUnique . ' quotes de las cuales ' . $totalSeen . ' sin repetir, te quedan ' . ($i - $totalSeen) . ' quotes por ver de un total de ' . $i . '.</p>';
        echo '<p>Has desbloqueado un ' . $percent . '% de las quotes!</p>';

        /**
         * Showing a nice Cheer-up message
         */
        $cheerUpMessage = '';
        if ($percent == 100) {
            $cheerUpMessage = 'OMG!! Muy bien cariño! Las has desbloqueado todas! I\'m so proud of you! ^^';
        } elseif ($percent > 95) {
            $cheerUpMessage = 'Vamos que ya estás en la recta final! Un ultimo esfuerzo!';
        } elseif ($percent > 85) {
            $cheerUpMessage = 'Va mi vida que ya casi lo tienes!';
        } elseif ($percent > 75) {
            $cheerUpMessage = 'Venga cariño que solo te falta un poquitito más!';
        }
        echo '<p>' . $cheerUpMessage . '</p>';
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
            <div id="song_information_title" class="listItem">
                <p class="listTitle songTitle">Title</p>
                <p class="listTitle songSinger">Artist</p>
                <p class="listTitle songAlbum">Album</p>
                <p class="listTitle songFavorite">Favorite</p>
            </div>
            <?php
            foreach ($playlist->getSongs() as $song) {
                ?>
                <div id="song_information_<?php echo $song->id_song; ?>" itemNumber="<?php echo $song->id_song; ?> "
                     class="listItem" songFileName="<?php echo $song->file_name; ?>">
                    <img src="../images/play-button.png" class="play_button"
                         id="play_button_<?php echo $song->id_song; ?>" songName="<?php echo $song->file_name; ?>"
                         itemNumber="<?php echo $song->id_song; ?>">
                    <p class="listText songTitle" id=""><?php echo $song->name; ?></p>
                    <p class="listText songSinger"><?php echo $song->singer->name; ?></p>
                    <p class="listText songAlbum"><?php echo $song->album->name; ?></p>
                    <p class="listText songFavorite"><?php echo $song->favorite; ?></p>
                </div>
                <div id="lyrics_song_<?php echo $song->id_song; ?>" class="song_lyrics">
                    <div class="lyrics">
                    <?php
                    $languages = ["catalan", "spanish", "english"];
                    $totalLines = 5;
                    $middleLine = round($totalLines/2, 0, PHP_ROUND_HALF_DOWN); // Get the middle line
                    foreach($languages as $language){
                        echo '<div id="'.$language.'Lyrics">';
                        echo '<p class="lyricsLanguageTitle">'.ucfirst($language).'</p>';
                        for ($i=0;$i<$totalLines;$i++){
                            $classMiddle = ($i==$middleLine)?'actualLyricsLine ':'';
                            echo '<p id="'.$language.'_line_'.($i+1).'" class="'.$classMiddle.'lyricsLine"></p>';
                        }
                        echo '</div>';
                    }
                    ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>