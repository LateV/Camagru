window.onload = function snap_s()
{
	var canvas = document.getElementById('canvas');
	var template_id_overflow = document.getElementById('template_id_overflow');
	var video = document.getElementById('video');
	var allow = document.getElementById('allow');
	var context = canvas.getContext('2d');
	var context_template_id_overflow = template_id_overflow.getContext('2d'); 
	var videoStreamUrl = false;

	var img = new Image();
	img.src = '..translates/translates1.png';
	context_template_id_overflow.drawImage(img,0,0,video.width,video.height);
}