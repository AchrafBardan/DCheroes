let input = 0;
let star1 = document.getElementById('star1');
let star2 = document.getElementById('star2');
let star3 = document.getElementById('star3');
let star4 = document.getElementById('star4');
let star5 = document.getElementById('star5');

let starsButton = document.getElementById('sendStarsButton');

let clicks = 0;

function checkClicks(){
    if(clicks >= 2){
        starsButton.classList.remove('hidden');
    }    
}


let currentStars = document.getElementById('currentStars').innerText;


if(currentStars == 1){
    starOne();
    
    
}
else if(currentStars == 2){
    starTwo();
}
else if(currentStars == 3){
    starThree();
    
}
else if(currentStars == 4){
    starFour();
}
else if(currentStars == 5){
    starFive();
}


function sendRating(id){
    let xhr = new XMLHttpRequest();
    xhr.open('get', '?rating='+input+'&id='+id);
    xhr.setRequestHeader('Accept', 'application/JSON');
    xhr.onload = function() {
        if(JSON.parse(xhr.response)){
            alert(JSON.parse(xhr.response).message);
        }
    };
    xhr.send();
}   

function starOne() {
    
    clicks++;
    checkClicks();
    input = '1';
    star1.classList.remove('text-white');
    star1.classList.add('text-yellow-400');
    star2.classList.add('text-white');
    star2.classList.remove('text-yellow-400');
    star3.classList.add('text-white');
    star3.classList.remove('text-yellow-400');
    star4.classList.add('text-white');
    star4.classList.remove('text-yellow-400');
    star5.classList.add('text-white');
    star5.classList.remove('text-yellow-400');
}

function starTwo() {
    clicks++;
    checkClicks();
    star1.classList.remove('text-white');
    star1.classList.add('text-yellow-400');
    star2.classList.remove('text-white');
    star2.classList.add('text-yellow-400');
    star3.classList.add('text-white');
    star3.classList.remove('text-yellow-400');
    star4.classList.add('text-white');
    star4.classList.remove('text-yellow-400');
    star5.classList.add('text-white');
    star5.classList.remove('text-yellow-400');
    input = '2';
}

function starThree() {
    clicks++;
    checkClicks();
    star1.classList.remove('text-white');
    star1.classList.add('text-yellow-400');
    star2.classList.remove('text-white');
    star2.classList.add('text-yellow-400');
    star3.classList.remove('text-white');
    star3.classList.add('text-yellow-400');
    star4.classList.add('text-white');
    star4.classList.remove('text-yellow-400');
    star5.classList.add('text-white');
    star5.classList.remove('text-yellow-400');
    input = '3';
}

function starFour() {
    clicks++;
    checkClicks();
    star1.classList.remove('text-white');
    star1.classList.add('text-yellow-400');
    star2.classList.remove('text-white');
    star2.classList.add('text-yellow-400');
    star3.classList.remove('text-white');
    star3.classList.add('text-yellow-400');
    star4.classList.remove('text-white');
    star4.classList.add('text-yellow-400');
    star5.classList.add('text-white');
    star5.classList.remove('text-yellow-400');
    input = '4';
}

function starFive() {
    clicks++;
    checkClicks();
    star1.classList.remove('text-white');
    star1.classList.add('text-yellow-400');
    star2.classList.remove('text-white');
    star2.classList.add('text-yellow-400');
    star3.classList.remove('text-white');
    star3.classList.add('text-yellow-400');
    star4.classList.remove('text-white');
    star4.classList.add('text-yellow-400');
    star5.classList.remove('text-white');
    star5.classList.add('text-yellow-400');
    input = '5';
}


