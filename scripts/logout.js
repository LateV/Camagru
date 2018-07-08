function logout()
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "fun/logout.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(" ");
	xhttp.onreadystatechange = function(){
		console.log(xhttp.responceText);
		if (this.readyState == 4 && this.status == 200)
			document.location.href = "index.php?m=sign_in";
		}
}
