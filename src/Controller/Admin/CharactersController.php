<?php

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\CharactersModel;

class CharactersController extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function manage(): Response 
	{  
	       
	  if(($_SESSION["user"]["level"]) !== "superadmin" && ($_SESSION["user"]["level"]) !== "admin")
	     {
	      $this->response->addHeader("Location", "./../auth?action=auth");  
	    }
	     
		$model = new CharactersModel;
		$model->create(
				(string) filter_input(INPUT_POST, "characters_unicode_name"),
				(string) filter_input(INPUT_POST, "characters_unicode_value")
				);
		if (!isset($model->success) && !isset($model->error)) {
		$model->remove((string) filter_input(INPUT_GET, "character"));
		}
		$model->selectAll();
		
		
		return $this->render("characters/manage", [
				"model" => $model
		]
	  );
     }	
	 
	}