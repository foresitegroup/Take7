<?php
include("../inc/fintoozler.php");

$mysqli->query("UPDATE home_banner SET
  video = '" . $mysqli->real_escape_string($_POST['image']) . "',
  video_link = '" . $mysqli->real_escape_string($_POST['video_link']) . "',
  video_link_text = '" . $mysqli->real_escape_string($_POST['video_link_text']) . "',
  overlay = '" . $_POST['overlay'] . "'
  WHERE id = '" . $_POST['id'] . "'");

$mysqli->close();

header( "Location: banner.php" );
?>