<?php
session_start();
?>

<link href="css/sign-in-up.css" rel="stylesheet">

<div style="margin-left: 20px;min-width: 100px;max-width: 500px" align="center" id="comments_on_email">
	<div class="card card-login mx-auto mt-5">
			<p>Email on comment</p>
			<div class="card-body">
				<form id="comments_to_mail">
					<div class="form-group">
						<?php if ($_SESSION["comments_to_mail"] == 1) : ?>
							<input type="checkbox" name="subscribe" id="coment_subscribe_field" checked>
						<?php else : ?>
							<input type="checkbox" name="subscribe" id="coment_subscribe_field">
						<?php endif; ?>
					</div>
				</form>
			</div>
	</div>
</div>

<div style="margin-left: 20px;min-width: 100px;min-height: 400px;max-width: 500px" align="center" id="sign" >
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Change Password</div>
		<div class="card-body">
			<form id="change_pass_form" onsubmit="change_pass(this)">
				<div class="form-group">
					<label for="exampleInputEmail1">Password</label>
					<input class="form-control" id="pass_new" type="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Confirm password</label>
					<input class="form-control" id="pass_new_conf" type="password" placeholder="Confirm password" required>
				</div>
				<div style="margin-left: 15vmin;">
					<p class="none err" id="passlenincorrect">password must be at least 6 characters long</p>
					<p class="none err" id="wrongpassconf">Passwords do not match</p>
				</div>
				<button type="submit" class="btn btn-primary btn-block" id="button_change_pass">Change</button>
			</form>
		</div>
	</div>
</div>
<div style="margin-left: 20px;min-width: 100px;min-height: 400px;max-width: 500px" align="center" id="sign" >
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Change email</div>
		<div class="card-body">
			<form id="change_email_form" onsubmit="change_email(this)">
				<div class="form-group">
					<label for="InputEmail">email</label>
					<input class="form-control" id="email_new" type="email" placeholder="email" required>
				</div>
				<div class="form-group">
					<label for="InputEmailConf">Confirm email</label>
					<input class="form-control" id="email_new_conf" type="email" placeholder="Confirm email" required>
				</div>
				<div style="margin-left: 15vmin;">
					<p class="none err" id="wrong_email_format">wrong email format</p>
					<p class="none err" id="wrong_email__change_exist">email already exist</p>
					<p class="none err" id="wrong_email_conf">emails do not match</p>
				</div>
				<button type="submit" class="btn btn-primary btn-block" id="button_change_email">Change</button>
			</form>
		</div>
	</div>
</div>
<div style="margin-left: 20px;min-width: 100px;min-height: 400px;max-width: 500px" align="center" id="sign" >
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">Change Login</div>
		<div class="card-body">
			<form id="change_login_form" onsubmit="change_login(this)">
				<div class="form-group">
					<label for="input_login">Login</label>
					<input class="form-control" id="login_new" type="login" placeholder="login" required>
				</div>
				<div style="margin-left: 15vmin;">
					<p class="none err" id="login_change_exist">Login already exist</p>
					<p class="none err" id="login_change_to_short">Login length is incorrect</p>
				</div>
				<button type="submit" class="btn btn-primary btn-block" id="button_change_login">Change</button>
			</form>
		</div>
	</div>
</div>
<script src="../scripts/user.js"></script>