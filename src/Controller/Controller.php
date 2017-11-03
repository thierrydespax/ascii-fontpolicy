<?php

namespace ASCII\Controller;

use ASCII\Http\Response;

abstract class Controller
{
    
    protected $response;
    
    public function __construct()
    {
        $this->response = new Response();
        session_start();
        
        if(!array_key_exists("token", $_SESSION)){
            
            $_SESSION["token"] = password_hash(uniquid, PASSWORD_DEFAULT);
            
        } else if (array_key_exists("user", $_SESSION)
            && $_SESSION["user"]["ip"] !== filter_input(INPUT_SERVER, "REMOTE-ADDR")
            && $_SESSION["user"]["userAgent"] !== filter_input (INPUT_SERVER,"HTTP_USER_AGENT")
            )
        {
            die("Do not try to rob a user session");    
        }
    }
    
    private function getTemplateName(string $template): string 
    {
        return  __DIR__ . "/../../app/views/" . $template . ".php";
    }
     
    protected function render(string $template, array $data): Response 
    {
        $fileName = $this->getTemplateName($template);
        if (is_file($fileName)) {
        	extract($data);                             
//          D�clarer un tampon
            ob_start();
//          On peut inclure tranquillement
            include $fileName;
//          R�cuperer le contenu du tampon
            $output = ob_get_contents();
//          D�sactiver le tampon
            ob_end_clean();
            $this->response->setBody($output);
            return $this->response;
        }
        throw new \Exception("Template: " . $template . "is not a file");
    }
}