window.onload = function ()
{
	var canvas = document.getElementById('canvas');
	var video = document.getElementById('video');
	var button = document.getElementById('button');
	var allow = document.getElementById('allow');
	var context = canvas.getContext('2d');
	var videoStreamUrl = false;
	
	var captureMe = function shot() 
	{
		var xhttp = new XMLHttpRequest();
		if (!videoStreamUrl)
			alert('То-ли вы не нажали "разрешить" в верху окна, то-ли что-то не так с вашим видео стримом');
		context.translate(canvas.width, 0);
		context.scale(-1, 1);
		context.drawImage(video, 0, 0, video.width , video.height);
		var dataUrl = canvas.toDataURL();
		context.setTransform(1, 0, 0, 1, 0, 0);
		xhttp.open("POST", "../fun/img.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("img_h="+dataUrl);

		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
				this.responseText = this.responseText;
			}
		}
	}
	button.addEventListener('click', captureMe);
	var media_a = function media(stream) 
	{
		allow.style.display = "none";
		videoStreamUrl = true;
		video.srcObject = stream;
	}
	var err = function ()
	{
		console.log('что-то не так с видеостримом или пользователь запретил его использовать :P');
	}
	navigator.getUserMedia({video: true , audio: false}, media_a, err);
}