/**
 * Created by blad3r on 08/08/2016.
 */

// Lyrics will be loaded here
var lyrics = ["test1", "test2", "test3", "test4", "test5", "test6", "test7", "etc"];
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
    }
    console.log(catLineParagraphs);
}

function nextLine() {
    actualLine++;
    setLine(actualLine);
}

function previousLine() {
    actualLine--;
    setLine(actualLine);
}

function setLine(lineNumber) {

    if(lineNumber == undefined){
        lineNumber = getLyricLine();//actualLine;
    }
    console.log("inside setLine "+ lineNumber);
    getElements();
    for (var i = 0; i <= 4; i++) {
        var lyricLineNumber = lineNumber - 2 + i;
        //if(lyricLineNumber >= 0) {
            if(lyrics[lyricLineNumber] != undefined) {
                catLineParagraphs[i].innerHTML = lyrics[lyricLineNumber];
            }else{
                catLineParagraphs[i].innerHTML = "";
            }
        //}
    }
    setTimeout(function() {
        setLine();       // repeat
    }, 300)
}

function getLyricLine(timeOnPlayer) {
    if(timeOnPlayer == undefined){
        timeOnPlayer = getSecondPlayer();
    }
    console.log(timeOnPlayer);
    return(parseInt(timeOnPlayer));
    // TODO create a method to get the line using the time of the player
}