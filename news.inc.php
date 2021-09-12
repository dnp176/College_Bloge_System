<?php include ("db.inc.php"); ?>
<div class="sn-related">
    <h2>Related Post</h2>
    <div class="row sn-slider">
        <?php
            $res = mysqli_query($con, "select * from  blog_content");
            while ($row = mysqli_fetch_array($res)) {
        ?>
        <div class="col-md-4">
            <div class="sn-img">
                <img src="<?php echo explode('../',$row['content_img'])[1]; ?>" />
                <div class="sn-title">
                    <a href=""><?php echo $row['title'] ?></a>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="col-md-4">
            <div class="sn-img">
                <img src="asset/img/news-350x223-2.jpg" />
                <div class="sn-title">
                    <a href="">Interdum et fames ac ante</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="sn-img">
                <img src="asset/img/news-350x223-3.jpg" />
                <div class="sn-title">
                    <a href="">Interdum et fames ac ante</a>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md-4">
            <div class="sn-img">
                <img src="asset/img/news-350x223-4.jpg" />
                <div class="sn-title">
                    <a href="">Interdum et fames ac ante</a>
                </div>
            </div>
        </div> -->
    </div>
</div>