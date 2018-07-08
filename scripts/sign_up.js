function sign_up(event)
{
	event.preventDefault();
	// errors
	var emaillenincorrect = document.getElementById('emaillenincorrect');
	var loginlenincorrect = document.getElementById('loginlenincorrect');
	var emailincorrect = document.getElementById('emailincorrect');
	var passlenincorrect = document.getElementById('passlenincorrect');
	var loginexist = document.getElementById('loginexist');
	var emailexist = document.getElementById('emailexist');
	var wrongpassconf = document.getElementById('wrongpassconf');
	emailincorrect.classList.toggle('none', true);
	passlenincorrect.classList.toggle('none', true);
	loginexist.classList.toggle('none', true);
	emailexist.classList.toggle('none', true);
	wrongpassconf.classList.toggle('none', true);

	emaillenincorrect.classList.toggle('none', true);
	loginlenincorrect.classList.toggle('none', true);

	//elements
	var button = document.getElementById('button_r');
	var login = document.getElementById('login_r');
	var email = document.getElementById('email_r');
	var pass = document.getElementById('pass_r');
	var passc = document.getElementById('passc_r');
	var sign_up_form = document.getElementById('sign_up_form');
	var thank = document.getElementById('thank');
	var cur_email = email.value.toLowerCase();
	var cur_login = login.value.toLowerCase();
	var cur_pass =  pass.value;
	var cur_passc =  passc.value;
	var xhttp = new XMLHttpRequest();

	var eReg = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
	var result = cur_email.match(eReg);

	if(cur_login.length < 1 && cur_login.length > 30){
		loginlenincorrect.classList.remove('none');
		return(0);
	}
	if(cur_email.length < 1 && cur_email.length > 30){
		emaillenincorrect.classList.remove('none');
		return(0);
	}
	if(!result){
		emailincorrect.classList.remove('none');
		return(0);
	}
	if(cur_pass.length < 6 && cur_pass.length > 30){
		passlenincorrect.classList.remove('none');
		return(0);
	}
	if(cur_pass != cur_passc){
		wrongpassconf.classList.remove('none');
		return(0);
	}
	function sleep(ms) {
		ms += new Date().getTime();
		while (new Date() < ms){}
	} 
	xhttp.open("POST", "fun/sign_up.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("login=" + cur_login + "&" + "email=" + cur_email + "&" + "pass=" + cur_pass);
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			if(this.responseText == "1")
			{
				sign_up_form.classList.add('none');
				thank.classList.remove('none');
				setInterval(function() {
					document.location.href = "index.php?sign_in";
				}, 3000);
				return(0);
			}
			var le = "loginexist";
			var ee = "emailexist";
			if(this.responseText.match(le)){
				loginexist.classList.remove('none');
			}
			if (this.responseText.match(ee)){
				emailexist.classList.remove('none');
			}
		}
	}
}
document.getElementById('registrastion_form').addEventListener('submit', function(evt){
	evt.preventDefault();
	sign_up(evt);
})