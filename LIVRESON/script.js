
    const patterns = {
        TVA_regex : /^\d{9}$/,
        nom_regex : /^[a-zA-Z\s]+$/,
        phone_regex : /^0[567][0-9]{8}$/,
        address_regex : /^[a-zA-Z\s]+$/   
        // /^[\w\s]+,\s*[\w\s]+,\s*[\w\s]+,\s*\d{5}$/ 
    }

    
    // Pointer to any id
    var form = document.getElementById("form");
    var TVA = document.getElementById("tva");
    var nom = document.getElementById("nom");
    var phone = document.getElementById("phone");
    var address = document.getElementById("address");
    var errors_pop_up = document.getElementById("errors_pop_up");


    // Pointer to any errors
    var tva_error = document.getElementById("tva_error");
    var nom_error = document.getElementById("nom_error");
    var phone_error = document.getElementById("phone_error");
    var address_error = document.getElementById("address_error");


    function Vlidate_TVA(){
        if (patterns.TVA_regex.test(TVA.value)) {
            TVA.style.border = "1px solid green";
            tva_error.innerHTML ='';
            return true;
        }else{
            TVA.style.border = "1px solid red";
            tva_error.innerHTML = 'tve invalide. Veuillez entrer un numéro valide.';
            return false
        }
    }

    function Vlidate_NOM(){
        if (patterns.nom_regex.test(nom.value)) {
            nom.style.border = "1px solid green";
            nom_error.innerHTML ='';
            return true;
        }else{
            nom.style.border = "1px solid red";
            nom_error.innerHTML = 'tve invalide. Veuillez entrer un numéro valide.';
            return false;
        }
    }
    
    function Vlidate_PHONE(){
        if (patterns.phone_regex.test(phone.value)) {
            phone.style.border = "1px solid green";
            phone_error.innerHTML ='';
            return true;
        }else{
            phone.style.border = "1px solid red";
            phone_error.innerHTML = 'tve invalide. Veuillez entrer un numéro valide.';
            return false;
        }
    }

    function Vlidate_ADDRESS(){
        if (patterns.address_regex.test(address.value)) {
            address.style.border = "1px solid green";
            address_error.innerHTML ='';
            return true;
        }else{
            address.style.border = "1px solid red";
            address_error.innerHTML = 'tve invalide. Veuillez entrer un numéro valide.';
            return false;
        }
    }


    function storage_client(){
        if (!Vlidate_TVA() || !Vlidate_NOM() || !Vlidate_PHONE() || !Vlidate_ADDRESS() ) {
            errors_pop_up.style.display = "flex";
            errors_pop_up.addEventListener("click", (e) =>{
                errors_pop_up.style.display = "none"; 
            })  
        }else{

            const client = {
                tva : TVA.value,
                nom: nom.value,
                phone: phone.value,
                address : address.value 
            }


            var clients = JSON.parse(localStorage.getItem("clients")) || [];
            clients.push(client);
            localStorage.setItem("clients", JSON.stringify(clients));



            success_pop_up.style.display = "flex"; 
            success_pop_up.addEventListener("click", (e) =>{
                success_pop_up.style.display = "none"; 
            })
        }
    }

    TVA.addEventListener('focusout', Vlidate_TVA);
    nom.addEventListener('focusout', Vlidate_NOM);
    phone.addEventListener('focusout', Vlidate_PHONE);
    address.addEventListener('focusout', Vlidate_ADDRESS);


    form.addEventListener("submit", (e) => {
        e.preventDefault();
        storage_client();
    });


  