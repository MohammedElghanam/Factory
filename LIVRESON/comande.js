
    const form = document.getElementById("form");
    const select = document.getElementById("select");
    const select1 = document.getElementById("select1");
    const poids = document.getElementById("poids");
    const normale = document.getElementById("Normale");
    const urgente = document.getElementById("Urgente");
    const type_livreson = document.getElementById("type_livreson");
    const successPopUp = document.getElementById("success_pop_up");
    const errorsPopUp = document.getElementById("errors_pop_up");

    
    const expediteurError = document.getElementById("expediteur_error");
    const destinataireError = document.getElementById("destinataire_error");
    const poidError = document.getElementById("poid_error");
    const checkError = document.getElementById("check_error");

    function get_typeLivrson(){
        if (normale.checked) {
            type_livreson.value = normale.value;
        }else if(urgente.checked){
            type_livreson.value = urgente.value;
        }
    }

    normale.addEventListener('change', get_typeLivrson);
    urgente.addEventListener('change', get_typeLivrson);

    function vlaidateTypeLivreson(){
        if (type_livreson.value !== "") {
            checkError.innerHTML = '';
            return true;
        } else {
            checkError.innerHTML = 'Veuillez sélectionner un type de livraison';
            return false;
        }
    }

    function validateExpediteur(){
        if (select.value !== "") {
            select.style.border = "1px solid green";
            expediteurError.innerHTML = '';
            return true;
        } else {
            select.style.border = "1px solid red";
            expediteurError.innerHTML = 'Veuillez sélectionner un expéditeur';
            return false;
        }
    }

    function validateDestinataire(){
        if (select1.value !== "") {
            select1.style.border = "1px solid green";
            destinataireError.innerHTML = '';
            return true;
        } else {
            select1.style.border = "1px solid red";
            destinataireError.innerHTML = 'Veuillez sélectionner un destinataire';
            return false;
        }
    }

    function validatePoid(){
        if (poids.value !== "" && poids.value > 0) {
            poids.style.border = "1px solid green";
            poidError.innerHTML = '';
            return true;
        } else {
            poids.style.border = "1px solid red";
            poidError.innerHTML = 'Veuillez entrer le poids du colis';
            return false;
        }
    }


    select.addEventListener('focusout', validateExpediteur);
    select1.addEventListener('focusout', validateDestinataire);
    poids.addEventListener('focusout', validatePoid);

    function check_ALL(){
        if ( !validateExpediteur() || !validateDestinataire() || !vlaidateTypeLivreson()  || !validatePoid()) {
            errorsPopUp.style.display = "flex";
            errorsPopUp.addEventListener("click", () => {
                errorsPopUp.style.display = "none";
            });  
        }else {
            const commande = {
                expéditeur: select.value,
                destinataire: select1.value,
                poids: poids.value,
                typeLivraison: type_livreson.value
            };
     
            let commandes = JSON.parse(localStorage.getItem("commandes")) || [];
            commandes.push(commande);
            localStorage.setItem("commandes", JSON.stringify(commandes));

            successPopUp.style.display = "flex";
            successPopUp.addEventListener("click", () => {
                successPopUp.style.display = "none";
            });                 
        }
    }

    form.addEventListener("submit", (e) => {
        e.preventDefault(); 
        check_ALL();
    });
    //     // Function to populate a select element with data from localStorage
    //     function populateSelect(selectId) {
    //         const selectElement = document.getElementById(selectId);
    //         const clients = JSON.parse(localStorage.getItem('clients')) || [];

    //         clients.forEach(client => {
    //             const option = document.createElement('option');
    //             option.value = client.nom;
    //             option.textContent = client.nom;
    //             selectElement.appendChild(option);
    //         });
    //     }

    //     // Call the function to populate both selects
    //     populateSelect('select');
    //     populateSelect('select1');
    // });


    document.addEventListener('DOMContentLoaded', function() {
        
        function populateSelect(selectId) {
            const clients = JSON.parse(localStorage.getItem('clients')) || [];
                
            clients.forEach(client => {
                const option = document.createElement('option');
                option.value = client.nom;  
                option.innerHTML = client.nom;  
                selectId.appendChild(option);
            });
        }
    
        
        populateSelect(select);
        populateSelect(select1);
    });
    