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
                    <div id="song_information_<?php echo $i; ?>" itemNumber="<?php echo $i;?> " class="listItem"><p class="listText">song number <?php echo $i; ?></div>
                    <div id="lyrics_song_<?php echo $i; ?>" class="song_lyrics">test</div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>