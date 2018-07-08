<link href="css/sign-in-up.css" rel="stylesheet">
<div style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="sign" >
	<div class="card card-login mx-auto mt-5">
		<div class="card-header">
			Sign in
		</div>
		<div class="card-body">
			<form id="sign_in_form">
				<div class="form-group">
					<label for="exampleInputEmail1">Login</label>
					<input class="form-control" id="login_i"  aria-describedby="emailHelp" placeholder="Enter your login" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input class="form-control" id="pass_i" type="password" placeholder="Password" required>
				</div>
				<div style="margin-left: 15vmin;">
					<p class="none err" id="loginincorect" >wrong login or password</p>
					<p class="none err" id="errvar" >account not verified</p> 
				</div>
				<button type="submit" class="btn btn-primary btn-block" id="button_i">Login</button>
			</form>
			<div class="text-center">
				<a class="d-block small mt-3" href="index.php?m=sign_up">Register an Account</a>
				<a class="d-block small" href="index.php?m=forgot">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>
<script src="../scripts/sign_in.js"></script>