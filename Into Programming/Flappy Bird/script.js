/********* UPDATE REGION *********/
/*******************************/

setInterval(() => {
    if(gameover == false){
        displayBird();
        birdMovement();
        displayGround();
        groundMovement();
        tubesMovement();    
        spawnTubes();
        collisionDetection();
    }
}, 20);
/*******************************/
/********* END  REGION *********/
/*******************************/
/*****************************************************************/
/*****************************************************************/
/*******************************/
/********* BIRD REGION *********/
/*******************************/

//Bird Variable
var bird = {x:20,y:200};
var gameover = false;

//Display Bird in the desired position
function displayBird(){
    document.getElementById('flappy').style.top = bird.y +'px';
    document.getElementById('flappy').style.left = bird.x +'px';
}

//Bird Movement
function birdMovement(){    
    if (bird.y < 365) {
    bird.y += 2;
    
}
    document.onkeydown = function(e){
        if (e.keyCode == 32) {
            bird.y -= 30;
        }
    }


}

/*******************************/
/********* END  REGION *********/
/*******************************/
/*******************************/
/*****************************************************************/
/*****************************************************************/
/********* TUBE REGION *********/
/*******************************/

var tubes = [{
        uppertube:[{x: 350, y: randomgenerator = Math.floor(Math.random()*121) * -1}, 
                   {x: 507, y: randomgenerator = Math.floor(Math.random()*121) * -1}, 
                   {x: 664, y: randomgenerator = Math.floor(Math.random()*121) * -1}]
    },{
        lowertube:[{x: 350, y: randomgenerator = (Math.floor(Math.random()*121) * -1 )+ 364}, 
                   {x: 507, y: randomgenerator = (Math.floor(Math.random()*121) * -1 )+ 364}, 
                   {x: 664, y: randomgenerator = (Math.floor(Math.random()*121) * -1 )+ 364}] 
}];

var{uppertube} = tubes[0];
var{lowertube} = tubes[1];

function spawnTubes(){
    upperoutput = '';
    loweroutput = '';
    for (let i = 0; i < uppertube.length; i++) {
        upperoutput += "<div class='upper-tube' style= 'top:" + uppertube[i].y + "px; left:"+uppertube[i].x+"px;'></div>";
        loweroutput += "<div class='lower-tube' style= 'top:" + lowertube[i].y + "px; left:"+lowertube[i].x+"px;'></div>";         
    }

    document.getElementById('upper-container').innerHTML = upperoutput;
    document.getElementById('lower-container').innerHTML = loweroutput;
}

function tubesMovement(){    
    randomgenerator = Math.floor(Math.random()*121) * -1;
    for (let i = 0; i < uppertube.length; i++) {
        if(uppertube[i].x != -157){
            uppertube[i].x--;
            lowertube[i].x--;
        } else if(uppertube[i].x == -157){
            uppertube[i].x = 350;
            lowertube[i].x = 350;
            uppertube[i].y = randomgenerator;
            lowertube[i].y = randomgenerator + 364;
        }         
    }
    //console.log(uppertube);
}

/*******************************/
/********* END  REGION *********/
/*******************************/
/*****************************************************************/
/*****************************************************************/
/*******************************/
/** COLLISION DETECTION REGION */
/*******************************/

function collisionDetection() {
    for (let i = 0; i < uppertube.length; i++) {
        if (bird.y >= 366) {
            gameover = true;
        }else if ((((bird.x + 10) >= (uppertube[i].x - 28)) && ((bird.x + 10) <= (uppertube[i].x - 28)))  && (bird.y < (uppertube[i].y + 264))){
            gameover = true;    
        }       
    }
}

/*******************************/
/********* END  REGION *********/
/*******************************/
/*****************************************************************/
/*****************************************************************/
/*******************************/
/********* GROUND REGION *******/
/*******************************/

var ground =[{x:0,y:385},{x:309,y:385},{x:618,y:385}];

function displayGround(){
    document.getElementById('ground-1').style.left = ground[0].x +"px";
    document.getElementById('ground-1').style.top = ground[0].y +"px";
    
    document.getElementById('ground-2').style.left = ground[1].x +"px";
    document.getElementById('ground-2').style.top = ground[1].y +"px";

    document.getElementById('ground-3').style.left = ground[2].x +"px";
    document.getElementById('ground-3').style.top = ground[2].y +"px";
}

function groundMovement(){
    for(var i = 0; i < ground.length; i++){
        if(ground[i].x != -309){
            ground[i].x--;
        } else if (ground[i].x == -309) {
            ground[i].x = 618;
        }
    }
}
/*******************************/
/********* END  REGION *********/
/*******************************/
/*****************************************************************/
/*****************************************************************/
/*******************************/
/********* SCORE REGION ********/
/*******************************/

/*******************************/
/********* END  REGION *********/
/*******************************/
