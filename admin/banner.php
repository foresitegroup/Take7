<?php
include "login.php";
$PageTitle = "Home Banner";
include "header.php";

$result = $mysqli->query("SELECT * FROM home_banner WHERE id = '1'");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>

<form action="banner-db.php" method="POST" id="home-banner">
  <div>
    <strong>Home Banner Video</strong><br>
    <input type="text" name="image"<?php if ($row['video'] != "") echo "value=\"" . $row['video'] . "\""; ?> id="image">
    <span class="note">This must be an mp4, preferably with no audio and less than a minute.</span>
    
    <strong>Full Video Link</strong><br>
    <input type="text" name="video_link"<?php if ($row['video_link'] != "") echo "value=\"" . $row['video_link'] . "\""; ?>>
    <span class="note">The URL of the full video that will play in the pop-up window, such as "https://www.youtube.com/watch?v=dQw4w9WgXcQ" or "https://vimeo.com/45196609".</span>
    
    <strong>Full Video Link Text</strong><br>
    <input type="text" name="video_link_text"<?php if ($row['video_link_text'] != "") echo "value=\"" . $row['video_link_text'] . "\""; ?>>
    <span class="note">The text of the link that opens the full video pop-up.</span>

    <strong>Overlay</strong>
    <label><input type="radio" name="overlay" value="on" id="r-overlay-y"<?php if ($row['overlay'] == "on") echo " checked"; ?>> Yes</label>
    <label><input type="radio" name="overlay" value="off" id="r-overlay-n"<?php if ($row['overlay'] == "off") echo " checked"; ?>> No</label>
    <span class="note">If the video is predominantly light, enable this to place a slightly dark overlay on the video; this prevents the menu and other text from disappearing into the background.</span>
    <br>

    <input type="hidden" name="id" value="1">

    <input type="submit" name="submit" value="Update" id="submit">
  </div>
</form>

<?php include "footer.php"; ?>