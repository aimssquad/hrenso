<?php 
  include 'top.php';

 ?>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-body">
                                <div class="profile-head media">
                                    <a href="#" class="media-avatar pull-left">

                                            <?php 
                        if ($profile['image']==NULL || $profile['image']=='') { ?>
                             <img src="images/user.png" />
                            <b class="caret"></b></a>
                            
                        <?php }else{?>
                             <img src="<?php echo PROFILE_IMAGE_SITE_PATH.$profile['image'];?>" />
                           </a>

                        <?php
                     }
                        ?>
                                    </a>
                                    <div class="media-body">
                                        <h4>
                                            <?php echo $profile['name'];?> <small><?php echo $profile['position']?></small>
                                        </h4>
                                      
                                        <div class="profile-details muted">
                                            <a href="#" class="btn"><i class="icon-user"></i><?php echo $profile['tl'].'(TL)' ?> </a>
                                            <a href="#" class="btn"><i class="icon-plus"></i>Joining Date- <?php echo date("m-d-Y", strtotime($profile['doj'])).'('.$dateDiff.' Days) '; ?> </a>
                                        </div>
                                        <div class="profile-details muted " style="margin-top:10px;" >
                                            <a href="#" class="btn">Date OF Birth- <?php echo date("m-d-Y", strtotime($profile['dob'])); ?> </a>
                                            <a href="#" class="btn">Employee_id- <?php echo $emp_id; ?> </a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Enso Post</a></li>
                                    <li><a href="#friends" data-toggle="tab">Enso Pepole</a></li>
                                  
                                </ul>
                                <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">

                                       <?php 

                                  $sql_post=mysqli_query($conn,"SELECT * FROM `news_feed` ORDER BY `id` DESC");

                                  while ($row=mysqli_fetch_assoc($sql_post)) {
                                    // code...
                                  

                           ?>
                                        <div class="stream-list">
                                    
                                    <div class="media stream">
                                        <a href="#" class="media-avatar medium pull-left">
                                            <img src="images/user.png">
                                        </a>
                                        <div class="media-body">
                                            <div class="stream-headline">
                                                <h5 class="stream-author">
                                                    <?php  echo $row['username'] ?>
                                                    <small><?php echo $row['created_at'] ?></small>
                                                </h5>
                                                <div class="stream-text">
                                                    <?php 

                                                        echo $row['post'];

                                                        $type='submit';
                                                        $id=$row['id'];

                                                       $url = "like.php?type=" . $type . "&id=" . $id . "&emp_id=".$emp_id;
                                                       $url_comment = "comment.php?id=" . $id ."&emp_id=".$emp_id;

                                                    ?>
                                                </div>
                                         <?php
                
                                                $image_name=$row['image'];

                                                $image='post/'.$image_name ;

                                                $type=$row['type'];


                                                if ($type==1) { ?>
                                                
                                                 <div class="stream-attachment photo">
                                                    <div class="responsive-photo">
                                                        <img src="<?php echo $image; ?>" />
                                                    </div>
                                                </div>
                                                    <?php 
                                                    
                                                }elseif($type==2){
                                                ?>
                                                <div class="stream-attachment photo">
                                                    <div class="responsive-photo">

                                                <video controls>
                                                <source src="<?php echo $image; ?>" type="video/mp4">
                                               </video>
                                               </div>
                                                </div>
                                                <?php
                                               }


                                                else{

                                                }


                                          ?>
                                       </div><!--/.stream-headline-->
                                        <div class="stream-options">

                                        <?php 

                                              $chk_if=mysqli_query($conn,"SELECT * FROM `likes` where emp_id='$emp_id' and post_id='$id'");

                                              $num_row=mysqli_num_rows($chk_if);

                                              if ($num_row > 0) { ?>

                                            <a href='#' class="btn btn-small btn-primary">

                                                    <i class="icon-thumbs-up shaded" style="color:white"></i>
                                                <?php 

                                                       $like=mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id`=$id");
                                                       $like_count=mysqli_num_rows($like);

                                                 ?>
                                                    Like(<?php echo $like_count?>)
                                                </a>
                                                
                                             <?php }else{ ?>

                                                    <a href='<?php echo $url; ?>' class="btn btn-small">

                                                    <i class="icon-thumbs-up shaded" ></i>
                                                <?php 

                                                       $like=mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id`=$id");
                                                       $like_count=mysqli_num_rows($like);

                                                 ?>
                                                    Like(<?php echo $like_count?>)
                                                </a>


                                            <?php }

                                  

                                        // comments query 


                                      $comment_query=mysqli_query($conn,"SELECT comments.*,emp.emp FROM `comments`,emp WHERE comments.emp_id=emp.emp_id and comments.post_id=$id");

                                      $comment_count=mysqli_num_rows($comment_query);



                                        ?>
                                                


                                            

                                                <a href="<?php echo $url_comment ;?>" class="btn btn-small" id="theButton" >
                                                    <i class="icon-retweet shaded"></i>
                                                    Comments(<?php echo $comment_count; ?>)
                                                
                                                   </a>

                                               

                                            </div>

                                           <div class="stream-respond">

                                                <?php

                                                   while($row_comment=mysqli_fetch_assoc($comment_query)){?>

                                                        <div class="media stream">
                                                    <a href="#" class="media-avatar small pull-left">
                                                        <img src="images/user.png">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="stream-headline">
                                                            <h5 class="stream-author">
                                                                <?php echo $row_comment['emp'] ?>
                                                                <small><?php echo $row_comment['created_at'] ?></small>
                                                            </h5>
                                                            <div class="stream-text">
                                                                <?php echo $row_comment['comment'] ?>
                                                            </div>
                                                        </div><!--/.stream-headline-->
                                                    </div>
                                                </div><!--/.media .stream-->


                                                    <?php 
                                                   }
                                                 ?>


                                            


                                            
                                            </div><!--/.stream-respond-->


                                            


                                            



                                        </div>
                                    </div><!--/.media .stream-->
                                
                        </div><!--/.module-->

                                          <?php 

                        }
                     ?>
                                    </div>
                                    <div class="tab-pane fade" id="friends">
                                        <div class="module-option clearfix">
                                         
                                           
                                        </div>
                                        <div class="module-body">
                                           <div class="row-fluid">
                                            <?php
                                            $sql=mysqli_query($conn,"SELECT * FROM `employee`where `status`=0 order by name asc");
                                            while ($row=mysqli_fetch_assoc($sql)) { ?>
                                             
                                           
                                            
                                                <div class="col-lg-6">
                                                    <div class="media user">
                                                        <a class="media-avatar pull-left" href="#">
                                                                                           
                                                                            <?php 
                                                        if ($row['image']==NULL || $row['image']=='') { ?>
                                                             <img src="images/user.png" />
                                                            <b class="caret"></b></a>
                                                            
                                                        <?php }else{?>
                                                             <img src="<?php echo PROFILE_IMAGE_SITE_PATH.$row['image'];?>" />
                                                           </a>

                                                        <?php
                                                     }
                                                        ?>
                                                        </a>
                                                        <div class="media-body">
                                                            <h3 class="media-title">
                                                                <?php echo $row['name'] ?>
                                                            </h3>
                                                            <p>
                                                                <small class="muted"> <?php echo $row['tl'] ?></small></p>
                                                                <small class="muted"> <?php echo $row['position'] ?></small></p>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                         
                                                <?php
                                           
                                               }

                                                 ?>
                                            
                                              
                                            </div>
                                        </div>

                                    

                                    </div>
                                </div>
                            </div>
                            <!--/.module-body-->
                        </div>
                        <!--/.module-->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
   <?php include 'footer.php'; ?>
