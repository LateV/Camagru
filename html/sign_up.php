<link href="css/sign-in-up.css" rel="stylesheet">

<div class="none" style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="thank">
  <p> Thank you for registration</p>
  <p> Check your email for confirmation </p>
</div>
<div style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="sign_up_form" >
	<div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form id="registrastion_form">
          <div class="form-group">
            <label for="exampleInputLastName">Login</label>
            <input class="form-control" id="login_r" type="text" aria-describedby="nameHelp" placeholder="Enter login" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="email_r" type="email" aria-describedby="emailHelp" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="pass_r" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="passc_r" type="password" placeholder="Confirm password" required>
              </div>
              <div style="margin-left: 15vmin;">
                <p class="none err" id="emaillenincorrect">email length incorrect</p>
                <p class="none err" id="loginlenincorrect">login length incorrect</p>
                <p class="none err" id="emailincorrect">email is incorrect</p>
                <p class="none err" id="passlenincorrect">password must be from 6 to 30 characters</p>
                <p class="none err" id="loginexist">login alredy exist</p>
                <p class="none err" id="emailexist">email alredy exist</p>
                <p class="none err" id="wrongpassconf">wrong confirm password</p>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" id="button_r">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php?m=sign_in">Login Page</a>
          <a class="d-block small" href="index.php?m=forgot">Forgot Password?</a>
        </div>
      </div>
    </div>
</div> 
<script src="../scripts/sign_up.js"></script>