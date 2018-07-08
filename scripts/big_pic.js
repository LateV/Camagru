
function get_comments(id)
{
//elements
	var comments = document.getElementById('comments');
	var xhttp1 = new XMLHttpRequest();

	xhttp1.open("POST", "fun/comments.php", true);
	xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp1.send("id=" + id);
	xhttp1.onreadystatechange = function(){
		if (xhttp1.readyState == 4 && xhttp1.status == 200){
				if(xhttp1.responseText === "error")
				{
					comments.innerHTML = "db error";
				}
				else
				{
					comments.innerHTML += xhttp1.responseText;
				}

			}
	}
}

function send_comment()
{
//elements
	var comment_text = document.getElementById('comment_text');
	var comments = document.getElementById('comments');
	var id_ph = document.getElementById('id_ph');
	var user_id = document.getElementById('user_id');
	var cur_id = id_ph.innerHTML;
	var cur_comment = comment_text.value;
	var xhttp2 = new XMLHttpRequest();

	if(cur_comment.length > 500){
		alert("Comment too long");
		return(0);
	}
	xhttp2.open("POST", "fun/send_comments.php", true);
	xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp2.send("id=" + cur_id + "&comment=" + cur_comment);
	comment_text.value = "";
	xhttp2.onreadystatechange = function(){
		if (xhttp2.readyState == 4 && xhttp2.status == 200){
				if(xhttp2.responseText === "error")
				{
					
					comments.innerHTML = "db error";
				}
				else
				{
					
					comments.innerHTML = "";
					get_comments(cur_id);
				}

			}
	}
	
}
document.getElementById('comment_form').addEventListener('submit', function(evt){
	evt.preventDefault();
	send_comment();
})

function likes(id)
{
	var likes_e = document.getElementById('likes');

	var xhttp3 = new XMLHttpRequest();
	

	xhttp3.open("POST", "fun/likes.php", true);
	xhttp3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp3.send("id=" + id);
	xhttp3.onreadystatechange = function(){
		if (xhttp3.readyState == 4 && xhttp3.status == 200){
				if(xhttp3.responseText === "error")
				{
					likes_e.innerHTML = "db error";
				}
				else
				{
					likes_e.innerHTML = xhttp3.responseText;
				}

			}
	}
}

function rem_like()
{
	var id_ph1 = document.getElementById('id_ph');
	var likes_e = document.getElementById('likes');
	var cur_id1 = id_ph1.innerHTML;
	
	var xhttp4 = new XMLHttpRequest();

	xhttp4.open("POST", "fun/rem_like.php", true);
	xhttp4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp4.send("id=" + cur_id1);
	comment_text.value = "";
	xhttp4.onreadystatechange = function(){
		if (xhttp4.readyState == 4 && xhttp4.status == 200){
				if(xhttp4.responseText === "error")
				{
					likes_e.innerHTML = "db error";
				}
				else
				{
					likes_e.innerHTML = "";
					likes(cur_id1);
				}

			}
	}
}

function add_like()
{
	var id_ph1 = document.getElementById('id_ph');
	var likes_e = document.getElementById('likes');
	var cur_id1 = id_ph1.innerHTML;
	
	var xhttp5 = new XMLHttpRequest();

	xhttp5.open("POST", "fun/add_like.php", true);
	xhttp5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp5.send("id=" + cur_id1);
	comment_text.value = "";
	xhttp5.onreadystatechange = function(){
		if (xhttp5.readyState == 4 && xhttp5.status == 200){
				if(xhttp5.responseText === "error")
				{
					likes_e.innerHTML = "db error";
				}
				else
				{
					likes_e.innerHTML = "";
					likes(cur_id1);
				}

			}
	}
}

function big_pic(id)
{
//elements
	var grid = document.getElementById('grid');
	var photo = document.getElementById('photo');
	var big_pic = document.getElementById('big_pic');
	var comments = document.getElementById('comments');
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.open("POST", "fun/big_pic.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id=" + id);
	xhttp.onreadystatechange = function(){
		if (xhttp.readyState == 4 && xhttp.status == 200){
				if(xhttp.responseText === "error")
				{
					photo.innerHTML = "db error";
				}
				else
				{
					grid.classList.add('none');
					photo.innerHTML = xhttp.responseText;
					big_pic.classList.remove('none');
				}

			}
	}
	likes(id);
	get_comments(id);
}

function delete_photo(id)
{
	var xhttp = new XMLHttpRequest();
	
	xhttp.open("POST", "fun/delete_photo.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id=" + id);
	xhttp.onreadystatechange = function(){
		if (xhttp.readyState == 4 && xhttp.status == 200){
				if(xhttp.responseText === "error")
				{
					return(1);
				}
				else
				{
					return(0);
				}

			}
	}
}

function return_to_gal()
{
//elements
	var grid = document.getElementById('grid');
	var photo = document.getElementById('photo');
	var big_pic = document.getElementById('big_pic');

	grid.classList.remove('none');
	photo.innerHTML = "";
	big_pic.classList.add('none');
}
