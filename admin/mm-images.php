<div class="mm-image-header">Click file to select</div>

<?php
$files = glob("../images/cms/*.{jpg,gif,png,mp4}", GLOB_BRACE);

usort($files, function($a, $b) {
  return filemtime($a) < filemtime($b);
});

foreach ($files as $filepath) {
  $file = basename($filepath);

  $extension = pathinfo($file, PATHINFO_EXTENSION);

  if (strtolower($extension) == "mp4") {
    echo "<div class=\"mm-image select-image mp4\" title=\"" . $file . "\"><div class=\"filename\">" . $file . "</div></div>\n";
  } else {
    echo "<div class=\"mm-image select-image\" style=\"background-image: url(" . $filepath . ");\" title=\"" . $file . "\"></div>\n";
  }
}
?>