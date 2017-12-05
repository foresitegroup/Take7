  </div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#sortable').sortable({
      axis: 'y',
      update: function (event, ui) {
        $.ajax({
          data: 'a=sort&' + $(this).sortable('serialize'),
          type: 'POST',
          url: 'videos-db.php'
        });
      }
    });
  });

  $(document).on("click", ".pub", function() {
    event.preventDefault();

    var orgPubState = $(this).attr('title');
    var newPubState = ($(this).attr('title') == "on") ? "off" : "on";

    $.ajax({
      data: "a=toggle&id="+$(this).attr('id')+"&pubstate="+newPubState,
      type: 'POST',
      url: 'videos-db.php'
    });

    $(this).children().removeClass('fa-toggle-'+orgPubState).addClass('fa-toggle-'+newPubState);
    $(this).attr("title", newPubState);
  });
  
  $(document).on("click", ".select-image", function() {
    event.preventDefault();
    $("#image").val(this.title);
    $("#image").css("background-image", 'url(../images/cms/'+this.title+')');
    $("#mediamanager").dialog("close");
  });
</script>

<div id="mediamanager" title="Media Manager">
  <div id="tabs">
    <ul>
      <li><a href="mm-images.php">Select File</a></li>
      <li><a href="mm-upload.php">Upload File</a></li>
    </ul>
  </div>
</div>

<?php include "../footer.php"; ?>