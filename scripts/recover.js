function recover(elem)
{
	event.preventDefault();
	var xmlhttp = new XMLHttpRequest();
	//errors
	var len_errpass = document.getElementById("passlenincorrect");
	var err_conf = document.getElementById("wrongpassconf");
	len_errpass.classList.toggle('none', true);
	err_conf.classList.toggle('none', true);
	//elements
	var succ_ch = document.getElementById("succ_ch");
	var email = document.getElementById("email_rec");
	var pass = document.getElementById("pass_new");
	var passc = document.getElementById("pass_new_conf");
	var rec_form = document.getElementById("pass_rec_form");
	var cur_pass =  pass.value;
	var cur_passc =  passc.value;
	var cur_email = email.value;

	if(cur_pass.length < 6 && cur_pass.length > 30){
		passlenincorrect.classList.remove('none');
		return(0);
	}
	if(cur_pass != cur_passc){
		wrongpassconf.classList.remove('none');
		return(0);
	}

	xmlhttp.open("POST", "fun/recover.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email=" + email.innerHTML + "&pass=" + pass.value);

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			if (response == "1")
			{
				rec_form.classList.add('none');
				succ_ch.classList.remove('none');
				setInterval(function() {
					document.location.href = "index.php?m=sign_in";
				}, 3000);
				return(0);
			}
			else
				console.log(response);

        }
	};
    
}