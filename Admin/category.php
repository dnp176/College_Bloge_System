<?php 
  include ('header.inc.php');
  include ('../db.inc.php');
  if (isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'edit') {
    $id = $_GET['id'];
    $res = mysqli_query($con,"select * from category where id=$id");
    $category="";
    while($row=mysqli_fetch_array($res)){
    $category = $row["name"];
    }
  }

  if (isset($_GET['id']) && isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = $_GET["id"];
    mysqli_query($con,"delete from category where id=$id") or  die(mysqli_error($con));
    ?>
      <script>
        window.location="category.php";
      </script>
    <?php
  }
?>

<div class="container">
  <form action="" method="POST">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Category Name</span>
      </div>
      <input type="text" class="form-control mr-5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="category" placeholder="Enter blog category" required="" value="<?php if(isset($category)){ echo $category;  } ?>">
      <input type="submit" name="submit" value="Save" class="btn btn-success">
    </div>
</form>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Category</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count=0;
      $res = mysqli_query($con,"select * from category order by id desc");
      while($row=mysqli_fetch_array($res)){
      $count=$count+1;
    ?>
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><a href="category.php?id=<?php echo $row["id"]; ?>&type=edit">Edit</a></td>
      <td><a href="category.php?id=<?php echo $row["id"]; ?>&type=delete">Delete</a></td>
    </tr>
     <?php
                  }
                   ?>
  </tbody>
</table>

</div>

<?php

if (isset($_POST['submit'])) {
  $category = $_POST['category'];
  $sql = "INSERT INTO category VALUES ('','$category')";
  if(mysqli_query($con, $sql)){
      echo "Records inserted successfully.";
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }
}

?>

