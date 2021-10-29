<?php
if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../../logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../../logout.php");
}
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation"  style="margin-bottom: 0">
                <div class="navbar-header" >
                <a class="navbar-brand" href="index.php"><img src="images/logo1.png" alt="Logo" ></a>

                <!-- <button type="button" class="" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->
                    <?php
                    
                    $is_admin_panel="admin-panel";
                    $src="admin-panel/images/logo1.png";
                    $href="admin-panel/index.php";
                    $url= $_SERVER['REQUEST_URI'];   
                    $admin="../../cashier-system/";
                    if(strpos($url,$is_admin_panel)){
                        $src="images/logo1.png";
                        $href="index.php";
                        $admin="../"; 
                    }
                    ?>
                    <br>
                    <br>
                    <br>
                    <!-- <a class="navbar-brand" href=<?php echo $href?>><img src="<?php echo $src;?>" alt="Logo" style="height:45px;width:170px"></a> -->
                </div>
                <!-- /.navbar-header -->

               
                   
                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="" data-toggle="dropdown" href="#">
                            <i class="fa fa-user "></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                        
                            <!-- <li><a href=""><i class="fa fa-user fa-fw"></i> User Profile</a></li> -->

                            <!-- <li><a href=""><i class="fa fa-gear fa-fw"></i>  Password</a></li> -->
                            <li class="divider"></li>

                            <li><a href= "<?php echo $admin ?>logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
            </nav>

<?php
//Getting the current url and print a message depend on the url.

//default we set the message for index.
$header_message="ساردەمەنی ئەنەس";

$items="items_list.php";
$cashiers="cashiers.php";
$reports="reports.php";

$url= $_SERVER['REQUEST_URI'];   

if(strpos($url,$items)){
    $header_message="ليستي خواردنەوەکان";
}else if(strpos($url,$cashiers)){
    $header_message="ليستي کاشێرەکان";
}
?>
    <div class="row">
    <div class="col-lg-12" style="text-align:center;">
        <h1 class="page-header" style="color:#f22c51;"> <?php echo $header_message?>
            <small class="text-primary">
                
                </small>
        </h1>
    </div>
</div>