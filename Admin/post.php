<?php 
  include ('header.inc.php');
  include ('../db.inc.php');
?>

<div class="container-fluid">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Category</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count=0;
      $res = mysqli_query($con,"select * from blog_content order by id desc");
      while($row=mysqli_fetch_array($res)){
      $count=$count+1;
    ?>
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row['title']; ?></td>
      <td>
        <?php $string = strip_tags($row['content']); 
        if (strlen($string) > 300) {
        // truncate string
        $stringCut = substr($string, 0, 300);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= '... <a href="/this/story">Read More</a>';
      }
      echo $string;

        ?><br>
        <!-- <button class="btn btn-primary" onclick="myFunction()" id="myBtn">Read more</button> -->
      </td>
      <td><img src="<?php echo $row['content_img']; ?>" height="100px" width="100px"></td>
      <td><?php echo $row['category']; ?></td>
      <td><a href="dashboard.php?id=<?php echo $row["id"]; ?>&type=edit">Edit</a></td>
      <td><a href="category.php?id=<?php echo $row["id"]; ?>&type=delete">Delete</a></td>
    </tr>
     <?php
      }
    ?>
  </tbody>
</table>
</div>