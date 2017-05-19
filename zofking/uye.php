<?php
session_start();
require_once("config.php");

	function EpostaDogrula($email)
	{
		@getmxrr(substr($email,strpos($email,'@')+1),$Sonuc);

		if(count($Sonuc)>0){
			return true;
		}else {
			return false;
		}
	}	
	if(!isset($_GET['register']) && !isset($_SESSION['login_ok']))
	{
		require_once "body.php";
?>                        
<div class="row">   
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form action="uye.php?register=yes" method="post">	
        <div class="archive-title shadow-z-1">
          <h2>Üye Ol<span></span></h2>
       </div> 		
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                     <input type="text" id="first_name" class="form-control input-lg" placeholder="İsminizi Giriniz" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
				    <input type="text" id="last_name" class="form-control input-lg" placeholder="Soyisminizi Giriniz" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" id="display_name" class="form-control input-lg" placeholder="Kullanıcı Adınızı Giriniz" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" id="email" class="form-control input-lg" placeholder="Email Adresinizi Giriniz" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" id="password" class="form-control input-lg" placeholder="Şifrenizi Giriniz" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
					<input type="password" id="password_confirmation" class="form-control input-lg" placeholder="Tekrar Şifre" tabindex="6">
					</div>
				</div>
			</div>			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Kaydol" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="giris.php" class="btn btn-success btn-block btn-lg">Giriş Yap</a></div>
			</div>
            <br><br>
		</form>
	 </div>
    </div>
   </div>				        
  </div>
 </div>
</div>
        </section>
        <?php
		include"altkisim.php"
		?>
    </body>
</html>
<?php
	}
	elseif(isset($_GET['register']) == "yes")
	{
		$kullanici_adi 	       = $_POST['display_name'];
		$kullanici_sifre       = $_POST['password'];
		$kullanici_sifretekrar = $_POST['password_confirmation'];
		$kullanici_email       = $_POST['email'];
		$kullanici_isim        = $_POST['first_name'];
		$kullanici_soyad       = $_POST['last_name'];

		if(($kullanici_adi == "") and ($kullanici_sifre == "") and ($kullanici_sifretekrar == ""))
		{
			echo '<script type="text/javascript">alert("Boş bıraktığınız alanlar var!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
		}
		elseif((strlen($kullanici_adi) < 6 ) || (strlen($kullanici_sifre) < 6))
		{
			echo '<script type="text/javascript">alert("Kullanıcı adı yada şifre 6 harfden kısa olamaz!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
		}
		elseif((strlen($kullanici_adi) > 30 ) || (strlen($kullanici_sifre) > 30))
		{
			echo '<script type="text/javascript">alert("Kullanıcı adı yada şifre 30 harfden uzun olamaz!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/i", $kullanici_adi )) {
			echo '<script type="text/javascript">alert("Kullanıcı adınızda özel ve türkçe karakterler kullanmazsınız!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
		}
		elseif($kullanici_sifre != $kullanici_sifretekrar)
		{
			echo '<script type="text/javascript">alert("Şifreleriniz birbiriyle uyuşmuyor!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
		}
		elseif (!EpostaDogrula($kullanici_email)) 
		{
			echo '<script type="text/javascript">alert("E-Posta adresiniz geçersiz.");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=uye.php">';
		}
		else
		{
			$kullanici_sifre = md5($kullanici_sifre);
			$kullanici_kaydet = @mysql_query("INSERT INTO uyeler (username,password,email,first_name,last_name,register_date) VALUES ('$kullanici_adi','$kullanici_sifre','$kullanici_email','$kullanici_isim','$kullanici_soyad', NOW())");
			echo '<script type="text/javascript">alert("Kayıt işleminiz başarıyla gerçekleşti!");</script>';
			echo '<meta http-equiv="refresh" content="0;URL=giris.php">';
		}
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
?>