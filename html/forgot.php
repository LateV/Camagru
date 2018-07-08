<link href="css/sign-in-up.css" rel="stylesheet">
<div style="margin: 2px">
  <a class="btn btn-secondary" href="index.php"><span>Return</span></a><br/>
</div>
<div style="margin: 30vmin;min-width: 300px;min-height: 400px" align="center" id="sign" >
<div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form id="forgot_form">
          <div class="form-group">
            <input class="form-control" id="email_forg" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
          </div>
          <button type="submit" class="btn btn-primary btn-block" id="button_res">Reset Password</button>
        </form>
          <div style="margin-left: 5vmin;">
             <div class="none" id="return_forg"> <a class="btn btn-primary btn-block" href="index.php" ><span>Return</span></a></div>
            <p class="none err" id="emailincorect" >wrong email</p>
            <p class="none err_g" id="mailsend" >mail send</p>
        </div>
        
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php?m=sign_up">Register an Account</a>
          <a class="d-block small" href="index.php?m=sign_in">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../scripts/forgot_pass.js"></script>