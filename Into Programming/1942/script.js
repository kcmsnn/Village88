/**********************
***** HERO REGION *****
***********************/

//Hero Variable
var hero = {
    x: 390,
    y: 700
}

//Hero Movement
document.onkeydown = function(e){
    if (e.keyCode == 38 && hero.y > 0) {
        hero.y-=10;
    } else if (e.keyCode == 40 && hero.y < 790) {
        hero.y+=10;        
    } else if (e.keyCode == 39 && hero.x < 770) {
        hero.x+=10;        
    } else if (e.keyCode == 37 && hero.x > 0) {
        hero.x-=10;            
    }
    if (e.keyCode == 32) {        
        soundeffects.currentTime = 0;
        soundeffects.play();
        bullet.push( {x:hero.x + 6.5, y: hero.y -12} );
    }
}

//Display Hero
function displayHero(){
    document.getElementById('hero').style.left = hero.x+'.px';
    document.getElementById('hero').style.top = hero.y+'.px';
}

//Player Collision
function heroCollision(){
    for (var j = 0; j < enemies.length; j++) {
        if(Math.abs(hero.x - enemies[j].x) < 20 && Math.abs(hero.y - enemies[j].y) < 15){    
            score -= 500;
            explosion.push( {x:hero.x, y: hero.y} );
            console.log(score);            
            displayExplosion();
            hero.x = 390;
            hero.y = 700;
            enemies[j].y = 0;
            enemies[j].x = Math.random()*700;
            for (let i = 0; i < explosion.length; i++) {                
                soundeffects1.currentTime = 0;
                soundeffects1.play();
                setInterval(explosionAnimation,200);  
                explosion[i] = explosion[explosion.length -1];
                explosion.pop();  
                }               
            }
        }
}

/**********************
*** END HERO REGION ***
***********************/
/********************************************************************************/
/********************************************************************************/
/**********************
**** ENEMY REGION *****
***********************/
//Enemy Variable
var enemies =[ {x:50,y:50},{x:150,y:150},{x:200,y:250},{x:200,y:100},{x:300,y:300},{x:100,y:200},{x:150,y:250}];

//Display Enemies
function displayEnemies(){
    let output = "";
    for (let i = 0; i < enemies.length; i++) {
        if (i > 3) {
            output += "<div id = 'enemy1' style = 'top : " + enemies[i].y + "px; left : " + enemies[i].x + "px;'></div>\n";             
        }else if(i < 3){
            output += "<div id = 'enemy2' style = 'top : " + enemies[i].y + "px; left : " + enemies[i].x + "px;'></div>\n"; 
        }    
    }
    document.getElementById('enemies').innerHTML = output;
}

//Enemy Movement
function enemyMovement(){
    for (let i = 0; i < enemies.length; i++) {        
        if(enemies[i].y < 770){
            enemies[i].y+=5;
        } else {            
            enemies[i].y = 0;
            enemies[i].x = Math.random()*700;
        }        
    }
}



/**********************
*** END ENEMY REGION **
***********************/
/********************************************************************************/
/********************************************************************************/
/**********************
**** BULLET REGION ****
***********************/

var bullet = [];

function displayBullet(){
    let output = "";
    for (let i = 0; i < bullet.length; i++) {
        output += "<div class = 'bullet' style = 'top : " + bullet[i].y + "px; left : " + bullet[i].x + "px;'></div>\n";     
    }
    document.getElementById('bullets').innerHTML = output;
}

//Bullet Movement
function bulletMovement(){
    for (let i = 0; i < bullet.length; i++) {
            bullet[i].y-=10; 
            if(bullet[i].y < 0){
                bullet[i] = bullet[bullet.length -1];
                bullet.pop();
            }       
    }
}

//Collision Detection
function bulletCollision(){
    for (var i = 0; i < bullet.length; i++) {
        for (var j = 0; j < enemies.length; j++) {
            if(Math.abs(bullet[i].x - enemies[j].x) < 20 && Math.abs(bullet[i].y - enemies[j].y) < 15){    
                score += 10;
                console.log(score);            
                explosion.push( {x:enemies[j].x + 6.5, y: enemies[j].y -12} );
                soundeffects1.currentTime = 0;
                soundeffects1.play();
                displayExplosion();  
                enemies[j].y = 0;
                enemies[j].x = Math.random()*700; 
                setInterval(explosionAnimation,200);                
            }
        }
    }
}
/**********************
*** END BULLET REGION **
***********************/
/********************************************************************************/
/********************************************************************************/
/**********************
**** EXPLOSION REGION ****
***********************/

var explosion = [];
var action = 'Hit';
var which_frame = 0;

function displayExplosion(){
    let output = "";
    for (let i = 0; i < explosion.length; i++) {
        output += "<div id = 'explosion' style = 'top : " + explosion[i].y + "px; left : " + explosion[i].x + "px;'></div>\n";     
    }
    document.getElementById('explosions').innerHTML = output;    
}

function explosionAnimation(){
    if(action == 'Hit')
    {        
        which_frame = which_frame+1;
        if (which_frame == 0){
            document.getElementById('explosion').style.background = "url('1942.gif') -6px -375px";
        }else if (which_frame == 1){
            document.getElementById('explosion').style.background = "url('1942.gif') -6px -396px";
        } else if (which_frame == 2){
            document.getElementById('explosion').style.background = "url('1942.gif') -51px -396px";
        } else if (which_frame == 3){
            document.getElementById('explosion').style.background = "url('1942.gif') -75px -396px";
        }else if (which_frame >= 4){
            document.getElementById('explosion').style.background = "url('1942.gif') -28px -396px";
            for (let i = 0; i < explosion.length; i++) {
                    explosion[i] = explosion[explosion.length -1];
                    explosion.pop();  
            }
        }
    }
}




/***********************
* END EXPLOSION REGION *
***********************/
/********************************************************************************/
/********************************************************************************/
/***********************
***** SCORE REGION *****
***********************/

var score = 0;

function displayScore(){
    document.getElementById('score').innerHTML = score;
    console.log(score);
}

/***********************
*** END SCORE REGION ***
***********************/
/********************************************************************************/
/********************************************************************************/
/***********************
***** SCOUNR REGION *****
***********************/

const soundeffects = new Audio("bulletsound.wav");
const soundeffects1 = new Audio("explosion.wav");




/***********************
*** END SOUND REGION ***
***********************/
/********************************************************************************/
/********************************************************************************/
/**********************
**** UPDATE REGION ****
***********************/

function gameLoop(){    
    displayEnemies();
    displayHero();
    displayScore();
    displayBullet();
    bulletMovement();
    bulletCollision();
    heroCollision();
    enemyMovement();
}
setInterval(gameLoop,20);
/**********************
*** END HERO REGION ***
***********************/