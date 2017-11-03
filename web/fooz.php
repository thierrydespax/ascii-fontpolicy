<?php

$pwsd = ["fifi","riri","secret","lolou"];


$url="http://localhost/formation-php/web/bar.php";
foreach ($pwsd as $value) {
   
             $data = [
                "user" => "consultant@seeren.fr",
                 "pwsd" => $value, 
                "token" =>"?"
                ];
          
        $body=file_get_contents($url, false, stream_context_create(
            ["http" => [
                "method"=>"POST",
                "header" => "Content-Type:application/x-www-form-urlencoded",
                "content" => http_build_query($data)
                
            ]]      
            
            )); 
            
                  
       
    
    var_dump($body);
    break;
}