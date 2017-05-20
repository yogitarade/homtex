<?php

if ($_POST['filepath']):
 $nm=($_POST['filepath']);
endif;


if (file_exists('uploads/'.$nm)) {
	echo true;
}
else
{
echo false;
}
?>

