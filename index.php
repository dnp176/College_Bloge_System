<?php 
include ("header.inc.php");
include ("db.inc.php");

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link = explode('/', $actual_link)[4];
if($link == 'index.php' || $link == '')
{
    $res = mysqli_query($con, "select * from  blog_content order by id desc limit 1");
    while ($row = mysqli_fetch_array($res))
    {
        $last_post_id = $row['id'];
    }
        $post_id = $last_post_id;
}
else
{
    if($_GET['id'] == '')
    {
        $res = mysqli_query($con, "select * from  blog_content order by id desc limit 1");
        while ($row = mysqli_fetch_array($res))
        {
            $last_post_id = $row['id'];
        }
            $post_id = $last_post_id;
    }else{
        $post_id = $_GET['id'];
    }
}
?>

<div class="single-news">
    <div class="container">
        <div class="row">
            <?php
                $res = mysqli_query($con, "select * from  blog_content where id='$post_id' order by id desc limit 1");
                while ($row = mysqli_fetch_array($res)) {
                    $_SESSION['category'] = $row['category'];
            ?>
            <div class="col-lg-8">
                <div class="sn-container">
                    <div class="sn-content">
                        <h1 class="sn-title"><?php echo $row['title'] ?></h1>
                        <div class="sn-img">
                            <?php if($row['content_img']!=''){ ?>
                                <img src="<?php echo explode('../',$row['content_img'])[1] ?>" />
                            <?php } ?>
                        </div>
                        <div><p><?php echo $row['content'] ?>
                        </p></div>
                    </div>
                </div>
                <?php include ("news.inc.php") ?>
            </div>
            <?php } ?>
            <?php include ("sidebar.inc.php") ?>
        </div>
    </div>
</div>

<?php
	include ('footer.inc.php');
?>