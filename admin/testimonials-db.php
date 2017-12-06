<?php
include("../inc/fintoozler.php");

switch ($_REQUEST['a']) {
  case "add":
    $mysqli->query("INSERT INTO testimonials (
                  testimonial,
                  person,
                  title,
                  publish,
                  sort,
                  image
                  ) VALUES (
                  '" . $mysqli->real_escape_string($_POST['testimonial']) . "',
                  '" . $mysqli->real_escape_string($_POST['person']) . "',
                  '" . $mysqli->real_escape_string($_POST['title']) . "',
                  '" . $_POST['publish'] . "',
                  '0',
                  '" . $_POST['image'] . "'
                  )");
    break;
  case "edit":
    $mysqli->query("UPDATE testimonials SET
                  testimonial = '" . $mysqli->real_escape_string($_POST['testimonial']) . "',
                  person = '" . $mysqli->real_escape_string($_POST['person']) . "',
                  title = '" . $mysqli->real_escape_string($_POST['title']) . "',
                  publish = '" . $_POST['publish'] . "',
                  image = '" . $_POST['image'] . "'
                  WHERE id = '" . $_POST['id'] . "'");
    break;
  case "delete":
    $mysqli->query("DELETE FROM testimonials WHERE id = '" . $_GET['id'] . "'");
    break;
  case "sort":
    $i = 1;
    foreach ($_POST['item'] as $value) {
      $mysqli->query("UPDATE testimonials SET sort = $i WHERE id = $value");
      $i++;
    }
    break;
  case "toggle":
    $mysqli->query("UPDATE testimonials SET publish = '" . $_POST['pubstate'] . "' WHERE id = " . $_POST['id']);
    break;
}

$mysqli->close();

header( "Location: testimonials.php" );
?>