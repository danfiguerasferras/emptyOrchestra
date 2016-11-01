/**
 *  JS related to lyrics on the playlist
 */

var lineParagraphs;
var player;
var languages = ["catalan", "spanish", "english"];
var lyricsArray = [];
var actualLine;
var lyrics = "";
var hasLyrics = false;


function getLyrics(itemClicked) {
    var songFileName = $(itemClicked).attr("songName");
    var lyricPath = getLyricPath(songFileName);
    cleanCurrentLyrics();
    $.get(lyricPath, function(response) {
        var lyricsFile = response;
        if(lyricsFile!=undefined){
            var itemNumber = $(itemClicked).attr("itemNumber");
            var lyricsItem = $("#lyrics_song_" + itemNumber);
            loadLyrics(lyricsFile, itemNumber);
            if (lyricsItem.css("display") == "none") {
                lyricsItem.slideDown(rhythm);
            }
            return true;
        }else{
            hasLyrics = false;
            return false;
        }
    });
}

function cleanCurrentLyrics(){
    if(lineParagraphs!=undefined){
        for (var i = 0; i < languages.length; i++) {
            for (var j = 0; j < 4; j++){
                lineParagraphs[languages[i]][j].html("");
            }
        }
    }
}

function loadLyrics(lyricsFile, itemNumber){
    getElements(itemNumber);
    lyricsArray = lyricsFile;
    player = document.getElementById("audio_player");
    setLine(0);
}

function getElements(songId) {
    if (player == undefined) {
        player = document.getElementById("audio_player");
    }

    lineParagraphs = [];
    for (var i = 0; i < languages.length; i++) {
        var temporalArray = [];
        for (var j = 1; j <= 5; j++) {
            temporalArray.push($("#" + songId+ "_" + languages[i] + "_line_" + j));
        }
        lineParagraphs[languages[i]] = temporalArray;
    }
    console.log(lineParagraphs);
}

function setLine(lineNumber) {
    // Check if they sent us the actual line
    if (lineNumber == undefined) {
        lineNumber = getLyricLine();
    }

    // If we have no line, let's pretend it's 0
    if (lineNumber == -1) {
        console.log("Error, for some reason the lineNumber it's -1");
        lineNumber = 0;
    }

    for (var i = 0; i <= 4; i++) {
        var lyricLineNumber = lineNumber - 2 + i;

        if (lyricsArray[lyricLineNumber] != undefined) {
            for (var j = 0; j < languages.length; j++) {
                //console.log(lineParagraphs[languages[j]][i]);
                lineParagraphs[languages[j]][i].html(lyricsArray[lyricLineNumber]["content"][languages[j]]);
            }
        } else {
            for (var j = 0; j < languages.length; j++) {
                lineParagraphs[languages[j]].innerHTML = "";
            }
        }
    }
    setTimeout(function () {
        setLine();       // repeat
    }, 100)

}

function getLyricLine(timeOnPlayer) {
    if (timeOnPlayer == undefined) {
        timeOnPlayer = getSecondPlayer();
    }
    // If same line
    if (lyricsArray[actualLine] != undefined && timeOnPlayer >= lyricsArray[actualLine]["startTime"] && timeOnPlayer < lyricsArray[actualLine]["endTime"]) {
        return actualLine;
        // If next line
    } else if (lyricsArray[actualLine + 1] != undefined && timeOnPlayer >= lyricsArray[actualLine + 1]["startTime"] && timeOnPlayer < lyricsArray[actualLine + 1]["endTime"]) {
        actualLine++;
        return actualLine;
        // If I don't know the line
    } else {
        var res = -1;
        for (var i = 0; i <= lyricsArray.length && res == -1; i++) {
            if (lyricsArray[i]["startTime"] <= timeOnPlayer && lyricsArray[i]["endTime"] > timeOnPlayer) {
                res = i;
                actualLine = res;
            }
        }
        //console.log(res);
        return res;
    }
    return -1;
}

function getLyricPath(songName) {
    return "../src/lyrics/"+songName+".json";
}

function getSecondPlayer() {
    var currentTime = player.currentTime;
    return currentTime;
}