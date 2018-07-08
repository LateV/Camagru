var grayscale = document.getElementById('grayscale');
var sepia = document.getElementById('sepia');
var blur = document.getElementById('blur');
var brightness = document.getElementById('brightness');
var contrast = document.getElementById('contrast');
var saturate = document.getElementById('saturate');
var invert = document.getElementById('invert');
var opacity = document.getElementById('opacity');
var canvas = document.getElementById('canvas');
var captureButton_timer = document.getElementById('capture_timer');
var fileInput = document.getElementById('file_input');
var template_id_overflow = document.getElementById('template_id_overflow');
var template_id_overflow_can = document.getElementById('template_id_overflow_can');
var video = document.getElementById('video');
var allow = document.getElementById('allow');
var target = document.getElementById('target');
var butt = document.getElementById('butt');
var butt1 = document.getElementById('butt1');
var capture_timer = document.getElementById('capture_timer');
var context = canvas.getContext('2d');
var videoStreamUrl = false;
var template_s = "";
var dataUrl_s = "";
var is_downloaded = false;
var filterIndex = 0;
var filtersq = {'grayscale': '', 'sepia': '', 'blur': '', 'brightness': '', 'contrast': '', 'saturate': '', 'invert': '', 'opacity': ''};
navigator.getMedia = ( navigator.getUserMedia ||
	navigator.webkitGetUserMedia ||
	navigator.mozGetUserMedia);
function template(template)
{
	if(videoStreamUrl == false && is_downloaded == false)
		return(0);
	
	if(template_id_overflow.innerHTML == '<img class="canvas_template" width="640" height="480" src="' + template + '">')
	{
		template_id_overflow.innerHTML = "";
		template_s = "";
		butt.disabled = true;
		butt.classList.add('disabled');
		capture_timer.disabled = true;
		capture_timer.classList.add('disabled');
		return(0);
	}
	else
	{
		template_id_overflow.innerHTML = "";
		template_id_overflow.innerHTML = '<img class="canvas_template" width="640" height="480" src="' + template + '">';

		butt.disabled = false;
		butt.classList.remove('disabled');

		if(videoStreamUrl == true)
		{
			capture_timer.disabled = false;
			capture_timer.classList.remove('disabled');
		}
		template_s = template;
	}
}
window.onload = function snap_s()
{
	var captureMe = function shot(evt) 
	{
		template_id_overflow_can.innerHTML = template_id_overflow.innerHTML;
		if (!videoStreamUrl)
		{
			context.translate(canvas.width, 0);
			context.scale(-1, 1);
			context.drawImage(downloaded_img, 0, 0, 640 , 480);
			context.setTransform(1, 0, 0, 1, 0, 0);
			dataUrl_s = canvas.toDataURL();
			butt1.disabled = false;
			butt1.classList.remove('disabled');
			return(0);
		}
		context.translate(canvas.width, 0);
		context.scale(-1, 1);
		context.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		context.drawImage(video, 0, 0, video.width , video.height);
		context.setTransform(1, 0, 0, 1, 0, 0);
		dataUrl_s = canvas.toDataURL();
		butt1.disabled = false;
		butt1.classList.remove('disabled');
	}
	function timer_capture(evt)
	{
		var counter = 5;
		butt.disabled = true;
		butt.classList.add('disabled');
		capture_timer.disabled = true;
		capture_timer.classList.add('disabled');
		setInterval(function() {
			counter--;
			if (counter >= 0) {
				captureButton_timer.innerHTML = "<span >Timer " + counter + "s" + "</span>";
			}
			if (counter === 0) {
		clearInterval(counter);
		captureMe();
		capture_timer.innerHTML = "<span >Timer 5s</span>";
		butt.disabled = false;
		butt.classList.remove('disabled');
		capture_timer.disabled = false;
		capture_timer.classList.remove('disabled');
	}
	}, 1000);
}


	var save_photo = function shot(evt)
	{
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "../fun/img.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("img_h=" + dataUrl_s + "&template=" + template_s);
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200)
			{
				context.clearRect(0, 0, 640, 480);
				context.restore();
				template_id_overflow_can.innerHTML = "";
				butt1.disabled = true;
				butt1.classList.add('disabled');
				this.responseText = this.responseText;
			}
		}
	}

	document.getElementById('butt1').addEventListener('click', function(evt){
		evt.preventDefault();
		save_photo(evt);
	})

	document.getElementById('butt').addEventListener('click', function(evt){
		evt.preventDefault();
		captureMe(evt);
	})

	document.getElementById('capture_timer').addEventListener('click', function(evt){
		evt.preventDefault();
		timer_capture(evt);
	})

	var media_a = function media(stream) 
	{
		allow.style.display = "none";
		videoStreamUrl = true;
		video.srcObject = stream;
	}
	var err = function ()
	{
		videoStreamUrl = false;
		butt.disabled = true;
		butt.classList.add('disabled');
		captureButton_timer.disabled = true;
		captureButton_timer.classList.add('disabled');
		video.classList.add('none');
		target.classList.remove('none');
	}
	navigator.getMedia({video: true , audio: false}, media_a, err);
}

function file_handler(fileList)
{
	if (fileList[0].type.match(/^image\//) && fileList[0].size < 10000000)
	{
		if (fileList[0] !== null)
		{
		var file = fileList[0];
		if(file.type !== '' && !file.type.match('image.*'))
        {
        	alert("not an image");
            return;
        }
        window.URL = window.URL || window.webkitURL;
        var imageURL = window.URL.createObjectURL(file);
        is_downloaded = true;
        target.classList.add('none');
        downloaded_img.src = imageURL;
        downloaded_img.classList.remove('none');
        context.drawImage(downloaded_img, 0, 0, 640, 480);
    }
	}
}

function filter_grayscale(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['grayscale'] = 'grayscale(1) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('grayscale');
		canvas.classList.add('grayscale');
	}
	if(elem.checked == false)
	{
		filtersq['grayscale'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('grayscale');
		canvas.classList.remove('grayscale');
	}
}



function filter_sepia(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['sepia'] = 'sepia(1) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('sepia');
		canvas.classList.add('sepia');
	}
	if(elem.checked == false)
	{
		filtersq['sepia'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('sepia');
		canvas.classList.remove('sepia');
	}
}

function filter_blur(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['blur'] = 'blur(3px) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('blur');
		canvas.classList.add('blur');
	}
	if(elem.checked == false)
	{
		filtersq['blur'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('blur');
		canvas.classList.remove('blur');
	}
}

function filter_brightness(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{	
		filtersq['brightness'] = 'brightness(5) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('brightness');
		canvas.classList.add('brightness');
	}
	if(elem.checked == false)
	{
		filtersq['brightness'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('brightness');
		canvas.classList.remove('brightness');
	}
}

function filter_contrast(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['contrast'] = 'contrast(8) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('contrast');
		canvas.classList.add('contrast');
	}
	if(elem.checked == false)
	{
		filtersq['contrast'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('contrast');
		canvas.classList.remove('contrast');
	}
}

function filter_saturate(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['saturate'] = 'saturate(10) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('saturate');
		canvas.classList.add('saturate');
	}
	if(elem.checked == false)
	{
		filtersq['saturate'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('saturate');
		canvas.classList.remove('saturate');
	}
}

function filter_invert(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['invert'] = 'invert(1) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('invert');
		canvas.classList.add('invert');
	}
	if(elem.checked == false)
	{
		filtersq['invert'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('invert');
		canvas.classList.remove('invert');
	}
}

function filter_opacity(event)
{
	var elem = event['srcElement'];
	if(elem.checked == true)
	{
		filtersq['opacity'] = 'opacity(30%) ';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.add('opacity');
		canvas.classList.add('opacity');
	}
	if(elem.checked == false)
	{
		filtersq['opacity'] = '';
		video.style.filter = filtersq['grayscale'] + filtersq['sepia'] + filtersq['blur'] + filtersq['brightness'] + filtersq['contrast'] + filtersq['saturate'] + filtersq['invert'] + filtersq['opacity'];
		video.classList.remove('opacity');
		canvas.classList.remove('opacity');
	}
}

grayscale.addEventListener('click', (e) => filter_grayscale(e));
sepia.addEventListener('click', (e) => filter_sepia(e));
blur.addEventListener('click', (e) => filter_blur(e));
brightness.addEventListener('click', (e) => filter_brightness(e));
contrast.addEventListener('click', (e) => filter_contrast(e));
saturate.addEventListener('click', (e) => filter_saturate(e));
invert.addEventListener('click', (e) => filter_invert(e));
opacity.addEventListener('click', (e) => filter_opacity(e));

target.addEventListener('drop', (e) => {
e.stopPropagation();
e.preventDefault();
file_handler(e.dataTransfer.files);
});

target.addEventListener('dragover', (e) => {
e.stopPropagation();
e.preventDefault();
e.dataTransfer.dropEffect = 'copy';
});

fileInput.addEventListener('change', (e) => file_handler(e.target.files));