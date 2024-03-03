(function(){

    listeElement = Array.from(document.querySelectorAll(".element_info"))
    listeElement.forEach(element =>{
    element.addEventListener("click", (e)=>{
                    let oui = element.parentNode.querySelector(".fermer");
                    let modal = element.parentNode.querySelector(".modal");
                    modal.style.display = 'flex';
                    modal.style.zIndex = 50
                    oui.addEventListener('click', ()=>{
                        modal.style.display = 'none';

                    })
            })  
        });
     
        // Appel de la fonction pour ajouter une variable
})()

// TRUNCATE TABLE `templatesusers_panieruser`;
// https://waytolearnx.com/


