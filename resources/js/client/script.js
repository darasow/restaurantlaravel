
(function(){


    listeElement = Array.from(document.querySelectorAll(".ajouterPanier"))
    listeElement.forEach(element =>{ 
    element.addEventListener("click", (e)=>{
                    let oui = element.parentNode.querySelector(".oui");
                    let non = element.parentNode.querySelector(".non");
                    let modal = element.parentNode.querySelector(".modal_ajout");
                    let idElement = (element.getAttribute("data-id-commande"))
                    const  messageCopie = "Element ajout avec succes"
                    const urlCopi = ``;
                if(!afficheConfirmationModal(oui, non, modal, messageCopie, urlCopi)) return
        })  
    });

    function afficheConfirmationModal(oui, non, modal,  messageCopie, urlCopi) {
        modal.style.display = 'flex';
        modal.style.zIndex = 50
        let teste
        oui.addEventListener("click", ()=>{
            teste =  confirmAction(true, modal, urlCopi, messageCopie)
        })
        non.addEventListener("click", ()=>{
        teste =  confirmAction(false, modal, urlCopi, messageCopie)
        })
        return teste
    }

    function confirmAction(confirmation, modal, url, message) {
        modal.style.display = 'none';
        if (confirmation) {

            fetch(url)
            .then(response => response.json())
            .then(data => {
        })
            .catch(error => {
        });
        alert(`${message}`)
        window.location.reload()
        return true
        }
        window.location.reload()
        return false   
    }

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

})()

(function(){

            var listeincrement = Array.from(document.querySelectorAll(".increment"))
            var listedecrement = Array.from(document.querySelectorAll(".decrement"))
            var quantite = 1
            listeincrement.forEach(element => {
                        element.addEventListener("click", ()=>{
                            let span  = element.parentNode.querySelector(".quantite")
                            let contenu = parseInt(span.textContent)
                            if(contenu == 10) return
                            quantite  = span.textContent = ++contenu
                        })
        
                    });

            listedecrement.forEach(element => {
            element.addEventListener("click", ()=>{
                let span  = element.parentNode.querySelector(".quantite")
                let contenu = parseInt(span.textContent)
                if(contenu == 1) return
                quantite = span.textContent = --contenu
            })
        });


})()




