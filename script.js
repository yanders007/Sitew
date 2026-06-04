document.getElementById("inscript-form").addEventListener("submit",function(e){
    e.preventDefault();
    let comments=document.querySelectorAll(".comments");
    comments.forEach(el=>el.innerText="");
    let formdata=new FormData(this);
    fetch("formcontrol.php",{
        method:"POST",
        body:formdata
    })
    .then(response=>response.json())
    .then(result=>{
        if(result.issucess){
            if(result.Ajoutsucess){
                alert("Félicitation !Votre compte a bien été crée")
                window.location.assign("index.php")
            }else{
                alert("Erreur d'inscription")
            }
            this.reset()
        }else{
            let fields=["usernameError","passwordError","confirm-passError"]
            fields.forEach((field,index)=>{
                comments[index].innerText=result[field]
            })
        }
    })
})