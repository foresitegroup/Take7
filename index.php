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

<div id="home-services">
  <div class="site-width">
    <div class="left">
      <h1>Detailed. Profound. Quality.</h1>

      <div>
        Film is complex. The process is simple. By listening to you, we combine your vision with the latest video technology to deliver a timeless, quality product that effectively tells your story.
      </div>

      <a href="services.php" class="button">Our Services</a>
    </div>

    <div class="right">
      <script type="text/javascript">
        $(window).on('load resize', function(){
          $('#home-services .cycle-slideshow #pager').css("top", $('#home-services .cycle-slideshow .image').height());

          $("#pager A").text(function(i, val){
            return $.trim(val).length === 1 ? '0' + val : val;
          });
        });
      </script>

      <script type="text/javascript" src="inc/jquery.cycle2.min.js"></script>
      <div class="cycle-slideshow" data-cycle-timeout="8000" data-cycle-slides="> div" data-cycle-pager="#pager" data-cycle-pager-template="<a href=#>{{slideNum}}</a>">
        <p id="pager"></p>
        <?php
        $result = $mysqli->query("SELECT * FROM testimonials WHERE publish = 'on' ORDER BY sort+0 ASC");

        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
          echo "<div>";

          echo "<div class=\"image\" style=\"background-image: url(images/cms/" . $row['image'] . ");\"></div>";

          echo "<div class=\"quotemark\">&ldquo;</div>";
          echo nl2br($row['testimonial']);

          if ($row['person'] != "" || $row['title'] != "") echo "<div class=\"attribution\">";
            if ($row['person'] != "") echo "<strong>" . $row['person'] . "</strong>";
            if ($row['title'] != "") echo ", " . $row['title'];
          if ($row['person'] != "" || $row['title'] != "") echo "</div>";

          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>
</div>

<br><br><br><br><br><br><br>

<?php include "footer.php"; ?>