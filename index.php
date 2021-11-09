<?php
include_once("./server.php");
?>
<!doctype html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çengelköy Tarihi Çınaraltı Aile Çay Bahçesi</title>
    <link rel="stylesheet" href="css/app.css"> 
    <link rel="shortcut icon" href="/assets/img/cay.jpg" type="image/x-icon" >
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/scrollreveal@4.0.0-beta.6"></script>
    <script>
        $( function() {
          $( "#dialog" ).dialog({
            autoOpen: false,
            show: {
              effect: "blind",
              duration: 1000
            },
            hide: {
              effect: "explode",
              duration: 1000
            }
          });
       
          $( "#opener" ).on( "click", function() {
            $( "#dialog" ).dialog( "open" );
          });
        } );
        </script>



</head>

<body>
    
    <header class="site-header">
       
        <div class="container">
            
            <div class="header-content">
                
                <div class="top-menu  scroll-reveal"> 
                   <a href="./index.php"> <img style="float: left;" src="assets/img/logo1.png" width="200" height="70" alt="Web Sitesi Logosu" /> </a>                  
                    <div class="menu">
                        
                        <div class="title-bar" data-responsive-toggle="main-nav" data-hide-for="medium">
                            <button class="menu-icon dark" type="button" data-toggle="main-nav"></button>
                            <div class="title-bar-title">Menü</div>
                        </div>

                        <nav id="main-nav" data-animate="menu-in menu-out">
                            <ul class="main-navigation">
                                <li><a class="m-active" href="#" data-text="Home">Ana Sayfa</a></li>
                                <li><a class="m-anim" href="#specials-grid" data-text="Specials">Galeri</a></li>
                                <li><a class="m-anim" href="#about-us" data-text="About">Hakkımızda</a></li>
                                <li><a class="m-anim" href="#main-menu" data-text="Menu Cart">Menü</a></li>
                                <li><a class="m-anim" href="#contact-us" data-text="Contact">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $sql = "SELECT * FROM texts INNER JOIN text_types WHERE texts.type_id=text_types.type_id AND text_types.type_name='ust'";
        $result = $DBconn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="slider">
            <div class="a-slide slide1">
                <div class="container">
                    <div class="bottom-section scroll-reveal" data-origin="right" data-distance="20%">
                        <h1 class="header-txt"><?php echo $row['content'] ?></h1>
                        <div class="divider">
                            <?xml version="1.0" encoding="utf-8"?>
                            
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1930 255.5" style="enable-background:new 0 0 1930 255.5;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;stroke:#3c3c3c;stroke-width:10;stroke-linecap:square;stroke-miterlimit:10;}
                                </style>
                                <polyline class="st0" points="1224,171.8 1181.3,171.8 1139.2,129.6 1065,203.9 970.5,110.4 876,203.6 801.8,129.4 759.7,171.5 
                                    717,171.5 "/>
                                <polyline class="st0" points="5,131.5 757.3,131.5 801.8,176.1 885.9,91.9 868.3,74.2 831.5,111 870.4,149.9 970.2,50.2 1070,149.9 
                                    1108.8,111 1072.1,74.2 1054.4,91.9 1138.5,176.1 1183.1,131.5 1925,131.5 "/>
                                <rect x="921.9" y="26.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 231.426 707.2043)" class="st0" width="95" height="95"/>
                                <rect x="921.9" y="99.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 179.8072 728.5855)" class="st0" width="95" height="95"/>
                                <rect x="940.3" y="178.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 137.3893 746.1556)" class="st0" width="58.2" height="58.2"/>
                                </svg>
                        </div>
                        <!--.divider-->

                    </div>
                    <!--.bottom-section-->
                </div>
            </div>
            
            <?php } ?>
        </div>

    </header>

    <section class="category-icons">
        <div class="container">
            <div class="yellow-content">
                <div class="icon">
                    <img class="scroll-reveal" data-origin="top" data-distance="20%" src="assets/ikon/tea.svg" />
                    <h3 class="scroll-reveal" data-origin="top" data-distance="20%">Çay</h3>
                    <p class="scroll-reveal" data-distance="0" data-duration="500">Rize’den dört sürümde toplanır. Paketlendikten sonra en az 1 sene tadının daha da güzelleşmesi için kuru kalacak şekilde kendi depolarımı…
                        <br><br> <button style="cursor: pointer;" id="myBtn"><b>Tamamını okumak için tıklayınız.</b></button>

                        <!-- The Modal -->
                        <div id="myModel" class="model">
                        
                          <!-- Modal content -->
                          <div class="model-content">
                            <span class="closee">&times;</span>
                            <p>Rize’den dört sürümde toplanır. Paketlendikten sonra en az 1 sene tadının daha da güzelleşmesi için kuru kalacak şekilde kendi depolarımızda bekletilir. Zamanı gelen çaylar işin ehli ustaları tarafından yıllardır aynı metotla demlenir.

                                Çay kazanlarımızın her hafta bakımı ve temizliği itina ile yapıldığı için suyun en verimli haline erişiyoruz.
                                
                                Çaykur Filiz Çay’ını hiçbir katkı maddesi kullanmadan demleyerek çayın son halini tüm tazeliği ile 7 gün 24 saat müşterimize sunuyoruz.
                                
                                Çayımıza katkı maddesi koyulduğuna daire hakkımızda yapılan dedikodular hiçbir şekilde ispat edilemeyecek yalanlardır.</p>
                          </div>
                        
                        </div>
                    </p>
                </div>
             
                   
                <div class="icon">
                    <img class="scroll-reveal" data-origin="top" data-distance="20%" src="assets/ikon/algetir.svg" />
                    <h3 class="scroll-reveal" data-origin="top" data-distance="20%">Al Getir</h3>
                    <p class="scroll-reveal" data-distance="0" data-duration="700">İstanbul gibi güzel bir şehirde yaşıyor olmamıza rağmen güzelliklerinden mahrum kalabiliyoruz. Biliyoruz ki çoğumuzun evinde boğaza karşı…
                        <br><br> <button style="cursor: pointer;" id="myBtn_1"><b>Tamamını okumak için tıklayınız.</b></button>

                        <!-- The Modal -->
                        <div id="myModel_1" class="model_1">
                        
                          <!-- Modal content -->
                          <div class="model-content_1">
                            <span class="closee_1">&times;</span>
                            <p>İstanbul gibi güzel bir şehirde yaşıyor olmamıza rağmen güzelliklerinden mahrum kalabiliyoruz. Biliyoruz ki çoğumuzun evinde boğaza karşı yemek yeme şansı yok. Bizde açıldığımız günden bu yana herkes kendini evinde hissetsin diye dışarıdan yiyeceklerinizi getirmenizin daha iyi olacağını düşünerek böyle bir akım başlattık. Evinizde hazırladığınız ve dışarıdan aldığınız yiyeceklerinizi getirebiliyorsunuz. Bunun yanı sıra “günün en önemli yemeği kahvaltıdır” sözünden yola çıkarak buna çok önem veriyoruz ve kahvaltı yapılacak mekânlar arasında ülkemizde başı çekiyoruz.</p>
                          </div>
                        
                        </div>
                    </p>
                </div>
                <div class="icon">
                    <img class="scroll-reveal" data-origin="top" data-distance="20%" src="assets/ikon/family.svg" />
                    <h3 class="scroll-reveal" data-origin="top" data-distance="20%">Aile Ortamı</h3>
                    <p class="scroll-reveal" data-distance="0" data-duration="900">Tarih boyunca çınar ağaçlarının altları, gölgesinden istifade ederek istirahat edilebilen ve kahve ortamlarının vazgeçilemeyen bir simgesi haline…
                        <br><br> <button style="cursor: pointer;" id="myBtn_2"><b>Tamamını okumak için tıklayınız.</b></button>

                        <!-- The Modal -->
                        <div id="myModel_2" class="model_2">
                        
                          <!-- Modal content -->
                          <div class="model-content_2">
                            <span class="closee_2">&times;</span>
                            <p>Tarih boyunca çınar ağaçlarının altları, gölgesinden istifade ederek istirahat edilebilen ve kahve ortamlarının vazgeçilemeyen bir simge haline gelmiştir. Bizde bu geleneği 1994 yılından beri AİLE ÇAY BAHÇESİ olarak sürdürüyoruz. Sağladığımız ortamı ailelerin tercih etmesindeki en büyük etken olarak gelenek görenek ve ahlaki yaşam tarzına gösterdiğimiz hassasiyete bağlıyoruz. Buda bu güzel ortama günün ve gecenin her saati ailelerin gelmesine vesile oluyor.</p>
                          </div>
                        
                        </div>
                    </p>
                </div>
            </div>
            
            <!--.yellow-content-->
        </div>
        <!--.container-->
    </section>
    <!--.category-icons-->
    <!-- Slider main container -->
   
   <h1 style="text-align: center;margin-top: 5%;"><b>GALERİ</b> </h1>
    <section id="specials-grid" class="month-specials" data-scroll-reveal="enter from the bottom after 0.9s">
        <div class="container">
            <div class="swiper swiper1">
                <!-- Additional required wrapper -->
               
                <div style="display: flex;" class="swiper-wrapper">        
                  
                <?php
                $sql = "SELECT * FROM image_types INNER JOIN images WHERE images.type_id=image_types.type_id AND image_types.type_name='galeri'";
                $result = $DBconn->query($sql);
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $path ="assets/" .  "galeri" . "/" . $row['image_name'];
                ?>
                  <div class="swiper-slide">
                      <img class="hover-shadow center" onclick="openModal();currentSlide(<?php echo $i++ ?>)"  src="<?php echo $path ?>" alt="">
                  </div>
                  <?php } ?>
                </div>
                <div style="color: black;" class="swiper-button-prev"></div>
                <div style="color: black;" class="swiper-button-next"></div>
                <!-- If we need pagination -->
               
              
                <!-- If we need navigation buttons -->
               
              
              
              </div>
            <!--.specials-content-->
        </div>
        <!--.container-->
    </section>
    <!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

    <?php
    $sql = "SELECT * FROM image_types INNER JOIN images WHERE images.type_id=image_types.type_id AND image_types.type_name='galeri'";
    $result = $DBconn->query($sql);
    $i = 1;
    while($row = mysqli_fetch_assoc($result)){
        $path ="assets/" .  "galeri" . "/" . $row['image_name'];
    ?>
  
      <div class="mySlides">
        <div class="numbertext"><?php echo $i++ . "/" . count($row) ?></div>
        <img src="<?php echo $path ?>" style="width:100%">
      </div>
  <?php } ?>
      
  
  
      <!-- Next/previous controls -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
      <!-- Caption text -->
      <div class="caption-container">
        <p id="caption"></p>
      </div>
  
      <!-- Thumbnail image controls -->
     
    </div>
  </div>
    <!--.month-specials-->

    <section id="about-us" class="about">
        <div class="container">
            <div class="about-content">
                <h1 class="header-txt scroll-reveal">Hakkımızda</h1>
                <div class="divider scroll-reveal">
                    <?xml version="1.0" encoding="utf-8"?>
                    <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1930 255.5" style="enable-background:new 0 0 1930 255.5;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;stroke:#3c3c3c;stroke-width:10;stroke-linecap:square;stroke-miterlimit:10;}
                                </style>
                                <polyline class="st0" points="1224,171.8 1181.3,171.8 1139.2,129.6 1065,203.9 970.5,110.4 876,203.6 801.8,129.4 759.7,171.5 
                                    717,171.5 "/>
                                <polyline class="st0" points="5,131.5 757.3,131.5 801.8,176.1 885.9,91.9 868.3,74.2 831.5,111 870.4,149.9 970.2,50.2 1070,149.9 
                                    1108.8,111 1072.1,74.2 1054.4,91.9 1138.5,176.1 1183.1,131.5 1925,131.5 "/>
                                <rect x="921.9" y="26.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 231.426 707.2043)" class="st0" width="95" height="95"/>
                                <rect x="921.9" y="99.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 179.8072 728.5855)" class="st0" width="95" height="95"/>
                                <rect x="940.3" y="178.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 137.3893 746.1556)" class="st0" width="58.2" height="58.2"/>
                                </svg>
                </div>
                <!--.divider--> 

                <?php
                $sql = "SELECT * FROM texts INNER JOIN text_types WHERE texts.type_id=text_types.type_id AND text_types.type_name='hakkimizda'";
                $result = $DBconn->query($sql);
                $row = mysqli_fetch_assoc($result);

                ?>
                <p class="scroll-reveal" data-origin="top" data-distance="10%"><?php echo $row['content'] ?></p>
               
            </div>
        </div>
        <!--.container-->
    </section>
    <!--.about-->
    <section class="category-icons">
        <div class="container">  
            <div class="yellow-content">

                <?php
                $sql = "SELECT * FROM texts INNER JOIN text_types INNER JOIN images WHERE texts.type_id=text_types.type_id AND text_types.type_name='yazilar' AND images.image_id=texts.icon_id";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){
                    $path ="assets/" .  "ikon" . "/" . $row['image_name'];
                ?>
                
                <div class=" icon">
                    <img class="scroll-reveal" data-origin="top" data-distance="20%" src="<?php echo $path ?>" />
                    <h3 class="scroll-reveal" data-origin="top" data-distance="20%"><?php echo $row['title'] ?></h3>
                    <p class="scroll-reveal" data-distance="0" data-duration="500"><?php echo $row['content'] ?></p>
                </div>
            <?php } ?>
                
            </div>                               
        
            <!--.yellow-content-->
        </div>        
        <!--.container-->
    </section>
    <section id="main-menu" class="menu-cart scroll-reveal">
        <div class="container">
            <h1 class="header-txt">Menü</h1>
            <div class="divider">
                <?xml version="1.0" encoding="utf-8"?>
                <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1930 255.5" style="enable-background:new 0 0 1930 255.5;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;stroke:#3c3c3c;stroke-width:10;stroke-linecap:square;stroke-miterlimit:10;}
                                </style>
                                <polyline class="st0" points="1224,171.8 1181.3,171.8 1139.2,129.6 1065,203.9 970.5,110.4 876,203.6 801.8,129.4 759.7,171.5 
                                    717,171.5 "/>
                                <polyline class="st0" points="5,131.5 757.3,131.5 801.8,176.1 885.9,91.9 868.3,74.2 831.5,111 870.4,149.9 970.2,50.2 1070,149.9 
                                    1108.8,111 1072.1,74.2 1054.4,91.9 1138.5,176.1 1183.1,131.5 1925,131.5 "/>
                                <rect x="921.9" y="26.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 231.426 707.2043)" class="st0" width="95" height="95"/>
                                <rect x="921.9" y="99.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 179.8072 728.5855)" class="st0" width="95" height="95"/>
                                <rect x="940.3" y="178.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 137.3893 746.1556)" class="st0" width="58.2" height="58.2"/>
                                </svg>
            </div>
            <!--.divider-->
            <ul class="menu-navigation" data-tabs data-match-height="true" id="example-tabs">

                <div class="dropdown" style="float:left;">
                <li class="tabs-title is-active"><a class="m-anim dropbtn" href="#panel1" aria-selected="true" data-text="Starters">Kahvaltı</a></li>
                <div class="dropdown-content" style="left:0;">
                   
                    <li class="tabs-title"><a class="m-anim" data-tabs-target="panel1" href="#panel1" data-text="Drinks">Ana Kahvaltı</a></li>
                    <li class="tabs-title"><a class="m-anim" data-tabs-target="panel2" href="#panel2" data-text="Drinks">Tost Ve Sandviç</a></li>
                  </div>
                </div>                   
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel3" href="#panel3" data-text="Desserts">Aperatifler</a></li>
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel4" href="#panel4" data-text="Drinks">Köfte</a></li>
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel5" href="#panel5" data-text="Drinks">Burger</a></li>
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel6" href="#panel6" data-text="Drinks">Balık</a></li>
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel7" href="#panel7" data-text="Drinks">Çorba</a></li>
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel8" href="#panel8" data-text="Drinks">Salata</a></li>
                <li class="tabs-title"><a class="m-anim" data-tabs-target="panel9" href="#panel9" data-text="Drinks">Tatlı</a></li>
                <div class="dropdown" style="float:left;">
                    <li class="tabs-title is-active"><a class="m-anim dropbtn" href="#panel10" aria-selected="true" data-text="Starters">İçecekler</a></li>
                    <div class="dropdown-content" style="left:0;">
                       
                        <li class="tabs-title"><a class="m-anim" data-tabs-target="panel10" href="#panel10" data-text="Drinks">Sıcak İçecekler</a></li>
                        <li class="tabs-title"><a class="m-anim" data-tabs-target="panel11" href="#panel11" data-text="Drinks">Soğuk İçecekler</a></li>
                        <li class="tabs-title"><a class="m-anim" data-tabs-target="panel12" href="#panel12" data-text="Drinks">Meşrubat </a></li>
                      </div>
                    </div>       
               
            </ul>

            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel is-active" id="panel1">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <td><span>Kahvaltı Tabağı (Breakfast Plate)</span></td>
                                    <td><span>30₺</span></td>
                                </tr>
                                <tr>
                                    <td>Beyaz Peynir,Kaşar Peyniri,Siyah Zeytin,Yeşil Zeytin,Bal,Tereyağ,Reçel,Haşlanmış Yumurta,Domates,Salatalık,Sivri Biber,Kırmızı Biber,Maydonoz</td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    
                                    <td><span><br><b>SEÇMELİ KAHVALTI</b></span></td>
                                </tr>
                                <tr>
                                    <td><span>Kaşar Peyniri</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Beyaz Peynir</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>White Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Zeytin</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Olive</td>
                                </tr>
                                <tr>
                                    <td><span>Salam</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Cold Guts(Meat)</td>
                                </tr>
                                <tr>
                                    <td><span>Bal</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Honey</td>
                                </tr>
                                <tr>
                                    <td><span>Reçel</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                </tr>
                                <tr>
                                    <td><span>Tereyağ</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Butter</td>
                                </tr>
                                <tr>
                                    <td><span>Bal - Tereyağ</span></td>
                                    <td><span>20₺</span></td>
                                </tr>
                                <tr>
                                    <td>Honey - Butter</td>
                                </tr>
                                <tr>
                                    <td><span>Çikolata</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Chocolate</td>
                                </tr>
                                <tr>
                                    <td><span>Haşlanmış Yumurta</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Boiled Eggs</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                        <div class="menu-section">
                            <table>
                                <tr>

                                </tr>
                                
                                <tr>
                                    <td><span><br><b>YUMURTA(EGG)</b></span></td>
                                </tr>

                                <tr>
                                    <td><span>Sahanda Yumurta</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Fried Eggs</td>
                                </tr>
                                <tr>
                                    <td><span>Kaşar Peynirli Yumurta</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Fried Eggs w/Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Beyaz Peynirli Yumurta</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Fried Eggs w/White Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Sucuklu Yumurta</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Fried Eggs w/Sucuk (Turkish Sausage)</td>
                                </tr>
                                <tr>
                                    <td><span>Karışık Yumurta</span></td>
                                    <td><span>17.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mixed Fried Eggs</td>
                                </tr>
                                <tr>

                                </tr>
                                
                                <tr>
                                    <td><span><br><b>OMLET (OMELETTE)</b></span></td>
                                </tr>

                                <tr>
                                    <td><span>Omlet</span></td>
                                    <td><span>10₺</span></td>
                                </tr>
                                <tr>
                                    <td>Omelette</td>
                                </tr>
                                <tr>
                                    <td><span>Kaşarlı Omlet</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Omelette w/Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Beyaz Peynirli Omlet</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Omelette w/White Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Sucuklu Omlet</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Omelette w/Sucuk (Turkish Sausage)</td>
                                </tr>
                                <tr>
                                    <td><span>Karışık Omlet</span></td>
                                    <td><span>17.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mixed Omelette</td>
                                </tr>
                                <tr>

                                </tr>
                                
                                <tr>
                                    <td><span><br><b>MENEMEN (TURKİSH SCRAMBLED EGGS W/TOMATOES)</b></span></td>
                                </tr>

                                <tr>
                                    <td><span>Menemen</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Menemen</td>
                                </tr>
                                <tr>
                                    <td><span>Kaşarlı Menemen</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Menemen w/Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Beyaz Peynirli Menemen</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Menemen w/White Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Sucuklu Menemen</span></td>
                                    <td><span>17.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Menemen w/Sucuk (Turkish Sausage)</td>
                                </tr>
                                <tr>
                                    <td><span>Karışık Menemen</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mixed Menemen</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <!--#panel1-->

                <div class="tabs-panel" id="panel2">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>

                                <tr>
                                    <tr>
                                        <td><span><br><b>TOST (TOASTED SANDWICH)</b></span></td>
                                    </tr>
                                </tr>

                                <tr>
                                    <td><span>Kaşarlı Tost</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Toasted w/Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Beyaz Peynirli Tost</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Toasted w/White Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Acukalı Tost</span></td>
                                    <td><span>11.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Toasted Acuka</td>
                                </tr>
                                <tr>
                                    <td><span>Sucuklu Tost</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Toasted w/Sucuk (Turkish Sausage)</td>
                                </tr>
                                <tr>
                                    <td><span>Karışık Tost</span></td>
                                    <td><span>14.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Toasted Mixed</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Kaşarlı Tost</span></td>
                                    <td><span>14.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Beyaz Peynirli Tost</span></td>
                                    <td><span>14.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/White Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Acukalı Tost</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/Acuka</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Sucuklu Tost</span></td>
                                    <td><span>17.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/Sucuk (Turkish Sausage)</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Karışık</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/Mixed</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>SOĞUK SANDVİÇ (COLD SANDWICH)</b></span></td>
                                    </tr>
                                </tr>

                                <tr>
                                    <td><span>Kaşar, Domates, Sivri Biber</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mild Cheese, Tomato, Green Chili</td>
                                </tr>
                                <tr>
                                    <td><span>Beyaz Peynir, Domates, Sivri Biber</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>White Cheese, Tomato, Green Chili</td>
                                </tr>
                                <tr>
                                    <td><span>Sucuk, Kaşar</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Turkish Sausage, Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Salam, Kaşar</span></td>
                                    <td><span>12.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Cold Cuts (Meat), Mild Cheese</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <!--#panel2-->

                <div class="tabs-panel" id="panel3">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>

                                <tr>
                                    <tr>
                                        <td><span><br><b>APERATİF (APPETIZER)</b></span></td>
                                    </tr>
                                </tr>

                                <tr>
                                    <td><span>Sucuk Tava</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Pan-Fried Sucuk (Turkish Sausage)</td>
                                </tr>
                                <tr>
                                    <td><span>Patates Tava</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Pan-Fried Potatoes</td>
                                </tr>
                                <tr>
                                    <td><span>Sosis Tava</span></td>
                                    <td><span>25.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Pan-Fried Sausages</td>
                                </tr>
                                <tr>
                                    <td><span>Sosisli Sandviç</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Hotdog</td>
                                </tr>
                                <tr>
                                    <td><span>Sade Patso</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Plain Potato Sandwich</td>
                                </tr>
                                <tr>
                                    <td><span>Sosisli Patso</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Sausages Potato Sandwich</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Sucuk</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/ Sucuk (Turkish Sausage)</td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    <!--.menu-content-->
                </div>
                <!--#panel3-->

                <div class="tabs-panel" id="panel4">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>KÖFTE (MEATBALL)</b></span></td>
                                    </tr>
                                </tr>

                                <tr>
                                    <td><span>Akçaabat Köfte</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Akcaabat Meatballs</td>
                                </tr>
                                <tr>
                                    <td><span>Sebzeli Akçaabat Köfte</span></td>
                                    <td><span>32.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Akcaabat Meatballs With Vegetables</td>
                                </tr>
                                <tr>
                                    <td><span>Kaşarlı Akçaabat Köfte</span></td>
                                    <td><span>32.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Akcaabat Meatballs With Mild Cheese</td>
                                </tr>
                                <tr>
                                    <td><span>Karışık Akçaabat Köfte</span></td>
                                    <td><span>35.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mixed Akcaabat Meatballs</td>
                                </tr>
                                <tr>
                                    <td><span>Biga Izgara Köfte</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Biga Grilled Meatballs</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>Diğer Seçenekler (Other Options)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Tavuk Şinitzel</span></td>
                                    <td><span>25.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Chicken Schnitzel</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Akçaabat Köfte</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/ Akcaabat Meatballs</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Biga Izgara Köfte</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/ Grilled Biga Meatballs</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Şinitzel</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/ Schnitzel</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <!--#panel4-->
                
                <div class="tabs-panel" id="panel5">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>BURGER (BURGER)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Köfte Burger (80gr.)</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Beef Burger</td>
                                </tr>
                                <tr>
                                    <td><span>Köfte Burger (120gr.)</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Beef Burger</td>
                                </tr>
                                <tr>
                                    <td><span>Duble Köfte Burger (160gr.)</span></td>
                                    <td><span>40.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Double Beef Burger</td>
                                </tr>
                                <tr>
                                    <td><span>Çedarlı Köfte Burger (80gr.)</span></td>
                                    <td><span>22.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Beef Burger w/ Cheddar</td>
                                </tr>
                                <tr>
                                    <td><span>Çedarlı Burger (120gr.)</span></td>
                                    <td><span>32.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Beef Burger w/ Cheddar</td>
                                </tr>
                                <tr>
                                    <td><span>Duble Çedarlı Köfte Burger (160gr.)</span></td>
                                    <td><span>42.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Double Beef Burger w/ Cheddar</td>
                                </tr>
                                <tr>
                                    <td><span>Tavuk Burger</span></td>
                                    <td><span>17.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Chicken Burger</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->                        
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel6">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>BALIK (FISH)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Fileto Mezgit Tava</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Pan-Fried Blue Whiting Fillet</td>
                                </tr>
                                <tr>
                                    <td><span>Hamsi Tava (Mevsiminde)</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Pan-Fried Anchovy (seasonably)</td>
                                </tr>
                                <tr>
                                    <td><span>İstavrit Tava (Mevsiminde)</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Pan-Fried Horse Mackerel (seasonably)</td>
                                </tr>
                                <tr>
                                    <td><span>Uskumru Izgara</span></td>
                                    <td><span>30.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>BGrilled Mackerel</td>
                                </tr>
                                <tr>
                                    <td><span>Çupra Izgara</span></td>
                                    <td><span>35.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Grilled Seabream</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Uskumru</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/Mackerel</td>
                                </tr>
                                <tr>
                                    <td><span>Yarım Ekmek Mezgit</span></td>
                                    <td><span>20.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Half Bread w/Blue Whiting</td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->                        
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel7">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>ÇORBA (SOUP)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Günün Çorbası</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Soup of the day</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--.menu-section-->                        
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel8">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>SALATA (SALAD)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Salata</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Salad</td>
                                </tr>
                                <tr>
                                    <td><span>Söğüş</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Sliced Tomatoes and Cucumbers</td>
                                </tr>
                                <tr>
                                    <td><span>Yeşil Salata</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Green Salad</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--.menu-section-->                        
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel9">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>TATLI (DESSERT)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Trabzon Fındıklı Baklava</span></td>
                                    <td><span>15.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Trabzon Baklava with nuts</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--.menu-section-->                        
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel10">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>ÇAY (TEA)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Çay Bardağı</span></td>
                                    <td><span>5.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Tea Glass</td>
                                </tr>
                                <tr>
                                    <td><span>Su Bardağı</span></td>
                                    <td><span>7.50₺</span></td>
                                </tr>
                                <tr>
                                    <td>Regular Glass</td>
                                </tr>
                                <tr>
                                    <td><span>Fincan</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Tea Cup</td>
                                </tr>
                                <tr>
                                    <tr>
                                        <td><span><br><b>BİTKİ ÇAYI (HERB TEA)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Ada Çayı </span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Sage Tea</td>
                                </tr>
                                <tr>
                                    <td><span>Ihlamur</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Linden Tea</td>
                                </tr>
                                <tr>
                                    <td><span>Yeşil Çay</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Green Tea</td>
                                </tr>
                                <tr>
                                    <td><span>Nane-Limon </span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mint-Lemon</td>
                                </tr>
                                <tr>
                                    <tr>
                                        <td><span><br><b>SAHLEP (ORCHIS)</b></span></td>
                                        <td><span>15.00₺</span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <tr>
                                        <td><span><br><b>SU (MINERAL WATER)</b></span></td>
                                        <td><span>1.00₺</span></td>
                                    </tr>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->   
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>MEYVE ÇAYI (FRUIT TEA)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Kuşburnu </span></td>
                                    <td><span>5.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Rosehip</td>
                                </tr>
                                <tr>
                                    <td><span>Kivi</span></td>
                                    <td><span>5.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Kiwi</td>
                                </tr>
                                <tr>
                                    <td><span>Portakal</span></td>
                                    <td><span>5.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                </tr>
                                <tr>
                                    <td><span>Elma </span></td>
                                    <td><span>5.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Apple</td>
                                </tr>
                                <tr>
                                    <td><span>Fincan </span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Tea Cup</td>
                                </tr>
                                <tr>
                                    <tr>
                                        <td><span><br><b>KAHVE (COFFEE)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Türk Kahvesi </span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Turkish Coffee</td>
                                </tr>
                                <tr>
                                    <td><span>Hazır Kahve (Sütlü-Sade)</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>İnstant Coffee (With Milk or Without)</td>
                                </tr>
                                <tr>
                                    <td><span>Cappuccino</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Cappuccino</td>
                                </tr>
                                <tr>
                                    <td><span>Sıcak Çikolata </span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Hot Chocolate</td>
                                </tr>

                            </table>
                        </div>                     
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel11">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>GAZLI İÇEÇEK (SOFT DRINKS)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Kola</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Cola</td>
                                </tr>
                                <tr>
                                    <td><span>Zero</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Diet Cola</td>
                                </tr>
                                <tr>
                                    <td><span>Fanta</span></td>
                                    <td><span>10.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Fanta</td>
                                </tr>
                                <tr>
                                    <td><span>Gazoz</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Sparkling Soda</td>
                                </tr>
                                <tr>
                                    <td><span>Soda</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Sparkling Water</td>
                                </tr>
                                <tr>
                                    <td><span>Limonlu Soda</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Lemon Sparkling Water</td>
                                </tr>
                                <tr>
                                    <td><span>Elmalı Soda</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Apple Sparkling Water</td>
                                </tr>
                                <tr>
                                    <td><span>Mandalinalı Soda</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mandarin Sparkling Water</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--.menu-section-->   
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>SÜT (MİLK)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Süt </span></td>
                                    <td><span>4.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Milk</td>
                                </tr>
                                <tr>
                                    <td><span>Çikolatalı</span></td>
                                    <td><span>4.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Chocolate Milk</td>
                                </tr>
                                <tr>
                                    <td><span>Muzlu</span></td>
                                    <td><span>4.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Banana Milk</td>
                                </tr>
                                <tr>
                                    <td><span>Çilekli </span></td>
                                    <td><span>4.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Strawberry Milk</td>
                                </tr>
                                

                            </table>
                        </div>                     
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <div class="tabs-panel" id="panel12">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>MEŞRUBAT (NATURAL FRUIT BEVERAGES)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Kuşburnu Nektarı</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Rosehip</td>
                                </tr>
                                <tr>
                                    <td><span>Kızılcık Nektarı</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Cornelian Cherry</td>
                                </tr>
                                <tr>
                                    <td><span>Böğürtlen Nektarı</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>BlackBerry</td>
                                </tr>
                                <tr>
                                    <td><span>Vişne</span></td>
                                    <td><span>8.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Sour Cherry</td>
                                </tr>
                                <tr>
                                    <td><span>Kayısı</span></td>
                                    <td><span>8.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Apricot</td>
                                </tr>
                                <tr>
                                    <td><span>Şeftali</span></td>
                                    <td><span>8.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Peach</td>
                                </tr>
                                <tr>
                                    <td><span>Portakal</span></td>
                                    <td><span>8.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                </tr>
                                <tr>
                                    <td><span>Karışık</span></td>
                                    <td><span>8.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Mixed</td>
                                </tr>
                                <tr>
                                    <td><span>Limonata</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Lemonade</td>
                                </tr>
                                <tr>
                                    <td><span>Ayran</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Ayran (Yogurt Drink)</td>
                                </tr>
                                <tr>
                                    <td><span>Şalgam</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Turnip</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--.menu-section-->   
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <tr>
                                        <td><span><br><b>SOĞUK ÇAY (COLD TEA)</b></span></td>
                                    </tr>
                                </tr>
                                <tr>
                                    <td><span>Soğuk Çay Şeftali </span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Ice Tea With Peach</td>
                                </tr>
                                <tr>
                                    <td><span>Soğuk Çay Limon</span></td>
                                    <td><span>7.00₺</span></td>
                                </tr>
                                <tr>
                                    <td>Ice Tea With Lemon</td>
                                </tr>
                                
                            </table>
                        </div>                     
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
            </div>
        </div>
        <!--.container-->
    </section>
    <!--.menu-cart-->
<!-- Slider main container -->
    <a href="#0" class="cd-top">Top</a>

    <footer id="contact-us">
        <div class="container">
            <div class="footer-content">
                <h1 class="header-txt scroll-reveal">İletişim</h1>
                <div class="divider scroll-reveal">
                    <?xml version="1.0" encoding="utf-8"?>
                    <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1930 255.5" style="enable-background:new 0 0 1930 255.5;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;stroke:#3c3c3c;stroke-width:10;stroke-linecap:square;stroke-miterlimit:10;}
                                </style>
                                <polyline class="st0" points="1224,171.8 1181.3,171.8 1139.2,129.6 1065,203.9 970.5,110.4 876,203.6 801.8,129.4 759.7,171.5 
                                    717,171.5 "/>
                                <polyline class="st0" points="5,131.5 757.3,131.5 801.8,176.1 885.9,91.9 868.3,74.2 831.5,111 870.4,149.9 970.2,50.2 1070,149.9 
                                    1108.8,111 1072.1,74.2 1054.4,91.9 1138.5,176.1 1183.1,131.5 1925,131.5 "/>
                                <rect x="921.9" y="26.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 231.426 707.2043)" class="st0" width="95" height="95"/>
                                <rect x="921.9" y="99.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 179.8072 728.5855)" class="st0" width="95" height="95"/>
                                <rect x="940.3" y="178.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 137.3893 746.1556)" class="st0" width="58.2" height="58.2"/>
                                </svg>
                </div>
                <!--.divider-->
                <div class="contact-info scroll-reveal">
                    <div class="info-address">
                        <h3>Adres</h3>
                        <p>Çengelköy Cad. Çınarlı Camii Sok. No:4<br>Üsküdar İstanbul</p>
                    </div>
                    <div class="reservations">
                        <h3>Sosyal</h3>
                        <?php
                        $sql = "SELECT * FROM texts WHERE title='Mail'";
                        $result = $DBconn->query($sql);
                        $mail = mysqli_fetch_assoc($result);
                        ?>
                        <p><?php echo $mail['content'] ?></p>
                        
                    </div>
                </div>
                <!--.contact-info-->
                <div class="contact-form scroll-reveal" data-origin="bottom" data-distance="20%">
                    <h3>Bize Ulaşın</h3>
                    <form action="contact_operations/addMessage.php" method="POST">
                        <input  type="text" name="name" placeholder="İsim">
                        <input  type="email" name="email" placeholder="Email">
                        <textarea name="message" placeholder="Mesajınız"></textarea>


                        

                        <!-- The Modal -->
                        <div id="myModel_3" class="model_3">
                        
                          <!-- Modal content -->
                          <div class="model-content_3">
                            <span class="closee_3">&times;</span>
                            <p>KVKK metni</p>
                          </div>
                        
                        </div>
                        
                        
                        <input style="display:flex; margin-left:-100px; margin-bottom:auto;" required type="checkbox" id="confirmation" name="confirmation" value="Onay">
                        <div style="margin-left:-100px"><button style="cursor: pointer;margin-left:200px;" id="myBtn_3"><b>KVKK metnini</b></button> <span>okudum kabul ediyorum</span></div>
                        
                        
                        <button type="submit" class="send-form">Gönder</button>
                    </form>
                </div>
                <!--.contact-form-->
                <div class="social-icons scroll-reveal" data-duration="1500">
                    <?php 

                    $sql = "SELECT * FROM texts WHERE title='Facebook'";
                    $result = $DBconn->query($sql);
                    $facebook = mysqli_fetch_assoc($result);

                    $sql = "SELECT * FROM texts WHERE title='Twitter'";
                    $result = $DBconn->query($sql);
                    $twitter = mysqli_fetch_assoc($result);

                    $sql = "SELECT * FROM texts WHERE title='Instagram'";
                    $result = $DBconn->query($sql);
                    $instagram = mysqli_fetch_assoc($result);
                    
                    ?>
                    <a href="<?php echo $facebook['content'] ?>" class="fa fa-facebook"></a>
                    <a href="<?php echo $twitter['content'] ?>" class="fa fa-twitter"></a>
                    <a href="<?php echo $instagram['content'] ?>" class="fa fa-instagram"></a>
                </div>
                <!--.social-icons-->
            </div>
            
            <!--.footer-content-->
            <p class="copy-info">Bu site Çengelköy Tarihi Çınaraltı Aile Çay Bahçesi için yapılmıştır.</p>
        </div>
       
        <!--.container-->
    </footer>

    <div id="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/what-input/5.0.2/what-input.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <script type="text/javascript">
        $('.slider').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3500,
            arrows: false,
            fade: true,
            cssEase: 'linear'
        });

    </script>

    <script>
        $(window).on('load', function() {
            $("#preloader").fadeOut();
        });
    </script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    const swiper1 = new Swiper('.swiper1', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView:3,

  effect: 'coverflow',
  coverflowEffect: {
    rotate: 10,
    slideShadows: true,
  },
  
  // Responsive breakpoints
  
  // If we need pagination
  pagination: {
    el: '.swiper-pagination1',
    
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
    
  },
  breakpoints: {
    
    320: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    
    480: {
      slidesPerView: 1,
      spaceBetween: 30
    },
    
    640: {
      slidesPerView: 2,
      spaceBetween: 40
    },
    760: {
        slidesPerView: 3,
        
   }

},
});
</script>
<script>
    const swiper2 = new Swiper('.swiper2', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  slidesPerView:3,

  
  // Responsive breakpoints
  
  // If we need pagination
  pagination: {
    el: '.swiper-pagination2',
    
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
    
  },
});

  </script>
<script>
    // Open the Modal
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }
    
    // Close the Modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
    
    var slideIndex = 1;
    showSlides(slideIndex);
    
    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>
<script>
    // Get the modal
    var model = document.getElementById("myModel");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closee")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      model.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      model.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == model) {
        model.style.display = "none";
      }
    }
    </script>
    <script>
        // Get the modal
        var model_1 = document.getElementById("myModel_1");
        
        // Get the button that opens the modal
        var btn_1 = document.getElementById("myBtn_1");
        
        // Get the <span> element that closes the modal
        var span_1 = document.getElementsByClassName("closee_1")[0];
        
        // When the user clicks the button, open the modal 
        btn_1.onclick = function() {
          model_1.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span_1.onclick = function() {
          model_1.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == model_1) {
            model_1.style.display = "none";
          }
        }
        </script>
          <script>
            // Get the modal
            var model_2 = document.getElementById("myModel_2");
            
            // Get the button that opens the modal
            var btn_2 = document.getElementById("myBtn_2");
            
            // Get the <span> element that closes the modal
            var span_2 = document.getElementsByClassName("closee_2")[0];
            
            // When the user clicks the button, open the modal 
            btn_2.onclick = function() {
              model_2.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span_2.onclick = function() {
              model_2.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == model_2) {
                model_2.style.display = "none";
              }
            }
            </script>
            <script>
            // Get the modal
            var model_3 = document.getElementById("myModel_3");
            
            // Get the button that opens the modal
            var btn_3 = document.getElementById("myBtn_3");
            
            // Get the <span> element that closes the modal
            var span_3 = document.getElementsByClassName("closee_3")[0];
            
            // When the user clicks the button, open the modal 
            btn_3.onclick = function() {
              model_3.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span_3.onclick = function() {
              model_3.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == model_3) {
                model_3.style.display = "none";
              }
            }
            </script>

    
    
</body>

</html>
