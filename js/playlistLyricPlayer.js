/**
 *  JS related to lyrics on the playlist
 */
var songName="001_en_peu_de_guerra";

function getLyrics(itemClicked) {
    var songFileName = $(itemClicked).attr("songFileName");
    var lyricPath = getLyricPath(songFileName);
    $.get(lyricPath, function(response) {
        var lyricsFile = response;
        if(lyricsFile!=undefined){
            var itemNumber = $(itemClicked).attr("itemNumber");
            var lyricsItem = $("#lyrics_song_" + itemNumber);
            if (lyricsItem.css("display") == "none") {
                lyricsItem.slideDown(rhythm);
            }
            return lyricsFile;
        }else{
            return false;
        }
    });
}

function loadSong(songName) {
    var songPath = getSongPath(songName);

}

function getLyricPath(songName) {
    return "../src/lyrics/"+songName+".json";
}