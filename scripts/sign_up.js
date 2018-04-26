window.onload = function ()
{
	var button = document.getElementById('button');
	var login = document.getElementById('login');
	var email = document.getElementById('email');
	var pass = document.getElementById('pass');

	 
	var up = function signup() 
	{
		var cur_email = email.value;
		var cur_login = login.value;
		var cur_pass =  pass.value;
		var xhttp = new XMLHttpRequest();
		console.log(cur_pass);
		console.log(cur_login);
		console.log(cur_email);
		xhttp.open("POST", "fun/sign_up.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("login=" + cur_login + "&" + "email=" + cur_email + "&" + "pass=" + cur_pass);
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
				alert(this.responseText);
			}
		}
	}
	button.addEventListener('click', up);
}