<?php
$array=array("username"=>"","password"=>"","confirm-pass"=>"","Ajoutsucess"=>"","usernameError"=>"","passwordError"=>"","confirm-passError"=>"","issucess"=>false);
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $array["username"]=verifyinput($_POST["username"]);
    $array["password"]=verifyinput($_POST["password"]);
    $array["confirm-pass"]=verifyinput($_POST["confirm-password"]);
    $array["issucess"]=true;
    $bdd=new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
    $tmpd=$bdd->query("SELECT * FROM utilisateur");
    while($donnees=$tmpd->fetch()){
        if($donnees["username"]===$array["username"]){
            $array["usernameError"]="Cet utilisateur existe déjà veuillez choisir un autre nom d'utilisateur";
            $array["issucess"]=false;
        }
            
    }
    if(empty($array["username"])){
        $array["usernameError"]="ton nom d'utilisateur";
        $array["issucess"]=false;
    }
    if(empty($array["password"])){
        $array["passwordError"]="Renseigne un mot de passe stp";
        $array["issucess"]=false;
    };
    if(empty($array["confirm-pass"])){
        $array["confirm-passError"]="Le mot de passe n'est pas confirmé";
        $array["issucess"]=false;
    };
    if($array["password"]!==$array["confirm-pass"]){
        $array["confirm-passError"]="Les deux mots de passe se sont pas identiques";
        $array["issucess"]=false;
    }
    if( $array["issucess"]){
        $username=$array["username"];
        $password=$array["password"];
        $requete=$bdd->prepare("INSERT INTO utilisateur(username,secretPass) VALUES(?,?)");
        $requete->execute([$username,$password]);
        $array["Ajoutsucess"]=$requete;
    }
    echo json_encode($array);



}
function verifyinput($var){
    $var=trim($var);
    $var=strip_tags($var);
    $var=stripslashes($var);
    $var=htmlspecialchars($var);
    return $var;
}
?>