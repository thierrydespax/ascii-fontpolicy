<?php 

namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\FontsModel;

class FontsController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function read (): Response 
    {
    	$model = new FontsModel();
    	$model->selectAll();
    	
    	return $this->render(
            "fonts/read",
            [
            	"model" => $model
            ]
            );
    }
    
    public function manage (): Response
    {
    	$model = new FontsModel();
    	$model->selectAll();
    }
    
    public function create (): Response
    {
    	$model = new FontsModel();
    	$model->create(
    			(string) filter_input(INPUT_POST, "fonts_name"), 
    			(int) filter_input(INPUT_POST, "fonts_line_height")
    	);
    	return $this->render(
    			"fonts/create",
    			[
    				"model" => $model	
    			]
    	);
    }
}