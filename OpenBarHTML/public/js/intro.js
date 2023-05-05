// ! se qui se fait pour chaque fenetre
// Get the browser window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;


// if (windowHeight > windowWidth) {//tel
    
// }
// else {
//     document.getElementById("logo").style.width = "100%";
//     // document.getElementById("logo").style.paddingTop = "30px";
// }
document.getElementById("logo").style.width = "60%";
var contLogo = document.getElementById("conteneurLogo").style;
var latete = document.getElementById("tete").style;

// pour avoir un beau dégrader il faut la taill exacet
document.getElementById("body").style.height = windowHeight + "px";
document.getElementById("body").style.width = windowWidth + "px";


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
    baliseafficher.style.opacity=0;
    //les position de fin
    var heightLogoFin = document.getElementById('logo').clientHeight;
    var widthLogoFin = document.getElementById('logo').clientWidth;
    var heightbaniereFin = document.getElementById("tete").clientHeight;

    console.log(heightLogoFin);
    console.log(widthLogoFin);

    //pos etat début
        // fixe body
    document.getElementById("body").style.clientHeight=window.innerHeight;
    document.getElementById("body").style.clientWidth=window.innerWidth;

    latete.height = "100%";
    contLogo.height = "100%";
    document.getElementById('logo').style.height = document.getElementById("body").clientHeight + "px";
    document.getElementById('logo').style.width = document.getElementById("body").clientWidth + "px";

    //calcule des fonction
    var frameseconde = 20;
    var delayanimation = 2000;
    var uniterHeight2secondeBanniere = (document.getElementById("conteneurLogo").clientHeight - heightbaniereFin) / (delayanimation / frameseconde);
    var uniterHeight2secondeLogo = (document.getElementById("body").clientHeight - heightLogoFin) / (delayanimation / frameseconde);
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
        //on remait tout bien comme avant 
        document.getElementById('logo').style.height = heightLogoFin;
        document.getElementById('logo').style.width= widthLogoFin;
        document.getElementById("tete").style.height = heightbaniereFin;
        baliseafficher.style.opacity=1;//remontrer elm
        return;
        }
        // draw the animation at the moment timePassed
        draw(uniterHeight2secondeBanniere, uniterHeight2secondeLogo, uniterWidtht2secondeLogo);
    }, frameseconde);   

}


// function start() {
//     //les position de fin
//     var heightLogoFin = document.getElementById('logo').clientHeight;
//     var widthLogoFin = document.getElementById('logo').clientWidth;
//     var heightbaniereFin = document.getElementById("tete").clientHeight;

//     console.log(heightLogoFin);
//     console.log(widthLogoFin);

//     //pos etat début
//     latete.height = "100%";
//     contLogo.height = "100%";
//     document.getElementById('logo').style.height = document.getElementById("body").clientWidth + "px";
//     document.getElementById('logo').style.width = document.getElementById("body").clientWidth + "px";

//     //calcule des fonction
//     var frameseconde = 20;
//     var delayanimation = 2000;
//     var uniterHeight2secondeBanniere = (document.getElementById("conteneurLogo").clientHeight - heightbaniereFin) / (delayanimation / frameseconde);
//     var uniterHeight2secondeLogo = (document.getElementById("body").clientWidth - heightLogoFin) / (delayanimation / frameseconde);
//     var uniterWidtht2secondeLogo = (document.getElementById("body").clientWidth - widthLogoFin) / (delayanimation / frameseconde);

//     //application
//     let start = Date.now(); // remember start time
//     let timer = setInterval(function () {
//         // how much time passed from the start?
//         let timePassed = Date.now() - start;
//         if (timePassed >= delayanimation) {
//         clearInterval(timer); // finish the animation after 2 seconds
//         return;
//         }
//         // draw the animation at the moment timePassed
//         draw(uniterHeight2secondeBanniere, uniterHeight2secondeLogo, uniterWidtht2secondeLogo);
//     }, frameseconde);
// }



    // scrip pour les bouton 

function shwopsw() {
    var x = document.getElementById("myPsw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function shwopsw2() {
    var x = document.getElementById("myPsw2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

//le gris derrière
function appgrisfond() {
    // if (condition==1) {
    console.log(document.getElementById("formConteneur").clientHeight);
    document.getElementById("formConteneur").style.height=
        document.getElementById("formConteneur").clientHeight
        -2*parseFloat(window.getComputedStyle(document.getElementById('formConteneur')).padding) //enleève totalement le padding ajjouter pour clienHeight
                                //recup via type
        -2*parseFloat(window.getComputedStyle(document.querySelector('div[type="forsubmit"]')).marginTop)//enlever tout le margin
        -((document.getElementById('boutonsumit').clientHeight)/2)// on mais la moitier du bouton
        +"px";  
    console.log(document.getElementById("formConteneur").clientHeight);
}

function posabsolutotalPanier(istel)
{
    let elem = document.getElementById("totalPayer");
    if (istel) {//tel
        
        elem.style.top = document.getElementById("fortotalpayer").getBoundingClientRect().bottom
        +"px";
      }
      else
      {
        elem.style.top = document.getElementById("fortotalpayer").getBoundingClientRect().bottom
        -(document.getElementById("totalPayer").clientHeight/2)
        +"px";
        elem.style.left =document.getElementById("fortotalpayer").getBoundingClientRect().left+"px";
      }
}