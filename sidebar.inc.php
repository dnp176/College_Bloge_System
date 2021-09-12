<?php 
include ('db.inc.php');
 ?>
<div class="col-lg-4">
    <div class="sidebar">
        <div class="sidebar-widget">
            <h2 class="sw-title">Recent Blog</h2>
            <div class="news-list">
                <?php
                    $res = mysqli_query($con, "select * from  blog_content order by id desc limit 5");
                    while ($row = mysqli_fetch_array($res)) {
                ?>
                <div class="nl-item">
                    <!-- <div class="nl-img"> -->
                        <img src="<?php echo explode('../',$row['content_img'])[1] ?>" width="100px" height="50px" />
                    <!-- </div> -->
                    <div class="nl-title">
                        <a href="index.php?id=<?php echo $row['id']; ?> "><?php echo $row['title'] ?></a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        
        <div class="sidebar-widget">
            <div class="image">
                <a href="http://dhruv17620.tk/" target="_blank"><img src="asset/img/dnp-ads.png" alt="Image"></a>
            </div>
        </div>
        
        <div class="sidebar-widget">
            <div class="tab-news">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#Event">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#Achivement">Achivement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#Speciality">Speciality</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="Event" class="container tab-pane active">
                        <?php $res = mysqli_query($con, 'select * from  blog_content where category="Event" limit 5 ');
                            while ($row = mysqli_fetch_array($res)) {
                         ?> 
                            <div class="tn-news">
                                <!-- <div class="tn-img"> -->
                                    <img src="<?php echo explode('../',$row['content_img'])[1] ?>" width="100px" height="50px" />
                                <!-- </div> -->
                                <div class="tn-title">      
                                    <a href="index.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'] ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="Achivement" class="container tab-pane fade">
                        <?php $res = mysqli_query($con, 'select * from  blog_content where category="Achivement" limit 5');
                            while ($row = mysqli_fetch_array($res)) {
                         ?> 
                            <div class="tn-news">
                                <!-- <div class="tn-img"> -->
                                    <img src="<?php echo explode('../',$row['content_img'])[1] ?>" width="100px" height="50px" />
                                <!-- </div> -->
                                <div class="tn-title">      
                                    <a href="index.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'] ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="Speciality" class="container tab-pane fade">
                        <?php $res = mysqli_query($con, 'select * from  blog_content where category="Speciality" limit 5 ');
                            while ($row = mysqli_fetch_array($res)) {
                         ?> 
                            <div class="tn-news">
                                <!-- <div class="tn-img"> -->
                                    <img src="<?php echo explode('../',$row['content_img'])[1] ?>" width="100px" height="50px" />
                                <!-- </div> -->
                                <div class="tn-title">      
                                    <a href="index.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'] ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="sidebar-widget">
            <div class="image">
                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
            </div>
        </div> -->

        <div class="sidebar-widget">
            <h2 class="sw-title">Category</h2>
            <div class="category">
                <ul>
                    <li><a href="">Event</a><span>(<?php $value=mysqli_query($con,'SELECT count(*) as event from blog_content where category="Event"');$data=mysqli_fetch_assoc($value);echo $data['event'] ?>)</span>
                    </li>
                    <li><a href="">Achivement</a><span>(<?php $value=mysqli_query($con,'SELECT count(*) as achivement from blog_content where category="Achivement"');$data=mysqli_fetch_assoc($value);echo $data['achivement'] ?>)</span></li>
                    <li><a href="">Speciality</a><span>(<?php $value=mysqli_query($con,'SELECT count(*) as speciality from blog_content where category="Speciality"');$data=mysqli_fetch_assoc($value);echo $data['speciality'] ?>)</span></li>
                    <!-- <li><a href="">Politics</a><span>(65)</span></li>
                    <li><a href="">Lifestyle</a><span>(54)</span></li>
                    <li><a href="">Technology</a><span>(43)</span></li>
                    <li><a href="">Trades</a><span>(32)</span></li> -->
                </ul>
            </div>
        </div>

       <!--  <div class="sidebar-widget">
            <div class="image">
                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
            </div>
        </div> -->
        
        <div class="sidebar-widget">
            <h2 class="sw-title">Tags Cloud</h2>
            <div class="tags">
                <a href="">Event</a>
                <a href="">Achivement</a>
                <a href="">Speciality</a>
                <!-- <a href="">Politics</a>
                <a href="">Lifestyle</a>
                <a href="">Technology</a>
                <a href="">Trades</a> -->
            </div>
        </div>
    </div>
</div>