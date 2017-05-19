<?php

$vt_host 	   = "127.0.0.1";
$vt_kullanici  = "root";
$vt_sifre 	   = "";
$vt_adi 	   = "zofking";

$vtbaglan = @mysql_connect($vt_host,$vt_kullanici,$vt_sifre) or die("Veritabanı bağlantısı sağlanamadı!");
mysql_select_db($vt_adi,$vtbaglan) or die("Veritabanı bulunamadı!");
@mysql_query("SET NAMES 'utf8'");
?>
