<?php  include __DIR__."/../header.php"?> 

<h1>Auth</h1>
<hr class = "col-xs-10" />

<?php include __DIR__ . "./../ui/alert-box.php"; ?>

 <?php  if (!$user):?>
<form action="" method="post">
	<div>
		<input name="user_mail" placeholder="Mail"
			class="glyphicon glyphicon-envelop"/>
	</div><br>	
	<input name="user_pwsd" type="password" placeholder="Password"
	 class="glyphicon glyphicon-secret"/>
	<input name ="token" value ="<?= $token?>" type="hidden" />
	<button class="btn btn-info">Login</button>

<?php endif ?>

<?php  include __DIR__."/../footer.php"?> 

</form> 
