<?php

// session_start();

// $userAgent=filter_input(INPUT_SERVER,"HTTP_USER_AGENT");
// $ip = filter_input(INPUT_SERVER, "REMOTE_ADDR");


// if(!$userAgent || $ip) {
//     header("HTTP/1.1 500 Internal Server Error");
    
// }else
// if(!array_key_exists("user", $_SESSION))
    
// { 
//   $_SESSION["user"] =[
//       "userAgent" => $userAgent,
//       "tooken" => $token,
//       "ip" => $ip,
//       "time" =>$time,  
//   ];
     
// } else if ($userAgent !== $_SESSION["user"] ["userAgent"]
//     || $ip !== $_SESSION["user"]["ip"]) {
        
//         session_destroy();
//         die ("Banane");
// }
//      var_dump($_SESSION);


// $_SESSION["count"]++;

// var_dump($_SESSION);

//Pages publics
session_start();

if(array_key_exists("token", $_SESSION)){
     $_SESSION["token"] = uniquid();
}

$token = filter_input(INPUT_POST,"token");

if($token && $token !== $_SESSION["token"]) {
    die ("hum hum");
    
}

$user= filter_input(INPUT_POST,"user");
$pwsd= filter_input(INPUT_POST,"pwsd");
if($user==="consultan@seeren.fr" && $pwsd ==="secret"){
    die("ok");
}

?>

<form action ="" method="POST">
	<input name ="user" />
	<input name ="pwsd" />
	<input name = "token" type ="hidden" value="<?= $_SESSION["token"] ?>" />
	<input type ="submit"/>
</form>




