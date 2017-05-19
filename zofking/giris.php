<?php

session_start();
require_once("config.php");

	if(!isset($_POST['Username']) && !isset($_SESSION['login_ok']))
	{
		include "body.php";
?>
<html>
  <body>
     <div class="row">   
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="archive-title shadow-z-1" >
             <h2>Giriş Yap</h2>
          </div> 
		<form action="giris.php" method="post" name="Login_Form" class="form-signin">       
  			  <h3 class="form-signin-heading">Hoşgeldiniz</h3>
			  <hr class="colorgraph"><br>
			  <input type="text" class="form-control" name="Username" placeholder="Username" required autofocus/>
			  <input type="password" class="form-control" name="Password" placeholder="Password" required/>     		  
    		  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="giris" type="Submit">Giriş</button>  			
		</form>
         </div>
     </div>             
                            <div class="row" align="center">
                            <h3>&nbsp; </h3>
                            <h3>DURMA SAVAŞ ZAMANI... </h3>
                               <p><img src="img/unnamed.jpg"> </p>                             
                               <p>&nbsp;</p>
                               <p>&nbsp;</p>
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
<?php
	}
	else if ( (isset($_POST['Username'])) && !isset($_SESSION['login_ok']) )
	{
		$giris_adi 	 = $_POST['Username'];
		$giris_sifre = md5($_POST['Password']);


		if(($giris_adi == "") or ($giris_sifre == ""))
		{
			echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=giris.php">';
		}
		else
		{
			$uyeler = @mysql_query("SELECT * FROM uyeler WHERE username='$giris_adi' and password='$giris_sifre'");
			$uyebul = @mysql_num_rows($uyeler);
			if($uyebul > 0)
			{ 
				$mailcek = @mysql_query("SELECT * FROM uyeler WHERE username='$giris_adi'"); 
				$mailcek2 = @mysql_fetch_array($mailcek);
				$_SESSION['kulladi'] 	= $giris_adi; 
				$_SESSION['username'] 	= $mailcek2['username'];
				$_SESSION['email']   	= $mailcek2['email']; 
				$_SESSION['login_ok']   = 1; 
				echo '<script type="text/javascript">alert("Başarıyla giriş yaptınız! Profil sayfanıza yönlendirileceksiniz...");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			}
			else
			{
				echo '<script type="text/javascript">alert("Kullanıcı adı veya şifreniz yanlış!");</script>';
				echo '<meta http-equiv="refresh" content="0;URL=giris.php">';
			}
		}
	}
	elseif(isset($_SESSION['login_ok']))
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
?>