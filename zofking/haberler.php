<?php
session_start(); 
include("config.php");
if ( (isset($_POST['remove'])) && isset($_SESSION['login_ok']) && isset($_SESSION['username']))
{
	$remove_id = $_POST['remove'];
	
	if ($remove_id > 0 )
	{
		$haber = @mysql_query("SELECT * FROM haberler WHERE id='{$remove_id}'"); 
		$haber = @mysql_fetch_array($haber);
			
		if($haber['user'] == $_SESSION['username'])
		{
	
			$sql = "DELETE FROM haberler WHERE id='{$remove_id}'";
			
			if (@mysql_query($sql)) 
			{
				echo '<script type="text/javascript">alert("Haberiniz başarıyla silindi.");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=haberler.php">';
			} 
			else 
			{
				echo "haber silinirken bir hata oluştu";
			}
		}
		else
			echo "Haber size ait değil, silemezsiniz.";
	}
	
}	
	if ( (isset($_POST['content'])) && (isset($_POST['subject'])) && isset($_SESSION['login_ok']) )
	{
		$icerik	 = $_POST['content'];
		$baslik	 = $_POST['subject'];
		$username = $_SESSION['username'];
		
		if(strlen($icerik) < 3)
		{
			echo '<script type="text/javascript">alert("En az 3 karakterli icerik yazmalısınız!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=haberler.php">';
		}
		else
		{
			if(strlen($baslik) < 3)
			{
				echo '<script type="text/javascript">alert("En az 3 karakterli baslik yazmalısınız!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=haberler.php">';
			}
			else
			{
				$sql = "INSERT INTO haberler (content, user, subject, date)
				VALUES ('{$icerik}', '{$username}', '{$baslik}' ,now())";

				if (@mysql_query($sql)) 
				{
					echo '<script type="text/javascript">alert("Haberiniz başarıyla gönderildi.");</script>';
					echo '<meta http-equiv="refresh" content="0;URL=haberler.php">';
				} 
				else 
				{
					echo "İcerik gönderilirken bir hata oluştu";
				}
			}
		}
	}
	
	require_once "body.php";
?>
                            
                       <div class="row" align="center">
                           <div class="col-md-10 col-md-offset-1">
                                <div class="article-list">
                                     <div class="archive-title shadow-z-1">
                                        <h2>haberler</h2>
                                     </div>                                       
										           <?php
													$query_select = "SELECT id, subject, content, date, user FROM haberler ORDER BY id asc;";
													$result_select = mysql_query($query_select) or die(mysql_error());
													$rows = array();
													while($row = mysql_fetch_array($result_select))
														$rows[] = $row;
													foreach($rows as $row){ 
														$content = stripslashes($row['content']);
														$subject = stripslashes($row['subject']);
														$user = stripcslashes($row['user']);
														$date = stripslashes($row['date']);
														$eid = $row['id'];

												  echo  ' 
												  <article class="post">
													  <header class="article-title text-center"></header>

														<div class="article-featured-content shadow-z-2"></div>

														<div class="post-summary">';  
														 
														if($_SESSION['username'] == $user)
														{
															echo '
															<table >
															  <tr>
																<td><form action="haberler.php" method="post" id="removeform" class="comment-form" novalidate>
															<input type="hidden" name="remove" id="remove" class="btn btn-danger" value="' . $eid .'" />
															<input type="submit" class="btn btn-danger" value="Haberi sil" />
															</form></td>
																<td><form action="haberler.php" method="post" id="editform" class="comment-form" novalidate>
															<input type="hidden" name="edit" id="edit" class="btn btn-danger" value="' . $eid .'" />
															<input type="submit" class="btn btn-danger" value="Haberi düzenle" />
															</form></td> 
																
															  </tr>
															</table>
															';
														}
														  
														  echo '
														  <h3 id="news' . $eid . '">Başlık: ' . $subject . '</h3>
														  <div>
															<div id="postText8312536">
															' . $content . '
															
															  <div>
														  <br>
													  </div>
													  
														  </div>
														</div>

														<div class="post-detail-link text-center">
															<a href="#" class="btn btn-fab btn-raised btn-material-red">
																<i class="fa fa-plus"></i>
																<div class="ripple-wrapper"></div>
															</a>
														</div>
													</article>
													';
													}
													
													?>   

                                                                                    <div id="respond" class="comment-respond">
											  <?php 
											  if(isset($_SESSION['login_ok']))
											  {
											  ?> 
                                                <h3 id="reply-title" class="comment-reply-title">Yeni Haber Ekle</h3>

											  <form action="haberler.php" method="post" id="commentform" class="comment-form" novalidate>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-control-wrapper">
                                                                <input type="text" name="subject" id="subject"  class="form-control empty">
                                                                <div class="floating-label">Haber Başlığı</div>
                                                                <span class="material-input"></span>
                                                            </div>                                          
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-control-wrapper">
                                                                <textarea name="content" id="content" class="form-control empty" cols="30" rows="10"></textarea>
                                                                <div class="floating-label">Haber içeriği...</div>
                                                                <span class="material-input"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="form-submit">
                                                        <button type="submit" class="btn btn-danger">Haberi gönder</button>
                                                    </p>
                                                </form>
											  <?php 
											  }
											  ?> 
                                            </div>
                                        </div>   
										
                                        <nav role="navigation" class="navigation posts-navigation">
                                            <div class="nav-links">
                                                <div class="nav-previous">
                                                    <a href="#">Older posts</a>
                                                </div>
                                                <div class="nav-next">
                                                    <a href="#">Newer posts</a>
                                                </div>
                                            </div>
                                        </nav>                                        
                                    </div>                                    
                                </div>                
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>