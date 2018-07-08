function sign_in(event)
{
	event.preventDefault();
	//errors
	var erlog =  document.getElementById('loginincorect');
	var ervar =  document.getElementById('errvar');
	erlog.classList.toggle('none', true);
	ervar.classList.toggle('none', true);
	//elements
	var button = document.getElementById('button_i');
	var login = document.getElementById('login_i');
	var pass = document.getElementById('pass_i');
	var cur_login = login.value.toLowerCase();
	var cur_pass =  pass.value;
	var xhttp = new XMLHttpRequest();

	if(cur_login.length < 1 && cur_login.length > 30){
		erlog.classList.remove('none');
		return(0);
	}
	
	if(cur_pass.length < 6 && cur_pass.length > 30){
		erlog.classList.remove('none');
		return(0);
	}
	
	xhttp.open("POST", "fun/sign_in.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("login=" + cur_login + "&" + "pass=" + cur_pass);
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			console.log(this.responseText);
			if(this.responseText == "ok")
			{
				document.location.href = "index.php";
				return(0);
			}
			var le = "wronglogin";
			var vr = "varfail";
			var pf = "passfail";
			if(this.responseText.match(le) || this.responseText.match(pf))
			{
				erlog.classList.remove('none');
			}
			if (this.responseText.match(vr)){
				ervar.classList.remove('none');
			}
		}
	}
}
document.getElementById('sign_in_form').addEventListener('submit', function(event){
	event.preventDefault();
	sign_in(event);
})
