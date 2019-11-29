/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
"use strict";


var loser = null; // whether the user has hit a wall
let isStart = false;

window.onload = function() {
  var boundaryList = $$(".boundary");
  for (var i = 0; i < boundaryList.length; i++) {
    boundaryList[i].onmouseover = overBoundary;
  }

  $("end").onmouseover = overEnd;
  $("start").onclick = startClick;
  $("maze").onmouseout = overBody;


};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
  if (isStart) {
    var boundaries = $$(".boundary");
    loser = true;
    if (loser) {
      for (var i = 0; i < boundaries.length - 1; i++) {
        boundaries[i].addClassName("youlose");
      }
    }
  }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
  loser = null;
  isStart = true;
  var boundaryList = $$(".boundary");
  $("status").innerText = "Let's go end block"
  for (var i = 0; i < boundaryList.length; i++) {
    boundaryList[i].removeClassName("youlose");
  }
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
  isStart = false;
  var h2Tag = $("status");
  if (!loser) {
    h2Tag.innerText = "You win! :)";
  } else {
    h2Tag.innerText = "You lose! :(";
  }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
  var body = event.element();
  if(body === document.body){
    console.log("overBody");
    if(isStart){
      overBoundary(event);
    }
  }
}
