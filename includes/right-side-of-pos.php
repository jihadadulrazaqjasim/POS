<?php
if(!isset($_SESSION['username'])||empty($_SESSION['username'])){
header('Location:login_form.php');
}
?>

<div align="center">
            <!-- <button class="btn btn-default filter-button" data-filter="all">All</button> -->
            <button class="btn btn-default filter-button" data-filter="drinks">Drinks</button>
            <button class="btn btn-default filter-button" data-filter="ice-creams">Ice Creams</button>
            <button class="btn btn-default filter-button" data-filter="sweets">Sweets</button>
            <!-- <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button> -->
        </div>
  
        <br/>        
        <!-- <div id="" name="" price="" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter">
                <a> 
                <p>Apple</p>
                <img  src="images/water.png" class="img-responsive">
                </a>
            <p class="prices-text">0.25-ID</p>
          </div> -->
          
        <div id="all_items_div"> 
        
        </div>

         
            <!--1- Drinks 
            <div name="water" price="0.25" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
          <a> <p>Apple</p>
                <img  src="images/water.png" class="img-responsive">
            </a>
                <p class="prices-text">0.25-ID</p>
            </div>

            <div name="apricot" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Apricot</p>
                <img src="images/apricot.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            <div name="banana" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Banana</p>
                <img src="images/banana.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>  
                </div>

            <div name="carrot" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Carrot</p>
                <img src="images/carrot.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>   
            </div>

            <div name="fig" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Fig</p>
                <img src="images/fig.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            
            <div name="ginger" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Ginger</p>
                <img src="images/ginger.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>


            <div name="grape" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Grape</p>
                <img src="images/grape.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            <div name="kiwi" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Kiwi</p>
                <img src="images/kiwi.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            <div name="lemon" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Lemon</p>
                <img src="images/lemon.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

            <div name="mango" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Mango</p>
                <img src="images/mango.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

            <div name="melon" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Melon</p>
                <img src="images/melon.jpg" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            <div name="orange" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Orange</p>
                <img src="images/orange.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>


            <div name="apple" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Apple</p>
                <img src="images/apple.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>


            <div name="pineapple" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Pineapple</p>
                <img src="images/pineapple.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

            <div name="pomegranate" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Pomegranate</p>
                <img src="images/pomegranate.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

            <div name="sahlab" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Sahlab</p>
                <img src="images/sahlep.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

            <div name="strawberry" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Strawberry</p>
                <img src="images/strawberry.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            <div name="grapefruit" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter drinks">
            <a > <p>Grapefruit</p>
                <img src="images/grapefruit.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

             2-Ice Creams 

            <div name="azberry" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter ice-creams">
            <a > <p>Azberry</p>
                <img src="images/ice-creams/azberry.jpg" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>
            
            <div name="ice-cream" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter ice-creams">
            <a > <p>Ice cream</p>
                <img src="images/ice-creams/icecream.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>


            <div name="turkish-ic" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter ice-creams">
            <a > <p>Turkish i-c</p>
                <img src="images/ice-creams/turkish-icecream.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>


            <div name="halvah-w-ic" price="1.50" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter ice-creams">
            <a ><p>Halvah with i-c</p>
                <img src="images/ice-creams/halvah-icecream.png" class="img-responsive">
            </a>
                <p class="prices-text">1.50-ID</p>
            </div>
            
            <div name="azberry-nut" price="1.50" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter ice-creams">
            <a > <p>Azbarry nut</p>
                <img src="images/ice-creams/azbarry-with-pistachio.png" class="img-responsive">
            </a>
                <p class="prices-text">1.50-ID</p>
            </div>

            <div name="one-kg-ic" price="5.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs- filter ice-creams">
            <a > <p> 1-kg icecream</p>
                <img src="images/ice-creams/one-kg-icecream.png" class="img-responsive">
            </a>
                <p class="prices-text">5.00-ID</p>  
            </div>

             3-Sweets 

            <div name="cake-w-milk" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Cake&Milk</p>
                <img src="images/sweets/cake-with-milk.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>


            <div name="muhallebi" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Muhalebi</p>
                <img src="images/sweets/muhallebi.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            
            <div name="muhallebi-frn" price="1.50" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Muhalebi frn</p>
                <img src="images/sweets/muhallebi-frn.png" class="img-responsive">
            </a>
                <p class="prices-text">1.50-ID</p>
            </div>
            

            <div name="muhallebi-safari" price="2.50" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Muhalebi S</p>
                <img src="images/sweets/muhallebi-safari.jpg" class="img-responsive">
            </a>
                <p class="prices-text">2.50-ID</p>
            </div>


            <div name="custard-sada" price="1.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Custar S</p>
                <img src="images/sweets/custard-sada.png" class="img-responsive">
            </a>
                <p class="prices-text">1.00-ID</p>
            </div>

            <div name="custard-kahve" price="2.00" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Custar&chocolate</p>
                <img src="images/sweets/custard-kahve.png" class="img-responsive">
            </a>
                <p class="prices-text">2.00-ID</p>
            </div>

            <div name="custard-baklawa" price="1.50" class="gallery_product col-lg-2 col-md-2 col-sm-3 col-xs-4 filter sweets">
            <a > <p>Custard&baklawa</p>
                <img src="images/sweets/custard-baklawa.png" class="img-responsive">
            </a>
                <p class="prices-text">1.50-ID</p>
            </div>

-->