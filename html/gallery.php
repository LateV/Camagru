<?php 
session_start();
require $_SERVER['DOCUMENT_ROOT'].'fun/gallery.php';

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

<div class="container none" id="big_pic">
	<div class="row big_pic">
		<div>
			<div id="photo">
				
			</div>
			<div id="likes">

			</div>
		</div>
		<div>
			<h3 style="margin-left: 20px;">Comments</h3>
			<ul class="test1" id="comments">
				
			</ul>
			<?php if (!$_SESSION["logged_in_user"]):?>
				<div class="none">
					<form id="comment_form">
						<textarea style="height: 200px" id="comment_text" class="test1" name="text" required></textarea>
						<button class="btn btn-secondary" style="margin-left: 20px;">Send</button>
					</form>
				</div>
				<div>
					<h5 style="margin-left: 20px;"> Allow only registered users to comment on </h5>
					<a style="min-width: 120px;margin: 10px" class="btn btn-primary" href="index.php?m=sign_in"><span>sign in</span></a><br/>
				</div>
			<?php else:?>
				<h4 style="margin-left: 20px;">Comment on</h4>
				<div>
					<form id="comment_form">
						<textarea style="height: 200px" id="comment_text" class="test1" name="text" required></textarea>
						<button class="btn btn-secondary" style="margin-left: 20px;">Send</button>
					</form>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="container" id="grid">
	<a style="margin: 2px" class="btn btn-secondary" href="index.php"><span>Return</span></a><br/>
	<h1 align="center">Gallery</h1>
	<div class="gallery">
		<?php
			get_pictures($_GET[pg]);
		?>
	</div>
		<?php 
			can_load($_GET[pg]);
		?>
	<div class="pagination">
		<?php 
			pagination($_GET[pg]) 
		?>
	</div>
</div>
<script src="../scripts/big_pic.js"></script>
<script src="../scripts/gallery.js"></script>