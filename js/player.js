/**
 * Created by blad3r on 08/08/2016.
 */

// Create array with values from the lyrics JSON
var lyricsArray = [];
for (var prop in lyrics) {
    lyricsArray.push(lyrics[prop]);
}
var languages = ["catalan", "spanish", "english"];
//console.log(lyricsArray);
// Line where the lyric is (by time of the player)
var actualLine = 0;
// Where I store the paragraph items
var lineParagraphs = 0;

// Player variable to store the item
var player;

function getSecondPlayer() {
    var currentTime = player.currentTime;
    return currentTime;
}

function getElements() {
    if (player == undefined) {
        player = document.getElementById("audioPlayer");
    }

    if (lineParagraphs == 0) {
        lineParagraphs = [];
        for (var i = 0; i < languages.length; i++) {
            var temporalArray = [];
            for (var j = 1; j <= 5; j++) {
                temporalArray.push($("#" + languages[i] + "_line_" + j));
            }
            console.log(languages[i]);
            lineParagraphs[languages[i]] = temporalArray;
        }
        console.log(lineParagraphs);
    }
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

        if (lyrics[lyricLineNumber] != undefined) {
            for (var j = 0;j<languages.length;j++){
                console.log(lineParagraphs[languages[j]][i]);
                lineParagraphs[languages[j]][i].html(lyrics[lyricLineNumber]["content"][languages[j]]);
            }
        } else {
            for (var j = 0;j<languages.length;j++) {
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