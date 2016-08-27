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
});

function hideAllLyrics() {
    $(".song_lyrics").slideUp(200);
}
