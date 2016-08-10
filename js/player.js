/**
 * Created by blad3r on 08/08/2016.
 */

// Create array with values from the lyrics JSON
var lyricsArray = [];
for (var prop in lyrics) {
    lyricsArray.push(lyrics[prop]);
}

console.log(lyricsArray);
// Line where the lyric is (by time of the player)
var actualLine = 0;
// Where I store the paragraph items
var catLineParagraphs = 0;
// Timer I use to check the lyrics

function getSecondPlayer() {
    var player = document.getElementById("audioPlayer");
    var currentTime = player.currentTime;
    return currentTime;
}

function getElements() {
    if (catLineParagraphs == 0) {
        catLineParagraphs = [
            document.getElementById("cat_line_1"),
            document.getElementById("cat_line_2"),
            document.getElementById("cat_line_3"),
            document.getElementById("cat_line_4"),
            document.getElementById("cat_line_5")
        ];
        console.log(catLineParagraphs);
    }
}

function setLine(lineNumber) {
    // Check if they sent us the actual line
    if (lineNumber == undefined) {
        lineNumber = getLyricLine();
    }

    getElements();
    for (var i = 0; i <= 4; i++) {
        var lyricLineNumber = lineNumber - 2 + i;

        if (lyrics[lyricLineNumber] != undefined) {
            catLineParagraphs[i].innerHTML = lyrics[lyricLineNumber];
        } else {
            catLineParagraphs[i].innerHTML = "";
        }
    }
    setTimeout(function () {
        setLine();       // repeat
    }, 300)
}

function getLyricLine(timeOnPlayer) {
    // TODO test it!
    if (timeOnPlayer == undefined) {
        timeOnPlayer = getSecondPlayer();
    }
    if (lyricsArray[actualLine] != undefined && timeOnPlayer >= lyricsArray[actualLine]["startTime"] && timeOnPlayer < lyricsArray[actualLine]["endTime"]) {
        return actualLine;
    } else if (lyricsArray[actualLine + 1] != undefined && timeOnPlayer >= lyricsArray[actualLine + 1]["startTime"] && timeOnPlayer < lyricsArray[actualLine + 1]["endTime"]) {
        actualLine++;
        return actualLine;
    } else {
        var res = -1;
        for (var i = 0; i < lyricsArray.size && res==-1; i++){
            if(lyricsArray[i]["startTime"]>=timeOnPlayer && lyricsArray[i]["endTime"]<timeOnPlayer){
                res = i;
                actualLine = res;
            }
        }
        return res;
    }
    return -1;
}