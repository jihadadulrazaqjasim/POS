<?php 
include "includes/header.php";
include "includes/navigation.php";
?>

<head>
    <title>&nbsp;</title>

<style>


/* @page { size: auto;  margin: 0mm; } */

    .prices-text{
        color:#42B32F;
    }

    .gallery_product{
        text-align:center;
        cursor:cell;
    }
    .gallery_product a img {
        opacity:0.7;
        position: relative;
        text-align: center;
    }
    .gallery_product a img:hover{
    opacity:1;
    }

    .gallery_product a{
        text-decoration:none;
    }

    input[type=number].qty::-webkit-inner-spin-button, 
    input[type=number].qty::-webkit-outer-spin-button {  
        padding:10px;
        opacity: 1;
    }


.qty.hide_spin::-webkit-inner-spin-button,
.qty.hide_spin::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

div.gallery_product p{
    font-size: 12px;
    height:22px;
    overflow: hidden;
}

/* Stop vibrating big size images on hover */

.gallery_product img{
    margin:10px;
    /* vertical-align: top; */
    /* transition: all 200ms ease; */
}

</style>

<!-- Link to css files -->
<link rel="stylesheet" href="css/pos.css">
</head>


<section>

 <div class="container-fluid">

 <p>
 <?php 
 if(isset($_POST['product'])){
    // var_dump (($_POST['product']));
    // echo "<br></br>";
    // var_dump ($_POST["qty"]);
    // echo "<br></br>";
    // var_dump ($_POST["price"]);
 }?>
 </p>

 
    <div class="row">
        <!-- First 6 columns -->
        <div class="col-xs-6" >
            <?php
            include "includes/left-side-of-pos.php";
        
            ?>
        </div>

                <!-- Second 6 columns -->
        <div class="col-xs-6" style="margin-top:38px;">

        <?php include "includes/right-side-of-pos.php";?>
           
        </div>

    </div>

    </div>
</section>

<?php
include "includes/footer.php";
?>

<script src="jQuery-Plugin-To-Print-Any-Part-Of-Your-Page-Print/jQuery.print.js"></script>

<!-- script file for POS system -->
<script src="js/pos.js"></script>