var rhythm = 600; /* Time it takes to slide the tabs */

$(document).ready(function(){
    /**
     * Song related
     */
    $(".listItem").click(function () {
        hideAllLyrics();
        getLyrics(this);
    });

    $(".play_button").click(function () {
        var shouldIReloadSong = playPauseSong(this);
        if(shouldIReloadSong){
            loadSong($(this).attr("songName"));
        }
        return false;
    });

    $(".song_lyrics").click(function () {
        $(this).slideUp("fast");
    });

    /**
     * Quote related
     */

    $("#menuBar").click(showQuoteList);

    $("#quoteList").click(hideQuoteList);

});



function showQuoteList() {
    var quoteList = $("#quoteList");
    if(quoteList.css("display") == "none"){
        quoteList.slideDown(rhythm);
    }else{
        quoteList.slideUp(rhythm);
    }
}

function hideQuoteList() {
    $(this).slideUp(rhythm);
}

function hideAllLyrics() {
    $(".song_lyrics").slideUp(rhythm);
}

function playPauseSong(playButton) {
    var player = document.getElementById("audio_player");
    var actualPlaying= $("#audio_player_source").attr("src");
    var songToPlay = getSongPath($(playButton).attr("songName"));
    var shouldIReloadSong = false;

    if (actualPlaying == songToPlay){
        if (player.paused) {
            $(playButton).attr("src", "../images/pause-button.png");
            player.play();
        }else{
            player.pause();
            $(playButton).attr("src", "../images/play-button.png");
        }
    }else{
        $("#audio_player").trigger("pause");
        $(".play_button").attr("src", "../images/play-button.png");
        $(playButton).attr("src", "../images/pause-button.png");
        shouldIReloadSong = true;
    }
    return shouldIReloadSong;
}

function loadSong(songName) {
    var songPath = getSongPath(songName);
    $.get(songPath).done(function () {
        $("#audio_player_source").attr("src", songPath);
        $("#audio_player").trigger("load");
        $("#audio_player").trigger("play");
    }).fail(function () {
        alert("You tryin' to troll the troll?");
    });
}

function getSongPath(songName) {
    return "../src/music/"+songName+".mp3";
}