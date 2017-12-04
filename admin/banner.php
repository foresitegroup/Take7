<?php
include "login.php";
$PageTitle = "Home Banner";
include "header.php";

$result = $mysqli->query("SELECT * FROM home_banner WHERE id = '1'");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>

<form action="banner-db.php" method="POST">
  <div>
    <input type="text" name="image"<?php if ($row['video'] != "") echo "value=\"" . $row['video'] . "\""; ?> id="image">

    <input type="text" name="video_link"<?php if ($row['video_link'] != "") echo "value=\"" . $row['video_link'] . "\""; ?>>

    <input type="text" name="video_link_text"<?php if ($row['video_link_text'] != "") echo "value=\"" . $row['video_link_text'] . "\""; ?>>

    <strong>Overlay</strong>
    &nbsp;
    <input type="radio" name="overlay" value="on" id="r-overlay-y"<?php if ($row['overlay'] == "on") echo " checked"; ?>> <label for="r-overlay-y">Yes</label>
    &nbsp;
    <input type="radio" name="overlay" value="off" id="r-overlay-n"<?php if ($row['overlay'] == "off") echo " checked"; ?>> <label for="r-overlay-n">No</label>
    <br>
    <br>
    <br>

    <input type="hidden" name="id" value="1">

    <input type="submit" name="submit" value="Update" id="submit">
  </div>
</form>

<?php include "footer.php"; ?>