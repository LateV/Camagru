<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'].'models/pic.php';

$_POST["page"] = htmlspecialchars($_POST["page"]);

if ($_POST["function"] == "get_more_pictures")
{
	echo get_pictures($_POST["page"]);
	echo can_load($_POST["page"]);
}

function get_pictures($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;
	$pictures = picture_grid_from_db(($page - 1)*25);
	echo "<ul>";
	foreach ($pictures as $key => $value)
	{
		preg_replace("../", "", $value[img_h]);
		echo  ('<li class="st1">'.'<a onclick="big_pic('.$value[id].')"><div id="img_1"><img class="grid" src="'. $value[img_h] .'"></div></a>');
	}
	echo "</ul>";
}

function can_load($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;


	$result = can_load_pictures_from_db($page * 25);
	if ($result)
	{
		echo '<p style="align:center" class="btn btn-primary load_more" onclick="load_more(this)">Load '.count($result).' more pictures</p>';
	}
}

function pagination($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;

	$pic_qty = (int)picture_qty_from_db()["COUNT(id)"];
	$pages_qty = ceil($pic_qty / 25);

	// prev
	if ($page == 1)
	{
		echo '<a disabled="true"><i class="fas fa-angle-left disabled"></i></a>';
	}
	else
	{
		echo '<a href="index.php?m=gallery&pg='.($pages_qty - 1).'"><i class="fas fa-angle-left"></i></a>';
	}
	// prev

	if ($pages_qty < 9)
	{
		for ($i=1; $i <= $pages_qty; $i++)
		{
			if ($i == $page)
			{
				echo '<a disabled="true" class="current">'.$i.'</a>';
			}
			else
			{
				echo '<a href="index.php?m=gallery&pg='.($i).'">'.$i.'</a>';
			}
		}
	}
	else
	{
		if ($page > 2)
		{
			echo '<a href="index.php?m=gallery&pg=1">1</a>';
			echo '<a disabled="true"> .. </a>';
		}
		if ($page != 1)
		{
			echo '<a href="index.php?m=gallery&pg='.($page - 1).'">'.($page - 1).'</a>';
		}
		echo '<a disabled="true" class="current">'.$page.'</a>';
		if ($page != $pages_qty)
		{
			echo '<a href="index.php?m=gallery&pg='.($page + 1).'">'.($page + 1).'</a>';
		}
		if ($page != $pages_qty - 1 && $page != $pages_qty)
		{
			echo '<a disabled="true"> .. </a>';
			echo '<a href="index.php?m=gallery&pg='.$pages_qty.'">'.$pages_qty.'</a>';
		}
	}
	if ($page == $pages_qty)
	{
		echo '<a  disabled="true"><i class="fas fa-angle-right disabled"></i></a>';
	}
	else
	{
		echo '<a href="index.php?m=gallery&pg='.($page + 1).'"><i class="fas fa-angle-right"></i></a>';
	}

}

?>
