// ! se qui se fait pour chaque fenetre
// Get the browser window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;


if (windowHeight > windowWidth) {//tel
    document.getElementById("logo").style.width = "60%";
}
else {
    document.getElementById("logo").style.width = "100%";
    document.getElementById("logo").style.paddingTop = "30px";
}

var contLogo = document.getElementById("conteneurLogo").style;
var latete = document.getElementById("tete").style;

// pour avoir un beau dégrader il faut la taill exacet
document.getElementById("body").style.height = windowHeight + "px";


// ! fonction 

// as timePassed goes from 0 to 2000
// left gets values from 0px to 400px
function draw(uniter, un1, un2) {
    latete.height = document.getElementById("tete").clientHeight - uniter + 'px';
    document.getElementById('logo').style.height = document.getElementById('logo').clientHeight - un1 + "px";
    document.getElementById('logo').style.width = document.getElementById('logo').clientWidth - un2 + "px";
    // console.log(document.getElementById("conteneurLogo").clientHeight);
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function att(nb,baliseafficher) {//nb en seconde
    //cacher elm
    baliseafficher.style.visibility="hidden";
    //les position de fin
    var heightLogoFin = document.getElementById('logo').clientHeight;
    var widthLogoFin = document.getElementById('logo').clientWidth;
    var heightbaniereFin = document.getElementById("tete").clientHeight;

    console.log(heightLogoFin);
    console.log(widthLogoFin);

    //pos etat début
    latete.height = "100%";
    contLogo.height = "100%";
    document.getElementById('logo').style.height = document.getElementById("body").clientWidth + "px";
    document.getElementById('logo').style.width = document.getElementById("body").clientWidth + "px";

    //calcule des fonction
    var frameseconde = 20;
    var delayanimation = 2000;
    var uniterHeight2secondeBanniere = (document.getElementById("conteneurLogo").clientHeight - heightbaniereFin) / (delayanimation / frameseconde);
    var uniterHeight2secondeLogo = (document.getElementById("body").clientWidth - heightLogoFin) / (delayanimation / frameseconde);
    var uniterWidtht2secondeLogo = (document.getElementById("body").clientWidth - widthLogoFin) / (delayanimation / frameseconde);

    for (let i = 0; i < nb; i++) {
        console.log(`Waiting ${i} seconds...`);
        await sleep(i * 1000);
    }


    //application
    let start = Date.now(); // remember start time
    let timer = setInterval(function () {
        // how much time passed from the start?
        let timePassed = Date.now() - start;
        if (timePassed >= delayanimation) {
        clearInterval(timer); // finish the animation after 2 seconds
        baliseafficher.style.visibility="visible";//remontrer elm
        return;
        }
        // draw the animation at the moment timePassed
        draw(uniterHeight2secondeBanniere, uniterHeight2secondeLogo, uniterWidtht2secondeLogo);
    }, frameseconde);   

}


function start() {
    //les position de fin
    var heightLogoFin = document.getElementById('logo').clientHeight;
    var widthLogoFin = document.getElementById('logo').clientWidth;
    var heightbaniereFin = document.getElementById("tete").clientHeight;

    console.log(heightLogoFin);
    console.log(widthLogoFin);

    //pos etat début
    latete.height = "100%";
    contLogo.height = "100%";
    document.getElementById('logo').style.height = document.getElementById("body").clientWidth + "px";
    document.getElementById('logo').style.width = document.getElementById("body").clientWidth + "px";

    //calcule des fonction
    var frameseconde = 20;
    var delayanimation = 2000;
    var uniterHeight2secondeBanniere = (document.getElementById("conteneurLogo").clientHeight - heightbaniereFin) / (delayanimation / frameseconde);
    var uniterHeight2secondeLogo = (document.getElementById("body").clientWidth - heightLogoFin) / (delayanimation / frameseconde);
    var uniterWidtht2secondeLogo = (document.getElementById("body").clientWidth - widthLogoFin) / (delayanimation / frameseconde);

    //application
    let start = Date.now(); // remember start time
    let timer = setInterval(function () {
        // how much time passed from the start?
        let timePassed = Date.now() - start;
        if (timePassed >= delayanimation) {
        clearInterval(timer); // finish the animation after 2 seconds
        return;
        }
        // draw the animation at the moment timePassed
        draw(uniterHeight2secondeBanniere, uniterHeight2secondeLogo, uniterWidtht2secondeLogo);
    }, frameseconde);
}