<?php
session_start(); 
include("config.php");
		
	if ( (isset($_POST['comment']) != "") /*&& isset($_SESSION['login_ok'])*/ )
	{
		$yorum	 = $_POST['comment'];
		
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Ziyaretçi";
		
		if(strlen($yorum) < 3)
		{
			echo '<script type="text/javascript">alert("En az 3 karakterli yorum yazmalısınız!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=gorusler.php">';
		}
		else
		{
			$sql = "INSERT INTO YORUMLAR (text, user, date)
			VALUES ('{$yorum}', '{$username}', now())";

			if (@mysql_query($sql)) 
			{
				echo '<script type="text/javascript">alert("Yorumunuz başarıyla gönderildi.");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=gorusler.php">';
			} 
			else 
			{
				echo "Yorum gönderilirken bir hata oluştu";
			}
		}
	}

	include "body.php";
?>                        
            <div class="row" align="center">
               <div class="col-md-10 col-md-offset-1">
                  <div class="article-list">
                     <div class="entry-title text-center">
                         <div class="archive-title shadow-z-1">
                               <h2>Görüşler</h2>
                         </div>   
                           <p>Oyun haKkında eleştirilerinizi yorumlarınızı düşüncelerinizi belirtebilirsiniz</p>
                           <h2>zofking hakkında</h2>
                     </div>                                      
                              <div class="entry-featured-content shadow-z-2">
                                <img class="img-responsive" src="img/single.jpg" alt="">
                              </div>
                              <br>
                              <hr>                                
                          <?php
								$query_select = "SELECT id, text, user, date FROM yorumlar ORDER BY id asc;";
								$result_select = mysql_query($query_select) or die(mysql_error());
								$rows = array();
								while($row = mysql_fetch_array($result_select))
								$rows[] = $row;
									foreach($rows as $row){ 
										$text = stripslashes($row['text']);
										$user = stripcslashes($row['user']);
										$date = stripslashes($row['date']);
										$eid = $row['id'];
									    echo '<li class="comment even thread-even depth-1"> 
                                              <article class="comment-body">
                                                 <div class="comment-author-img">
                                                     <img src="img/person.png" alt="">
                                                 </div>
                                                 <div class="comment-content">
                                                 <h3><a href="#">' .$user. '</a> <span><i class="fa fa-clock-o"></i> ' . $date . '</span></h3>
                                                            <p>' . $text . '</p>
                                                        </div>
													</article>
													';
													}
													
						?>           
                                            </div>
         <div id="respond" class="comment-respond">
              <h3 id="reply-title" class="comment-reply-title">Düşüncelerinizi bildirebilirsiniz.</h3>
                    <form action="gorusler.php" method="post" id="commentform" class="comment-form" novalidate>
                         <div class="row">
                            <div class="col-md-6">
                              <div class="col-md-6">
                                <div class="form-control-wrapper">
                                  <textarea name="comment" id="comment" class="form-control empty" cols="30" rows="10"></textarea>
                                  <div class="floating-label">Düşünceleriniz...</div>
                                         <span class="material-input"></span>
                                  </div>
                                </div>
                             </div>
                       <p class="form-submit">
                         <button type="submit" class="btn btn-danger">Yorumu Gönder</button>
                       </p>
                    </form>
                                            </div>
                                        </div>                                
                                    </div>                                    
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php
	  include("altkisim.php");
	  ?>
    </body>
</html>