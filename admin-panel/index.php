<!-- Including Header part -->
<?php 
include "includes/header.php";?>
<body>       

<!-- Entire website goes inside this container-fluid div -->
    <div class="container-fluid">

        <!-- Including Navigation -->
    <?php include "includes/navigation.php"?>

<?php
// Here we gonna include one of these sections either main_content,or by 
$a=11;
$b=22;
if($a==1){

}else if($b==2)
{

}

//If the other options is not true show the default.
else{
include "includes/main_content.php";
}
?>

</div>


    </body>



<footer>
    <!-- Including the footer section -->
    <?php include "includes/footer.php";?>
</footer>

<!-- Any js code link goes here after footer which include call to the js libraries -->
<script src="js/main_content.js" ></script>
</html>