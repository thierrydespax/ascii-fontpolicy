<?php

use ASCII\Http\Response;
use ASCII\Controller\Admin\FontsController;
use ASCII\Controller\Admin\CharactersController;
use ASCII\Controller\Admin\symbolsController;
use ASCII\Controller\Admin\CharactersFontsController;
use ASCII\Manager\Manager;
use ASCII\Entity\User;
use ASCII\Entity\UserLevel;
use ASCII\Controller\Auth\AuthController;


require "./../vendor/autoload.php";

  try {


//       	$em = Manager::getDoctrine();      
//       	$user = new User();
//       	$userlvl = new UserLevel;
      
//       	$user->setUserLevel($userlvl);
//       	$user->setUserMail("tata@ya.fr");
//       	$user->setUserPswd("tata");
//       	$userlvl->setUserLevelName("tata");
      
//       	$em->persist($user);
//       	$em->flush();
      
//       exit;
       
                 
    $url = (string) filter_input(INPUT_SERVER, "REDIRECT_URL");
    $action = (string) filter_input(INPUT_GET, "action");
    $route = [
        "/formation-php/web/auth" => AuthController::class,
        "/formation-php/web/admin/fonts/[a-zA-Z0-9-_\s]{1,32}" => CharactersFontsController::class,
        "/formation-php/web/admin/characters" => CharactersController::class,
        "/formation-php/web/admin/symbols" => symbolsController::class,
        "/formation-php/web/admin/fonts" => FontsController::class,
    ];
    
    // Itération des urls du router
    foreach ($route as $routeUrl => $className) {
    // Si l'url du navigateur est présente dans le router
    $routePropre = str_replace("/", "\/", $routeUrl);
        if (preg_match("/^" . $routePropre . "$/", $url)) {
    // on demande une instance de la classe associée        
            $controller = new $className; 
            if (method_exists($controller, $action)) {
                $response = $controller->{$action} ();
                break;
           }
        } 
    }
    if (!isset($response)) {
        $response = new Response();
        $response->setStatus(404, "Not Found");
        $response->setBody("Aucune route ne correspond");
    }
    // 1/ Envoyer la version et l'�tat du protocol
    header($response->getStatus());
    // 2/ Envoyer les ent�tes
    foreach ($response->getHeader() as $key => $value){
        header($key . ": " . $value);
    }
    // 3/ Envoyer le body
    echo $response->getBody();
} catch (Throwable $e) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "<h1>Erreur: </h1>" . $e->getMessage();
}


