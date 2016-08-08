/**
 * Created by blad3r on 08/08/2016.
 */

function hello(){
    alert("hello");
}

function getSecondPlayer(){
    var player = document.getElementById("audioPlayer");
    var currentTime = player.currentTime;
    console.log(currentTime);
    alert(currentTime);
    return currentTime;
}