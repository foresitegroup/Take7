<?php
if (!isset($TopDir)) $TopDir = "";
if (!isset($HeadInc)) $HeadInc = "";

function VideoImage($url) {
  if (strpos($url, 'youtu') > 0) {
    $pattern = "/(?:[?&]v=|\/embed\/|\/1\/|\/v\/|https:\/\/(?:www\.)?youtu\.be\/)([^&\n?#]+)/";
    preg_match($pattern, $url, $matches);
    $TheImage = "https://img.youtube.com/vi/" . $matches[1] . "/maxresdefault.jpg";
  }

  if (strpos($url, 'vimeo') > 0) {
    $pattern = "/(http|https)?:\/\/(www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|)(\d+)(?:|\/\?)/";
    preg_match($pattern, $url, $matches);
    $vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . $matches[4] . ".php"));
    $TheImage = $vimeo[0]['thumbnail_large'];
  }

  return $TheImage;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    
    <title>Take 7 Productions<?php if (isset($PageTitle)) echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TopDir; ?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">
    
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <link href="//fonts.googleapis.com/css?family=Poppins:400,600,700|Raleway:500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css?<?php if ($TopDir == "") echo filemtime('inc/main.css'); ?>">
    
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/swipebox/swipebox.css">
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/swipebox/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http']").not("[href*='" + window.location.host + "']").prop('target','new');
        $("a[href$='.pdf']").prop('target', 'new');

        $(".swipebox-video").swipebox({autoplayVideos: true});
      });
    </script>

    <?php echo $HeadInc; ?>
  </head>
  <body>
    
    <div id="header"<?php if (!isset($PageTitle)) echo ' class="home"'; ?>>
      <div class="header site-width">
        <a href="<?php echo $TopDir; ?>."><img src="<?php echo $TopDir; ?>images/logo.png" alt="Take 7 Productions" id="logo"></a>
        
        <input type="checkbox" id="show-menu" role="button">
        <label for="show-menu" id="menu-toggle"></label>
        <div class="menu">
          <ul>
            <li><a href="<?php echo $TopDir; ?>services.php">Services</a></li>
            <li><a href="<?php echo $TopDir; ?>portfolio.php">Portfolio</a></li>
            <li><a href="<?php echo $TopDir; ?>journal/">Journal</a></li>
            <li><a href="<?php echo $TopDir; ?>contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
      
      <?php
      if (!isset($PageTitle)) {
        include_once("inc/fintoozler.php");
        $result = $mysqli->query("SELECT * FROM home_banner WHERE id = '1'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        ?>
        <div id="header-video"<?php if ($row['overlay'] == "on") echo 'class="overlay"'; ?>>
          <video playsinline autoplay muted loop>
            <source src="images/cms/<?php echo $row['video']; ?>" type="video/mp4">
          </video>
        </div>

        <div class="tagline">Video With Vision.</div>

        <div class="link">
          <a href="<?php echo $row['video_link']; ?>" class="swipebox-video" rel="home-banner"><?php echo $row['video_link_text']; ?></a>
        </div>
      <?php } ?>
    </div>
    