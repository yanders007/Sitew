let essai=3
document.getElementById("login-form").addEventListener("submit",function(e){
    e.preventDefault();
    let comments=document.querySelectorAll(".comments")
    comments.forEach(el=>el.innerText="")
    let formdata=new FormData(this)
    fetch("contact.php",{
        method:"POST",
        body:formdata
    })
    .then(response=>response.json())
    .then(result=>{
        if(result.issucess){
            this.reset()
            window.location.assign("accueil.php")
        }else{
            if(result.passwordError && !result.usernameError){
                essai--;
                if(essai>0){
                    alert(`Mot de passe erroné.Il vous reste ${essai} essai(s)`);
                }else{
                    alert("Compte bloqué: trop de tentatives échouées.");
                    document.write("")
                    return;
                }
            }
            let fields=["usernameError","passwordError"]
            fields.forEach((field,index)=>{
                comments[index].innerText=result[field]
            })

        }
            
            
        
    })
})