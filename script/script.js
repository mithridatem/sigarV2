//création de la constante button
const button = document.querySelector(".burgerButton");
//création de la constante ul -> liste (menu)
const ul = document.querySelector("nav ul");
    
//écouteur d'événement
button.addEventListener('click', () => {
    //test 
    if(ul.style.display == "flex"){
        //lancement de l'animation css slideout (se trouve dans le fichier css style2.css)
        ul.style.animation = "slideout 1s";
        //utilisation d'un timeout de 1 s (au bout de 1 seconde (1000) passe la liste en display none)
        setTimeout(()=>{
            ul.style.display = "none" 
        }, 1000);        
    }
    //test si la liste n'est pas en display flex
    else{
        //lancement de l'animation css slidein (se trouve dans le fichier css style2.css)
        ul.style.animation = "slidein 1s";
        //passe la liste (menu) en display flex
        ul.style.display = "flex";
    }
})
// définition de la média query  
const matchMedia = window.matchMedia("(max-width: 600px)");
        
//fonction de l'event 
function handleTabletChange(e) {
    if(e.matches){
        //passe la liste (menu) en display none
        ul.style.display = "none";  
    }else
    {   //passe la liste (menu) en display flex
        ul.style.display = "flex";
        //suppression de l'animation
        ul.style.animation = "";
    }
}
//creation du listener de changement
matchMedia.addListener(handleTabletChange);

//verification au demarage
handleTabletChange(matchMedia);

