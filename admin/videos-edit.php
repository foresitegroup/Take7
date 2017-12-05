<?php
include "login.php";

$PageTitle = "Edit Video";
include "header.php";

$result = $mysqli->query("SELECT * FROM videos WHERE id = '" . $_GET['id'] . "'");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>

<div class="site-width admin">
  <div class="one-half edit">
    <h3>Edit Video</h3>

    <form action="videos-db.php?a=edit" method="POST">
      <div>
        <input type="text" name="video" placeholder="Video URL"<?php if ($row['video'] != "") echo "value=\"" . $row['video'] . "\""; ?>>

        <input type="text" name="image" placeholder="Image" id="image"<?php if ($row['image'] != "") echo "value=\"" . $row['image'] . "\" style=\"background-image: url(../images/home-videos/" . $row['image'] . ");\""; ?>>

        <input type="text" name="title" placeholder="Title"<?php if ($row['title'] != "") echo "value=\"" . $row['title'] . "\""; ?>>

        <input type="text" name="type" placeholder="Type"<?php if ($row['type'] != "") echo "value=\"" . $row['type'] . "\""; ?>>

        <strong>Publish</strong>
        &nbsp;
        <input type="radio" name="publish" value="on" id="r-pub-y"<?php if ($row['publish'] == "on") echo " checked"; ?>> <label for="r-pub-y">Yes</label>
        &nbsp;
        <input type="radio" name="publish" value="off" id="r-pub-n"<?php if ($row['publish'] == "off") echo " checked"; ?>> <label for="r-pub-n">No</label><br>
        <br>
        <br>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <input type="submit" name="submit" value="UPDATE">

        <div style="clear: both;"></div>
      </div>
    </form>
  </div>
</div>

<?php include "footer.php"; ?>