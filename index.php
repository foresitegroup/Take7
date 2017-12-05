<?php include "header.php"; ?>

<div class="site-width">
  <a href="contact.php" class="button home-start">Start Your Project</a>
  <div style="clear: both;"></div>

  <div id="home-videos" class="cf">
    <?php
    include_once "inc/fintoozler.php";
    $result = $mysqli->query("SELECT * FROM videos WHERE publish = 'on' ORDER BY sort+0 ASC");

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $TheImage = ($row['image'] != "") ? "images/cms/" . $row['image'] : VideoImage($row['video']);
      ?>
      <a href="<?php echo $row['video']; ?>" class="swipebox-video" rel="<?php echo $row['id']; ?>" style="background-image: url(<?php echo $TheImage; ?>);">
        <div>
          <?php echo $row['title']; ?><br>
          <span><?php echo $row['type']; ?></span>
        </div>

        <span></span>
      </a>
      <?php
    }

    $result->close();
    ?>
  </div>

  <a href="contact.php" class="view-all-videos">View All Videos</a>
</div>

<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
    
<?php include "footer.php"; ?>