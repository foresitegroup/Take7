<?php
include "login.php";

$PageTitle = "Videos";
include "header.php";
?>

<div class="site-width admin">
  <div class="one-half">
    <h3>Add Video</h3>

    <form action="videos-db.php?a=add" method="POST" id="add-video">
      <div>
        <input type="text" name="video" placeholder="Video URL">

        <input type="text" name="image" placeholder="Image" id="image">
        <span class="note">If left blank, the thumbnail of the video will be automatically used.</span>

        <input type="text" name="title" placeholder="Title">

        <input type="text" name="type" placeholder="Type">

        <strong>Publish</strong>
        <label><input type="radio" name="publish" value="on" id="r-pub-y" checked> Yes</label>
        <label><input type="radio" name="publish" value="off" id="r-pub-n"> No</label><br>
        <br>
        <br>

        <input type="submit" name="submit" value="SUBMIT" id="submit">

        <div style="clear: both;"></div>
      </div>
    </form>
  </div>
  
  <div class="one-half last">
    <h3>Videos</h3><br>
    
    <div id="sortable">
      <?php
      $result = $mysqli->query("SELECT * FROM videos ORDER BY sort+0 ASC");

      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo "<div id=\"item-" . $row['id'] . "\">";
          echo "<div class=\"controls\">";
            echo "<a href=\"videos-edit.php?id=" . $row['id'] . "\" title=\"Edit\" class=\"c-edit\"><i class=\"fa fa-pencil\"></i></a>";
            echo "<a href=\"videos-db.php?a=delete&id=" . $row['id'] . "\" onClick=\"return(confirm('Are you sure you want to delete this record?'));\" title=\"Delete\" class=\"c-delete\"><i class=\"fa fa-trash\"></i></a>";
            echo "<i class=\"fa fa-sort\" aria-hidden=\"true\" title=\"Drag to sort\"></i>";
            echo "<a href=\"#\" class=\"pub\" id=\"" . $row['id'] . "\" title=\"" . $row['publish'] . "\"><i class=\"fa fa-toggle-" . $row['publish'] . "\"></i></a>";
          echo "</div>\n";

          echo "<div class=\"record\">";

          $TheImage = ($row['image'] != "") ? "../images/cms/" . $row['image'] : VideoImage($row['video']);
          ?>

          <a href="<?php echo $row['video']; ?>" class="swipebox-video" rel="<?php echo $row['id']; ?>" style="background-image: url(<?php echo $TheImage; ?>);">
            <div>
              <?php echo $row['title']; ?><br>
              <span><?php echo $row['type']; ?></span>
            </div>

            <span></span>
          </a>

          <?php
          echo "</div>";

          echo "<div style=\"clear: both; height: 0.7em\"></div><br>\n";
        echo "</div>\n";
      }

      $result->close();
      ?>
    </div>
  </div>

  <div style="clear: both;"></div>
</div>

<?php include "footer.php"; ?>