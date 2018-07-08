var page = 0;
function load_more(item)
{
	const galery_elem = document.getElementsByClassName("gallery")[0];

	if (page == 0)
	{
		page = document.getElementsByClassName("current")[0].innerHTML;
		page = parseInt(page) + 1;
	}	
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.open("POST", "fun/gallery.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("function=get_more_pictures&page=" + page);
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;

			document.getElementsByClassName("load_more")[0].remove();
			galery_elem.innerHTML += response;
			page = parseInt(page) + 1;
        }
	};

}