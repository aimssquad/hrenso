<?php

session_start();
include 'top.php';

include 'conn.php';
include 'include/function.php';
//include 'include/xconnection.php';

if ($_SESSION['emp_id'] == true) {
  echo "";
} else {
  header('location:index.php');
}

$emp_id = $_SESSION['emp_id'];

$id=$_GET['id'];


?>


				<div class="span9">
					<div class="content">



						<div class="module">
							<div class="module-head">
								<h3>News Feed</h3>


							</div>
							<div class="module-body">

								<!-- News Feed post start  -->

					

								<!-- News Feed post end  -->

                           <?php 

                                  $sql_post=mysqli_query($conn,"SELECT  news_feed.*,employee.name,employee.image as img FROM `news_feed`,employee WHERE news_feed.emp_id=employee.emp_id and news_feed.id='$id' ");

                                  while ($row=mysqli_fetch_assoc($sql_post)) {
                                  	// code...
                                  

                           ?>




								<div class="stream-list">
									
									<div class="media stream">
										<a href="#" class="media-avatar medium pull-left">
											              <?php 
							                        if ($row['img']==NULL || $row['img']=='') { ?>
							                             <img src="images/user.png" />
							                            <b class="caret"></b></a>
							                            
							                        <?php }else{?>
							                             <img src="<?php echo PROFILE_IMAGE_SITE_PATH.$row['img'];?>" />
							                           </a>

							                        <?php
							                     }
							                        ?>
										</a>
										<div class="media-body">
											<div class="stream-headline">
												<h5 class="stream-author">
													<?php  echo $row['name'] ?>
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
                                    





												
											</div><!--/.stream-headline-->

										

											<div class="stream-options">

                                   
                                     <form action="comment.php" method="post">
                                     	<input type="hidden" name="post_id" value="<?php echo $id ?>">
                                     	<input type="hidden" name="emp_id" value="<?php echo $emp_id ?>">
        
                                        <textarea rows="6" class="form-control" name="comment" style="width:70%"></textarea><br> 

                                        <input type="submit" class="btn btn-primary" name="submit"   value="submit">
											
                                    </form>
                                 </div>


			
                                         <?php 
                                        $comment_query=mysqli_query($conn,"SELECT comments.*,employee.name,employee.image as img FROM `comments`,employee WHERE comments.emp_id=employee.emp_id and comments.post_id=$id");

                                      $comment_count=mysqli_num_rows($comment_query);

                                         ?>

                                        


											

                                       	<div class="stream-respond">

                                         		<?php

                                                   while($row_comment=mysqli_fetch_assoc($comment_query)){?>

                                                   		<div class="media stream">
													<a href="#" class="media-avatar small pull-left">
																              <?php 
							                        if ($row_comment['img']==NULL || $row_comment['img']=='') { ?>
							                             <img src="images/user.png" />
							                            <b class="caret"></b></a>
							                            
							                        <?php }else{?>
							                             <img src="<?php echo PROFILE_IMAGE_SITE_PATH.$row_comment['img'];?>" />
							                           </a>

							                        <?php
							                     }
							                        ?>
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


						
					</div><!--/.content-->
				</div><!--/.span9-->
	<?php
 include 'footer.php';
?>

<?php

if (isset($_POST['submit'])) {
	
	$post_id=$_POST['post_id'];
	$emp_id=$_POST['emp_id'];
	$comment=get_safe_value($conn,$_POST['comment']);


 $query=mysqli_query($conn,"INSERT INTO `comments` (`id`, `emp_id`, `post_id`, `comment`, `created_at`) VALUES (NULL, '$emp_id', '$post_id', '$comment', current_timestamp())");

 if ($query) {

 		echo '<script>';
  		echo 'alert("Comments updated sucessfully");';

  		 echo 'history.back();';

  		echo '</script>';

 	
 }else{

 	echo '<script>';
  		echo 'alert("Something Went wrong");';

  		 echo 'history.back();';

  		echo '</script>';

 }




}

?>

