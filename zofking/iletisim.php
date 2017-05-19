<?php
	require_once "body.php";
?>
                            
                            <div class="row" align="center">
                            <div class="col-md-10 col-md-offset-1">
                                    <div class="article-list">
                                        <div class="entry-content">
                                            <div class="entry-title text-center">
                                               <div class="archive-title shadow-z-1">
                               <h2>Bize Ulaşın</h2>
                         </div>   
                                            </div>

                                            <div id="map-canvas"></div>                                        
                                            <!-- Google Maps API -->
                                            <script src="https://maps.googleapis.com/maps/api/js"></script>
                                            <script>
                                                function initialize() {
                                                  var mapOptions = {
                                                    zoom: 17,
                                                    scrollwheel: false,
                                                    center: new google.maps.LatLng(18.013764, -76.801992)
                                                  };

                                                  var map = new google.maps.Map(document.getElementById('map-canvas'),
                                                      mapOptions);


                                                  var marker = new google.maps.Marker({
                                                    position: map.getCenter(),
                                                    icon: 'img/map-marker.png',
                                                    map: map
                                                  });

                                                }

                                                google.maps.event.addDomListener(window, 'load', initialize);
                                            </script>                                         

                                            <div class="contact-form shadow-z-1">
                                                <h2 class="contact-title">LÜTFEN BİLGİLERİNİZİ GİRİNİZ</h2>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-control-wrapper">
                                                            <input type="text" class="form-control empty">
                                                            <div class="floating-label">İsminiz</div>
                                                            <span class="material-input"></span>
                                                        </div>                                                     
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-control-wrapper">
                                                            <input type="text" class="form-control empty">
                                                            <div class="floating-label">Soyisminiz</div>
                                                            <span class="material-input"></span>
                                                        </div>                                                     
                                                    </div>
                                                </div>

                                                <div class="form-control-wrapper">
                                                    <input type="text" class="form-control empty">
                                                    <div class="floating-label">E-mail adresiniz</div>
                                                    <span class="material-input"></span>
                                                </div>

                                                <div class="form-control-wrapper">
                                                    <textarea name="message" id="message" class="form-control empty" cols="30" rows="10"></textarea>
                                                    <div class="floating-label">İletiniz</div>
                                                    <span class="material-input"></span>
                                                </div>

                                                <p><button type="submit" class="btn btn-danger">Mesajı Gönder</button></p>




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
        
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-lg-offset-1">
                        <div class="footer-wid">
                            <h2 class="wid-title">Yenilmezler<span></span></h2>
                            <p>Ejderha Tanrısı, uzun zamandır Shinsoo, Chunjo ve Jinno krallıklarını nefesiyle koruma altına almıştı. Fakat artık büyük bir tehditle karşı karşıya olan bu<strong>muhteşem büyüler dünyasını</strong>, <strong>Metin Taşları</strong> sadece büyük hasara uğratmakla kalmadı, kıtayı ve sakinlerini kaos ve yıkıma sürükledi. Krallıklar arasında savaş çıktı. Yırtıcı hayvanlar vahşi canavarlara, ölüler kana susamış mahlûkatlara dönüştü. <strong>Metin Taşları'nın karanlık etkilerine karşı</strong> <strong>Ejderha Tanrısı'nın müttefiği olarak</strong> savaş. Krallığının geleceğini korku, acı ve yıkımdan kurtarmak için <strong>gücünü topla ve kılıcını çek</strong>!</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-wid">
                            <h2 class="wid-title">Haberdar Olmak İçin</h2>
                            <p>Oyunumuzun her yeniliklerinden, güncelleştirmemelerden bilgimin olmasını istiyorsan e-mailini hemen gönder. Oyunumuzdan haberdar ol.</p>
                            
                            <div class="newsletter-form">
                                <form action="index.html">
                                    <input class="shadow-z-1" type="email" placeholder="Mail adresinizi giriniz">
                                    <button type="submit" class="btn btn-material-red">Abone Ol</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bottom">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="copyright-text">
                                        <p>© 2015 Zofking - Tüm hakları bize aittir. by <a href="#" target="_blank">Salih &amp; Anıl</a></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="social-links footer-social-links">
                                        <a class="btn social-link" href="javascript:void(0)"><i class="fa fa-facebook"></i> <div class="ripple-wrapper"></div></a>
                                        <a class="btn social-link" href="javascript:void(0)"><i class="fa fa-twitter"></i> <div class="ripple-wrapper"></div></a>
                                        <a class="btn social-link" href="javascript:void(0)"><i class="fa fa-google-plus"></i> <div class="ripple-wrapper"></div></a>
                                        <a class="btn social-link" href="javascript:void(0)"><i class="fa fa-youtube"></i> <div class="ripple-wrapper"></div></a>
                                        <a class="btn social-link" href="javascript:void(0)"><i class="fa fa-linkedin"></i> <div class="ripple-wrapper"></div></a>
                                    </div>                        
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
    </body>
</html>