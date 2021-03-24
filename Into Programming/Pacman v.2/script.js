//Pacman variable
var pacman={px:1,py:1};
var {px,py} = pacman;

//Ghost variables
var ghost = [
    {
        Blinky:{bx:12,by:5}
    },
    {
        Pinky:{px:13,py:5}
    }
];
var {Blinky} = ghost[0];
var {Pinky} = ghost[1];


//score
var score = 0;
var gameover = false;
//World Variable
let wNumber = numberGenerator(5);
var worlds = [
    {//World 1
        map: [[2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2],
                    [2,0,1,1,1,1,2,1,1,1,2,2,2,2,2,2,1,1,1,2,1,1,1,1,1,2],				
                    [2,1,2,2,2,1,2,1,2,1,1,1,1,1,1,1,1,2,1,2,1,2,2,2,1,2],
                    [2,1,2,2,2,1,2,1,2,1,2,2,3,1,2,2,1,2,1,2,1,2,2,2,1,2],
                    [2,1,1,1,1,1,2,1,2,1,1,2,2,2,2,1,1,2,1,2,1,1,1,1,1,2],
                    [2,1,2,2,2,1,1,1,2,1,1,1,0,0,1,1,1,2,1,1,1,2,2,2,1,2],
                    [2,1,1,1,1,1,2,1,2,1,1,2,1,1,2,1,1,2,1,2,1,1,1,1,1,2],
                    [2,1,2,2,2,1,2,1,2,1,2,2,1,1,2,2,1,2,1,2,1,2,2,2,1,2],				
                    [2,1,2,2,2,1,2,1,2,1,1,1,1,1,1,1,1,2,1,2,1,2,2,2,1,2],
                    [2,1,1,1,1,1,2,1,1,1,2,2,2,2,2,2,1,1,1,2,1,1,1,1,1,2],
                    [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]],
        cherryPosition: {cx:12,
                         cy:3},
        brickImage: 'brick1.png'
    },
    { //World 2
        map: [[2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2],
                    [2,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],				
                    [2,1,1,1,2,1,2,1,1,2,2,2,2,2,2,2,1,1,1,1,2,2,1,1,1,2],
                    [2,1,1,1,2,1,2,1,1,2,1,1,1,1,1,1,1,1,1,2,1,1,2,1,1,2],
                    [2,1,1,1,2,1,2,1,1,2,1,2,2,2,2,1,1,1,2,1,1,1,1,2,1,2],
                    [2,1,2,1,2,1,2,1,1,2,1,2,0,0,2,1,1,1,2,1,1,3,1,2,1,2],
                    [2,1,2,1,2,1,2,1,1,2,1,2,1,1,2,1,1,1,2,1,2,2,1,2,1,2],
                    [2,1,2,1,1,1,2,1,1,2,1,1,1,1,1,1,1,1,2,1,2,2,1,2,1,2],				
                    [2,1,2,2,2,2,2,1,1,2,2,2,2,2,2,2,1,1,2,1,2,2,1,2,1,2],
                    [2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],
                    [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]],
        cherryPosition: {cx:21,
                         cy:5}
    },
    { //World 3
        map: [[2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2],
                    [2,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],				
                    [2,1,2,2,1,1,2,1,1,1,1,2,2,2,1,1,1,1,1,2,1,1,2,2,1,2],
                    [2,1,2,2,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,2,2,1,2],
                    [2,1,1,1,1,1,1,1,1,1,1,2,2,2,2,1,1,1,1,1,1,1,1,1,1,2],
                    [2,2,2,1,1,1,1,2,2,2,1,2,0,0,2,1,2,2,1,1,1,1,1,2,2,2],
                    [2,1,1,1,1,1,1,1,1,1,1,2,1,1,2,1,1,1,1,1,1,1,1,1,1,2],
                    [2,1,2,2,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,2,2,1,2],				
                    [2,1,2,2,1,1,2,1,1,1,1,2,2,2,2,1,1,1,1,2,1,1,2,2,1,2],
                    [2,1,1,1,1,1,1,1,1,1,1,1,3,1,1,1,1,1,1,1,1,1,1,1,1,2],
                    [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]],
        cherryPosition: {cx:12,
                         cy:9}
    },
    { //World 4
        map: [[2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2],
                    [2,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],				
                    [2,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,2],
                    [2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],
                    [2,1,2,1,2,2,1,2,1,2,1,2,1,1,2,1,2,1,2,1,2,2,1,2,1,2],
                    [2,1,2,1,1,1,1,1,1,1,1,1,0,0,1,1,1,1,1,1,1,1,1,2,1,2],
                    [2,1,2,1,2,2,1,2,1,2,1,2,3,1,2,1,2,1,2,1,2,2,1,2,1,2],
                    [2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],				
                    [2,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,2],
                    [2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],
                    [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]],
        cherryPosition: {cx:12,
                         cy:6},
    },			
     { //World 5
        map: [[2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2],
                    [2,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2],				
                    [2,1,1,2,2,1,1,2,1,2,1,2,1,1,2,1,2,1,2,1,1,2,2,1,1,2],
                    [2,2,1,1,1,2,1,2,1,2,1,2,1,1,2,1,2,1,2,1,2,1,1,1,2,2],
                    [2,1,1,2,1,1,1,1,1,1,1,2,2,2,2,1,1,1,1,1,1,1,2,1,1,2],
                    [2,1,1,2,1,1,1,2,2,2,1,1,0,0,1,1,2,2,2,1,1,1,2,1,1,2],
                    [2,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,2],
                    [2,1,1,1,1,2,2,2,1,1,1,1,2,2,1,1,1,1,2,2,2,1,1,1,1,2],				
                    [2,1,1,1,1,2,2,2,1,2,2,1,2,2,1,2,2,1,2,2,2,1,1,1,1,2],
                    [2,1,1,1,1,1,1,1,1,2,2,1,3,1,1,2,2,1,1,1,1,1,1,1,1,2],
                    [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]],
        cherryPosition: {cx:12,
                         cy:9},
    }
];

function numberGenerator (num){
let generatedNum = Math.floor(Math.random()*num);
return generatedNum;
}


Start();
function Start(){
displayWorld();
displayPacman();
displayGhost();
}

function Update(){
displayWorld();
displayPacman();
displayScore();
displayCherry();
}

setInterval(() => {
if (gameover == false) {
    moveGhost();
}
}, 200);

function displayScore(){
document.querySelector('.points').innerHTML = score;
console.log(score);
}

function displayCherry(){
if(score >= 150 ){
    document.querySelector('.cherry').style.left = worlds[wNumber].cherryPosition.cx*20 +'px';		
    document.querySelector('.cherry').style.top = worlds[wNumber].cherryPosition.cy*20 +'px';
    document.querySelector('.cherry').style.visibility = 'visible';
}
}

function displayGhost(){
document.getElementById('ghost1').style.left = Blinky.bx*20 +'px';		
document.getElementById('ghost1').style.top = Blinky.by*20 +'px';
document.getElementById('ghost2').style.left = Pinky.px*20 +'px';		
document.getElementById('ghost2').style.top = Pinky.py*20 +'px';
}

function displayPacman(){
document.getElementById('pacman').style.left = pacman.px*20 +'px';		
document.getElementById('pacman').style.top = pacman.py*20 +'px';
}

function displayWorld(){
let output ='';	
for (let i = 0; i < worlds[wNumber].map.length; i++) {
    output+='<div class="row" style="height: 20px">\n';
    for (let j = 0; j < worlds[wNumber].map[i].length; j++) {
        if (worlds[wNumber].map[i][j] == 0) {
            output+='<div class="empty"></div>';
        } else if (worlds[wNumber].map[i][j] == 1) {
            output+='<div class="coin"></div>';					
        } else if (worlds[wNumber].map[i][j] == 2) {
            output+='<div class="brick"></div>';	
        } else if (worlds[wNumber].map[i][j] == 3){
            output+='<div class="cherry"></div>';
        }					
    }
    output+='</div>';
}
document.getElementById('world').innerHTML = output;		
}

//GhostMovement
function moveGhost(){
//Blinky movement
if(Blinky.bx > pacman.px && Blinky.by > pacman.py){ //Pacman is in Top Left
    if (worlds[wNumber].map[Blinky.by][Blinky.bx - 1] != 2) { //Ghost will go Left
        Blinky.bx--;
    } else if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    } else if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    }
} else if(Blinky.bx == pacman.px && Blinky.by > pacman.py){ //Pacman is in Top
    if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    } else if (worlds[wNumber].map[Blinky.by][Blinky.bx - 1] != 2) { //Ghost will go Left
        Blinky.bx--;
    } else if (worlds[wNumber].map[Blinky.by][Blinky.bx + 1] != 2) { //Ghost will go Right
        Blinky.bx++;
    }
} else if(Blinky.bx < pacman.px && Blinky.by > pacman.py){ //Pacman is in Top Right
    if (worlds[wNumber].map[Blinky.by][Blinky.bx + 1] != 2) { //Ghost will go Right
        Blinky.bx++;
    } else if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    } else if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    }
} else if(Blinky.bx < pacman.px && Blinky.by == pacman.py){ //Pacman is in Right
    if (worlds[wNumber].map[Blinky.by][Blinky.bx + 1] != 2) { //Ghost will go Right
        Blinky.bx++;
    } else if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    } else if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    }
} else if(Blinky.bx < pacman.px && Blinky.by < pacman.py){ //Pacman is in Bottom Right
    if (worlds[wNumber].map[Blinky.by][Blinky.bx + 1] != 2) { //Ghost will go Right
        Blinky.bx++;
    } else if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    } else if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    }
} else if(Blinky.bx == pacman.px && Blinky.by < pacman.py){ //Pacman is in Bottom
    if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    } else if (worlds[wNumber].map[Blinky.by][Blinky.bx - 1] != 2) { //Ghost will go Left
        Blinky.bx--;
    } else if (worlds[wNumber].map[Blinky.by][Blinky.bx + 1] != 2) { //Ghost will go Right
        Blinky.bx++;
    }
} else if(Blinky.bx > pacman.px && Blinky.by < pacman.py){ //Pacman is in Bottom Left
    if (worlds[wNumber].map[Blinky.by][Blinky.bx - 1] != 2 && Blinky.bx - 1 >= 1) { //Ghost will go Left
        Blinky.bx--;
    } else if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    } else if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    }
} else if(Blinky.bx > pacman.px && Blinky.by == pacman.py){ //Pacman is in Left
    if (worlds[wNumber].map[Blinky.by][Blinky.bx - 1] != 2) { //Ghost will go Left
        Blinky.bx--;
    } else if (worlds[wNumber].map[Blinky.by + 1][Blinky.bx] != 2) { //Ghost will go Down
        Blinky.by++;
    } else if (worlds[wNumber].map[Blinky.by - 1][Blinky.bx] != 2) { //Ghost will go Up
        Blinky.by--;
    }
}

//Pinky Movements
if(Blinky.bx > pacman.px && Pinky.py > pacman.py){ //Pacman is in Top Left
    if (worlds[wNumber].map[Pinky.py][Pinky.px - 1] != 2) { //Ghost will go Left
        Pinky.px--;
    } else if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    } else if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    }
} else if(Pinky.px == pacman.px && Pinky.py > pacman.py){ //Pacman is in Top
    if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    } else if (worlds[wNumber].map[Pinky.py][Pinky.px - 1] != 2) { //Ghost will go Left
        Pinky.px--;
    } else if (worlds[wNumber].map[Pinky.py][Pinky.px + 1] != 2) { //Ghost will go Right
        Pinky.px++;
    }
} else if(Pinky.px < pacman.px && Pinky.py > pacman.py){ //Pacman is in Top Right
    if (worlds[wNumber].map[Pinky.py][Pinky.px + 1] != 2) { //Ghost will go Right
        Pinky.px++;
    } else if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    } else if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    }
} else if(Pinky.px < pacman.px && Pinky.py == pacman.py){ //Pacman is in Right
    if (worlds[wNumber].map[Pinky.py][Pinky.px + 1] != 2) { //Ghost will go Right
        Pinky.px++;
    } else if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    } else if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    }
} else if(Pinky.px < pacman.px && Pinky.py < pacman.py){ //Pacman is in Bottom Right
    if (worlds[wNumber].map[Pinky.py][Pinky.px + 1] != 2) { //Ghost will go Right
        Pinky.px++;
    } else if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    } else if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    }
} else if(Pinky.px == pacman.px && Pinky.py < pacman.py){ //Pacman is in Bottom
    if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    } else if (worlds[wNumber].map[Pinky.py][Pinky.px - 1] != 2) { //Ghost will go Left
        Pinky.px--;
    } else if (worlds[wNumber].map[Pinky.py][Pinky.px + 1] != 2) { //Ghost will go Right
        Pinky.px++;
    }
} else if(Pinky.px > pacman.px && Pinky.py < pacman.py){ //Pacman is in Bottom Left
    if (worlds[wNumber].map[Pinky.py][Pinky.px - 1] != 2 && Pinky.px - 1 >= 1) { //Ghost will go Left
        Pinky.px--;
    } else if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    } else if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    }
} else if(Pinky.px > pacman.px && Pinky.py == pacman.py){ //Pacman is in Left
    if (worlds[wNumber].map[Pinky.py][Pinky.px - 1] != 2) { //Ghost will go Left
        Pinky.px--;
    } else if (worlds[wNumber].map[Pinky.py + 1][Pinky.px] != 2) { //Ghost will go Down
        Pinky.py++;
    } else if (worlds[wNumber].map[Pinky.py - 1][Pinky.px] != 2) { //Ghost will go Up
        Pinky.py--;
    }
}

displayGhost();

if(Pinky.px == pacman.px && Pinky.py == pacman.py){
    gameover = true;
    console.log("gameover");
}
}

//PACMAN MOVEMENT
document.onkeydown = function(e){
/*UP*/
if (e.keyCode == 38) {
    document.querySelector('#pacman').style.transform = "rotate(270deg)";	
    if(worlds[wNumber].map[pacman.py - 1][pacman.px] != 2){		
    pacman.py--;
    }
} 
/*DOWN*/
else if (e.keyCode == 40) {
    document.querySelector('#pacman').style.transform = "rotate(90deg)";
    if(worlds[wNumber].map[pacman.py + 1][pacman.px] != 2){		
        pacman.py++;
    }			
} else if (e.keyCode == 39){
    document.querySelector('#pacman').style.transform = "rotate(0deg)";
    if(worlds[wNumber].map[pacman.py][pacman.px  + 1] != 2){		
        pacman.px++;
    }
} else if (e.keyCode == 37){
    document.querySelector('#pacman').style.transform = "rotate(180deg)";
    if(worlds[wNumber].map[pacman.py][pacman.px- 1] != 2){		
        pacman.px--;
    }
}
if(worlds[wNumber].map[pacman.py][pacman.px] == 1){
            score +=10;
            worlds[wNumber].map[pacman.py][pacman.px] = 0;
} else if(worlds[wNumber].map[pacman.py][pacman.px] == 3){
            score +=20;
            worlds[wNumber].map[pacman.py][pacman.px] = 0;
}
Update();			
}