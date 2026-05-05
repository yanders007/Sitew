<?php
$array=array("username"=>"","password"=>"","usernameError"=>"","passwordError"=>"","issucess"=>false);
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $array["username"]=verifyinput($_POST["username"]);
    $array["password"]=verifyinput($_POST["password"]);
    $array["issucess"]=true;
    $bdd=new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
    $tmpd=$bdd->query("SELECT * FROM utilisateur");
    $trouve=false;
    while($donnees=$tmpd->fetch()){
        if($donnees['username']===$array["username"]){
            $trouve=true;
            if($donnees['secretPass']===$array["password"]){
            $array["issucess"]=true;
            break;
            }else{
                $array["issucess"]=false;
                $array["passwordError"]="Mot de passe incorrect";
                break;  
            }
        
        }
    }
    if(!$trouve){
        $array["issucess"]=false;
        $array["usernameError"]="Utilisateur Incorrect";
    }

    if(empty($array["username"])){
        $array["usernameError"]="ton nom d'utilisateur stp";
        $array["issucess"]=false;
    }
    if(empty($array["password"])){
        $array["passwordError"]="Renseigne un mot de passe stp";
        $array["issucess"]=false;
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