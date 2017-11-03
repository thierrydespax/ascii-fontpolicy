<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
   	<base href="http://localhost/formation-php/web/" />
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <title>ASCII</title>
</head>

	<body>
	<!-- Static navbar -->
      <nav class="navbar navbar-inverse bg-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./admin/fonts?action=read">ASCII Generator</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="./admin/fonts?action=read">Fonts</a></li>
              <li><a href="./admin/characters?action=manage">Characters</a></li>
              <li><a href="./admin/symbols?action=symbols">Symbols</a></li>
              <?php if(isset($user) && $user):?>
              <li><a href ="./auth?action=destroy&token=<?=$token?>"
              		class ="glyphicon glyphicon-minus"></a><li>
              <?php  else:?>
              <li><a href ="./auth?action=auth"
              		class ="glyphicon glyphicon-plus"></a><li>	
              <?php endif;?>			
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		<main>