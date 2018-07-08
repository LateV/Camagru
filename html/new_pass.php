<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'models/users.php';

$result = get_token_by_email($_GET[email]);
if ($result[token] === $_GET['token'])
{
	$condition = "1";
}
else
{
	$condition = "wrong_token_or_email";
}
?>
<link href="css/sign-in-up.css" rel="stylesheet">
<?php if ($condition == "1"): ?>
	<div class="none" style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="succ_ch">
		<p> Your password has been changed successfully! </p>
	</div>
	<div style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="sign">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">
				password recovery
			</div>
			<div class="card-body">
				<form id="pass_rec_form" onsubmit="recover(this)">
					<div class="form-group">
						<label for="exampleInputEmail1">Password</label>
						<input class="form-control" id="pass_new" type="password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Confirm password</label>
						<input class="form-control" id="pass_new_conf" type="password" placeholder="Confirm password" required>
					</div>
					<div style="margin-left: 15vmin;">
						<p class="none err" id="passlenincorrect">password must be from 6 to 30 characters</p>
						<p class="none err" id="wrongpassconf">wrong confirm password</p>
					</div>
					<div id="email_rec" class="none"><?php echo $_GET[email] ?></div>
					<button type="submit" class="btn btn-primary btn-block" id="button_i">submit</button>
				</form>
				<div class="text-center">
					<a class="d-block small mt-3" href="index.php?m=sign_up">Register an Account</a>
					<a class="d-block small" href="index.php?m=forgot">Forgot Password?</a>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="sign" >
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">
				Link is out date
			</div>
		</div>
	<?php endif; ?>
</div>
</div>
<script src="../scripts/recover.js"></script>

