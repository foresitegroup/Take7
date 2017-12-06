<?php
include "login.php";

$PageTitle = "Edit Testimonial";
include "header.php";

$result = $mysqli->query("SELECT * FROM testimonials WHERE id = '" . $_GET['id'] . "'");
$row = $result->fetch_array(MYSQLI_ASSOC);
?>

<div class="site-width admin">
  <div class="one-half edit">
    <h3>Edit Testimonial</h3>

    <form action="testimonials-db.php?a=edit" method="POST">
      <div>
        <input type="text" name="image" placeholder="Image"<?php if ($row['image'] != "") echo "value=\"" . $row['image'] . "\""; ?> id="image">

        <textarea name="testimonial" placeholder="Testimonial"><?php if ($row['testimonial'] != "") echo $row['testimonial']; ?></textarea>

        <input type="text" name="person" placeholder="Person"<?php if ($row['person'] != "") echo "value=\"" . $row['person'] . "\""; ?>>

        <input type="text" name="title" placeholder="Title"<?php if ($row['title'] != "") echo "value=\"" . $row['title'] . "\""; ?>>

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