<?php
namespace ASCII\Controller\Auth;

use ASCII\Controller\Controller;
use ASCII\Manager\Manager;
use ASCII\Entity\User;

class AuthController extends Controller
{

    public function auth()
    {   
        
                        
        try {
            
            $model = new \stdClass();
            if (array_key_exists("user", $_SESSION)) {
                
                
                throw new \Exception("You are already logged");
            }
            
            $mail = filter_input(INPUT_POST, "user_mail");
            
            if (!$mail || ! ($pwsd = filter_input(INPUT_POST, "user_pwsd")) || ! ($token = filter_input(INPUT_POST, "token")) || $token !== $_SESSION["token"]) {
                throw new \RuntimeException();
            } else if (! ($user = Manager::getDoctrine()
                                    ->getRepository(User::class)
                                    ->findOneBy(["userMail" => $mail])
                            )
                )
            {
                throw new \OutOfBoundsException();
            }
            
 
            if ($pwsd!== $user->getUserPswd()) {
                throw new \OutOfBoundsException();
            }
            
            $_SESSION["user"] = [
                "userAgent" => filter_input(INPUT_SERVER, "HTTP_USER_AGENT"),
                "ip" => filter_input(INPUT_SERVER, "REMOTE_ADDR"),
                "time" => time(),
                "id" => $user->getUserId(),
                "level" => $user->getUserLevel()->getUserLevelName()
            ];
            $model->success = "you are logged";
        } catch (\OutofBoundsException $e) {
            $error = "Bad Credentials";
        } catch (\RuntimeException $e) {} catch (\Throwable $e) {
            $error = $e->getMessage();
        } finally {
            
            $model->error = isset($error) ? $error : null;
            
            return $this->render("auth/auth", [
                "token" => $_SESSION["token"],
                "model" => $model,
                "user" => array_key_exists("user", $_SESSION) ? $_SESSION["user"]["level"] : null
            ]);
        }
        return $this->render("auth/auth", [
        ]);
    }

    public function destroy()
    {
        try {
            
            
            $model = new \stdClass();
            
            if (! array_key_exists("user", $_SESSION)) {
                throw new \Exception();
            }
            
            if ($_SESSION["token"] !== filter_input(INPUT_GET, "token")) {
                
                throw new \Exception("You should not try");
            }
            
            session_destroy();
            // vide le tableau des sessions
            $model->success = "Your are log out";
        } catch (\Throwable $e) {
            $model->error = "Your are still log out";
        } finally {
            
            return $this->render("auth/destroy", [
                "model" => $model,
                "user" => array_key_exists("user", $_SESSION) ? $_SESSION["user"]["level"] : null,
                "token" => array_key_exists("user", $_SESSION) ? $_SESSION["token"] : null
             ]);
            
        }
    }
}