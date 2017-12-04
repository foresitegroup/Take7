  </div>

<script type="text/javascript">
  $(document).on("click", ".select-image", function() {
    event.preventDefault();
    $("#image").val(this.title);
    $("#image").css("background-image", 'url(../images/home-videos/'+this.title+')');
    $("#mediamanager").dialog("close");
  });
</script>

<div id="mediamanager" title="Media Manager">
  <div id="tabs">
    <ul>
      <li><a href="mm-images.php">Select Image</a></li>
      <li><a href="mm-upload.php">Upload Image</a></li>
    </ul>
  </div>
</div>

<?php include "../footer.php"; ?>