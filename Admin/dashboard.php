<?php 
  include ('header.inc.php');
  include ('../db.inc.php');
  if (isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'edit') {
    $id = $_GET['id'];
    $res = mysqli_query($con,"select * from blog_content where id=$id");
    $title="";
    $content="";
    $category="";
    while($row=mysqli_fetch_array($res)){
    $title=$row['title'];
    $content=$row['content'];
    $category = $row["category"];
    }
  }
?>
<script src="https://cdn.ckeditor.com/4.16.1/full-all/ckeditor.js"></script>
<div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
    <label for="sel1">Select Category:</label>
    <select class="form-control" id="sel1" name="category" required="">
      <option value="">Select Category</option>
        <?php
          $res=mysqli_query($con,"select * from category");
          while($row=mysqli_fetch_assoc($res)){ 
          echo "<option>";
          echo $row["name"];
          echo "</option>";
        }
      ?>
    </select>
  </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Add blog title" value="<?php if(isset($title)){ echo $title; } ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Add Thumbnail</label>
        <input type="file" class="form-control-file border" name="thumbnail_img">
    </div>
    
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Blog Content</label>
      <textarea class="form-control" id="editor" name="content" rows="3" value="<?php echo $content; ?>"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success text-center" name="submit" value="SUBMIT">
    </div>  

</form>
</div>

<script>
    CKEDITOR.replace('editor',{
      uiColor: '#CCEAEE',
      extraPlugins: 'uicolor',
      extraPlugins : 'filebrowser',
      // filebrowserBrowseUrl : 'browser.php',
      filebrowserUploadMethod : 'form',
      filebrowserUploadUrl : 'upload.php',
    });
</script>


<?php 
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $category = $_POST['category'];
  $content = $_POST['content'];
  $file = $_FILES['thumbnail_img']['name'];
  $filetmp = $_FILES['thumbnail_img']['tmp_name'];
  $newName = '../asset/content_img/thumbnail_'.$file;
  move_uploaded_file($filetmp, $newName);

  mysqli_query($con,"insert into blog_content (title,content,category,content_img) values ('$title','$content','$category','$newName')") or die(mysqli_error($con));
}
?>