$(document).ready(function(){
    $(".listItem").click(function () {
        hideAllLyrics();
        var itemNumber = $(this).attr("itemNumber");
        var lyricsItem = $("#lyrics_song_"+itemNumber);
        if(lyricsItem.css("display") == "none"){
            lyricsItem.slideDown(200);
        }else{
            lyricsItem.slideUp(200);
        }

    });

    $(".play_button").click(function () {
        pauseAllSongs();
        var itemNumber = $(this).attr("itemNumber");
        var playerItem = $("#audio_player_"+itemNumber);
        playerItem.trigger("play");
    });
});

function hideAllLyrics() {
    $(".song_lyrics").slideUp(200);
}

function pauseAllSongs() {
    $(".playlistPlayer").trigger("pause");
}