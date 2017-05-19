<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Zofking</title>      
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,500,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <link rel="stylesheet" href="css/material.min.css">
        
        <link rel="stylesheet" href="css/ripples.min.css">       
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/kullanici_girisi.css">		
    </head>
    <body>      
        <header class="header">
            <div data-velocity="-.4" id="particles" class="header-bg"></div>  
             <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="social-links">
			 <?php
				if(isset($_SESSION['login_ok']))
				{
					echo '<h3><font color="red">Hoşgeldin '.$_SESSION['kulladi'].'!</font></h3>';
					echo '<font color="red">Çıkış yapmak için <a href="cikis.php" style="color:blue">tıklayın.</a> </font><br>';						
				}else
					{								
						echo '<button type="button" class="btn btn-primary btn-sm">
	 					<a href="uye.php"><span class="glyphicon glyphicon-user"></span>  ÜYE OL </a></button>
                        <button type="button" class="btn btn-success btn-sm">
	 					<a href="giris.php"><span class="glyphicon glyphicon-log-in"></span> GİRİŞ </a> </button> ';
					}
			 ?>
       					<a class="btn social-link" href="javascript:void(0)"><i class="fa fa-facebook"></i> </a>
        				<a class="btn social-link" href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
        				<a class="btn social-link" href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></div>
                    </div>
                </div>
            </div>
            
            <div class="site-title-table">
                <div class="site-title-tablecell">
                    <div class="slide-text">
                        <h2><a href="index.php"><span>Z</span>of<span>KİNGS</span></a></h2>                            
                    </div>
                </div>
            </div>           
        </header>
              
            <div class="container">                                
                <div class="maincotnent shadow-z-1">    
                  <div class="mainmenu">
                    <div class="navbar navbar-nobg">
                      <div class="navbar-collapse collapse"> 
                         <ul class="nav navbar-nav">
                         <li><a href="index.php">ANASAYFA</a></li>
                         <li><a href="kullanicilar.php">KULLANICILAR</a></li>
                         <li><a href="haberler.php">HABERLER</a></li>
                         <li><a href="urunler.php">ÜRÜNLER</a></li>
                         <li><a href="gorusler.php">GÖRÜŞLER</a></li>
                         <li><a href="iletisim.php">İLETİŞİM</a></li>
                         <hr color="#FF0000">  
                         </ul>                                                                           
                      </div>      
                    </div> 
                  </div>   
            </body>
          </html>
                  
                  
                 