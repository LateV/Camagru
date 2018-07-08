<?php session_start(); ?>
<div  style="margin: 30vmin" align="center">
	<a style="min-width: 120px;margin: 10px" class="btn btn-primary" href="index.php?m=gallery&pg=1"><span>Gallery</span></a><br/>
	<?php if (!$_SESSION["logged_in_user"]):?>
	<a style="min-width: 120px;margin: 10px" class="btn btn-primary" href="index.php?m=sign_in"><span>Camera</span></a><br/>
	<a style="min-width: 120px;margin: 10px" class="btn btn-primary" href="index.php?m=sign_in"><span>sign in</span></a><br/>
	<a style="min-width: 120px;margin: 10px" class="btn btn-primary" href="index.php?m=sign_up"><span>Registration</span></a><br/>
	<?php else:?>
	<a style="min-width: 120px;margin: 10px" class="btn btn-primary" href="index.php?m=camera"><span>Camera</span></a><br/>
	<?php endif; ?>
</div> 