<?php
$TopDir = "../";

$HeadInc = '<link rel="stylesheet" href="inc/admin.css">';

include "../header.php";

include "../inc/fintoozler.php";
?>

<link rel="stylesheet" href="inc/jquery-ui.css" type="text/css">
<script type="text/javascript" src="inc/jquery-ui.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#mediamanager").dialog({ autoOpen: false, modal: true, width: $(window).width() > 1000 ? 1000 : '90%' });
    $("#image").on("click", function() {
      $("#mediamanager").dialog("open");
    });

    $("#tabs").tabs();
  });
</script>

<div id="admin-header">
  <div class="site-width">
    <a href="."><img src="../images/logo.png" alt="Take 7 Productions" id="logo"></a>
    
    <?php if ($PageTitle != "Login") { ?>
    <div class="menu">
      <ul>
        <li><a href="banner.php">Home Banner</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="testimonials.php">Testimonials</a></li>
      </ul>
    </div>
    <?php } ?>
  </div>
</div>

<div class="site-width">
