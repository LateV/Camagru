<?php
session_start();
?>

<link href="css/header-main.css" rel="stylesheet">
<div id="allow" style="text-align: center;">Разрешите использовать камеру<br/> (Сверху текущей страницы)
</div>
<div style="margin: 2px">
	<a class="btn btn-secondary" href="index.php"><span>Return</span></a><br/>
</div>

<div style="display: flex;">
	<div>
		<div>
			<div><span class="my-4"" > Camera </span></div>
			<div id="template_id_overflow"></div>
			<img id="downloaded_img" class="video1 none"  src="">
			<div id="target" class="none" style="width: 640;height:480;">
				<p>You can drag an image file here</p>
				<p>or upload manualy (suported only 640*480 png)</p>
				<input type="file" accept="image/*" id="file_input">
			</div>
			<video class="video1" id="video" width="640" height="480" autoplay="autoplay" ></video>
		</div>
		<div class="item">
			<div> <span>Your photo</span> </div>
			<div id="template_id_overflow_can"></div>
			<div> <canvas class="" id="canvas" width="640" height="480" "></canvas> </div>
		</div>
		<div>
		<form class="form-group">
			<p>Фильтры камеры</p>
			<input style="margin: 5px" type="checkbox" id="grayscale" name="grayscale" value="grayscale">grayscale
			<input style="margin: 5px" type="checkbox" id="sepia" name="sepia" value="sepia">sepia
			<input style="margin: 5px" type="checkbox" id="blur" name="blur" value="blur">blur
			<input style="margin: 5px" type="checkbox" id="brightness" name="brightness" value="brightness">brightness
			<input style="margin: 5px" type="checkbox" id="contrast" name="contrast" value="contrast">contrast
			<input style="margin: 5px" type="checkbox" id="saturate" name="saturate" value="saturate">saturate
			<input style="margin: 5px" type="checkbox" id="invert" name="invert" value="invert">invert
			<input style="margin: 5px" type="checkbox" id="opacity" name="opacity" value="opacity">opacity
		</form>
		</div>
		<div style="margin: 2px">
			<a class="btn btn-secondary disabled" disabled="false" href="" id="butt"><span >Shot!</span></a>
			<a disabled="true" class=" btn btn-secondary disabled" id="capture_timer"><span >Timer 5s</span></a>
			<a class="btn btn-secondary disabled" disabled="true" href="" id="butt1"><span >Save photo</span></a>
		</div>
		
	</div>
	<div>
		<div class="templates">
			<ul class="test2">
				<li class="st1"><a onclick="template('templates/templates1.png')"><div id="img_1"><img class="grid1" src="templates/templates1.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates2.png')"><div id="img_2"><img class="grid1" src="templates/templates2.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates3.png')"><div id="img_3"><img class="grid1" src="templates/templates3.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates4.png')"><div id="img_4"><img class="grid1" src="templates/templates4.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates5.png')"><div id="img_5"><img class="grid1" src="templates/templates5.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates6.png')"><div id="img_6"><img class="grid1" src="templates/templates6.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates7.png')"><div id="img_7"><img class="grid1" src="templates/templates7.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates8.png')"><div id="img_8"><img class="grid1" src="templates/templates8.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates9.png')"><div id="img_9"><img class="grid1" src="templates/templates9.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates10.png')"><div id="img_10"><img class="grid1" src="templates/templates10.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates11.png')"><div id="img_11"><img class="grid1" src="templates/templates11.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates12.png')"><div id="img_12"><img class="grid1" src="templates/templates12.png"></div></a></li>
				<li class="st1"><a onclick="template('templates/templates13.png')"><div id="img_13"><img class="grid1" src="templates/templates13.png"></div></a></li>
			</ul>
		</div>
	</div>
</div>
<div>

<script src="/scripts/camera.js"></script>

