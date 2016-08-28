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
        var itemNumber = $(this).attr("itemNumber");
        var playerItem = document.getElementById("audio_player_"+itemNumber);
        // get the value before the pause to avoid the permanent play
        var paused = playerItem.paused;
        // Pause everything
        pauseAllSongs();

        // If it's paused, play. If not, pause.
        if(paused){
            playerItem.play();
            this.src = "../images/pause-button.png";
        }else{
            playerItem.pause();
            this.src = "../images/play-button.png";
        }
        // Avoid the div to slide down (when not specified)
        return false;
    });
});

function hideAllLyrics() {
    $(".song_lyrics").slideUp(200);
}

function pauseAllSongs() {
    $(".playlistPlayer").trigger("pause");
}