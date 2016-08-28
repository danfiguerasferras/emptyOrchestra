<head>
    <meta charset="UTF-8">
    <script src="../js/externalLibraries/jquery.min.js"></script>
    <script src="../js/playlist.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/playlist.css">
</head>
<body>
    <div id="fullPage">
        <div id="menuBar">
            <p id="menuItem">Item of the menu</p>
        </div>
        <div id="playlist">
            <div id="itemList">
                <?php
                foreach ($playlist->getSongs() as $song){
                ?>
                    <div id="song_information_<?php echo $song->id_song; ?>" itemNumber="<?php echo $song->id_song;?> " class="listItem">
                        <img src="../images/play-button.png" class="play_button" id="play_button_<?php echo $song->id_song; ?>" itemNumber="<?php echo $song->id_song; ?>">
                        <p class="listText songTitle" id=""><?php echo $song->name; ?></p>
                        <p class="listText songSinger"><?php echo $song->singer->name; ?></p>
                        <p class="listText songAlbum"><?php echo $song->album->name; ?></p>
                        <p class="listText songFavorite"><?php echo $song->favorite; ?></p>
                    </div>
                    <div id="lyrics_song_<?php echo $song->id_song; ?>" class="song_lyrics">
                        test
                        <audio controls id="audio_player_<?php echo $song->id_song; ?>" class="playlistPlayer">
                            <source src="../src/music/<?php echo $song->file_name; ?>.mp3" type="audio/mpeg"/>
                            Your browser does not support the audio tag.
                        </audio>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>