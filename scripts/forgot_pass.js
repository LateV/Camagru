function forgot_pwd(evt)
{
	event.preventDefault();
	var xmlhttp = new XMLHttpRequest();

	var email = document.getElementById("email_forg");
	var email_error = document.getElementById("emailincorect");
	var mailsend = document.getElementById("mailsend");
	var forgot_form = document.getElementById("forgot_form");
	var return_forg = document.getElementById("return_forg");

	email.value = email.value.toLowerCase();
	email_error.classList.toggle('none', true);
	mailsend.classList.toggle('none', true);
	return_forg.classList.toggle('none', true);

	if(email.value.length < 1 && email.value.length > 30){
		email_error.classList.remove('none');
		return(0);
	}
	xmlhttp.open("POST", "fun/forgot_pwd.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email=" + email.value);
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{

			var response = xmlhttp.responseText;
			console.log(response);
			email.classList.remove('unvalid');
			if (response == "emailerr")
			{
				email_error.classList.remove('none');
			}
			if (response == "1")
			{
				forgot_form.classList.add('none');
				mailsend.classList.remove('none');
				return_forg.classList.remove('none');
			}
        }
	}
}
document.getElementById('forgot_form').addEventListener('submit', function(evt){
	evt.preventDefault();
	forgot_pwd(evt);
})