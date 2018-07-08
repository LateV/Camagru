var passlenincorrect = document.getElementById('passlenincorrect');
var wrongpassconf = document.getElementById('wrongpassconf');
var wrong_email_format = document.getElementById('wrong_email_format');
var wrong_email_conf = document.getElementById('wrong_email_conf');
var wrong_email__change_exist = document.getElementById('wrong_email__change_exist');
var login_change_exist = document.getElementById('login_change_exist');
var login_change_to_short = document.getElementById('login_change_to_short');
var coment_subscribe_field = document.getElementById('coment_subscribe_field');
passlenincorrect.classList.toggle('none', true);
wrongpassconf.classList.toggle('none', true);
wrong_email_format.classList.toggle('none', true);
wrong_email_conf.classList.toggle('none', true);
wrong_email__change_exist.classList.toggle('none', true);
login_change_exist.classList.toggle('none', true);
login_change_to_short.classList.toggle('none', true);

var xhttp = new XMLHttpRequest();

function change_pass(evt)
{
	var pass_new = document.getElementById('pass_new');
	var pass_new_conf = document.getElementById('pass_new_conf');
	var cur_pass =  pass_new.value;
	var cur_passc =  pass_new_conf.value;
	if(cur_pass.length < 6 && cur_pass.length > 30){
		passlenincorrect.classList.remove('none');
		return(0);
	}
	if(cur_pass != cur_passc){
		wrongpassconf.classList.remove('none');
		return(0);
	}
	xhttp.open("POST", "fun/c_pass.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("pass=" + cur_pass);
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			if(this.responseText == "1")
			{
				passlenincorrect.classList.toggle('none', true);
				wrongpassconf.classList.toggle('none', true);
				pass_new.value = "";
				pass_new_conf.value = "";
				alert("Password changed successfully");
				return(0);
			}
			else
			{
				alert("Error. Database shut duwn");
				return(1);
			}
		}
	}
}

function change_email(evt)
{	
	var email_new = document.getElementById('email_new');
	var email_new_conf = document.getElementById('email_new_conf');
	var cur_email = email_new.value.toLowerCase();
	var cur_email_new_conf = email_new_conf.value.toLowerCase();
	var eReg = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
	var result = cur_email.match(eReg);
	if(cur_email.length < 1 && cur_email.length > 30){
		wrong_email_format.classList.remove('none');
		return(0);
	}
	if(!result){
		wrong_email_format.classList.remove('none');
		return(0);
	}
	if(cur_email != cur_email_new_conf)
	{
		wrong_email_format.classList.remove('none');
		return(0);
	}
	xhttp.open("POST", "fun/c_email.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("email=" + cur_email);
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			if(this.responseText == "1")
			{
				email_new.value = "";
				email_new_conf.value = "";
				wrong_email_format.classList.toggle('none', true);
				wrong_email_conf.classList.toggle('none', true);
				wrong_email__change_exist.classList.toggle('none', true);
				alert("Email changed successfully");
				return(0);
			}
			var ee = "emailexist";
			if (this.responseText.match(ee)){
				wrong_email__change_exist.classList.remove('none');
			}
		}
	}
}

function change_login(evt)
{
	var login = document.getElementById('login_new');
	var cur_login = login.value.toLowerCase();

	if(cur_login.length < 1 && cur_login.length > 30){
		login_change_to_short.classList.remove('none');
		return(0);
	}
	xhttp.open("POST", "fun/c_login.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("login=" + cur_login);
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200){
			if(this.responseText == "1")
			{
				login_change_exist.classList.toggle('none', true);
				login_change_to_short.classList.toggle('none', true);
				login.value = "";
				alert("Login changed successfully");
				return(0);
			}
			var le = "loginexist";
			if(this.responseText.match(le)){
				login_change_exist.classList.remove('none');
			}
		}
	}
}

function comment_subscribe_handler(e)
{
	var elem = e['srcElement'];
	if(e.checked == true)
	{
		xhttp.open("POST", "fun/user_comment_to_email.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("comment=1");
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText == "1")
				{
					return(0);
				}
			}
		}
	}
	if(e.checked == false)
	{
		xhttp.open("POST", "fun/user_comment_to_email.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("comment=0");
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText == "1")
				{
					return(0);
				}
			}
		}
	}
}
document.getElementById('change_pass_form').addEventListener('submit', function(evt){
	evt.preventDefault();
	change_pass(evt);
})
document.getElementById('change_email_form').addEventListener('submit', function(evt){
	evt.preventDefault();
	change_email(evt);
})
document.getElementById('change_login_form').addEventListener('submit', function(evt){
	evt.preventDefault();
	change_login(evt);
})

coment_subscribe_field.addEventListener('click', (e) => comment_subscribe_handler(e));

