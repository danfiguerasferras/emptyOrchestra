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
                for ($i=0; $i<25; $i++){
                ?>
                    <div id="song_information_<?php echo $i; ?>" itemNumber="<?php echo $i;?> " class="listItem">
                        <img src="../images/play-button.png" class="play_button" id="play_button_<?php echo $i; ?>">
                        <p class="listText songTitle" id="">song number <?php echo $i; ?></p>
                        <p class="listText songSinger">Song title</p>
                        <p class="listText songAlbum">Other stuff</p>
                        <p class="listText songInfo">YAY!</p>
                    </div>
                    <div id="lyrics_song_<?php echo $i; ?>" class="song_lyrics">test</div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>