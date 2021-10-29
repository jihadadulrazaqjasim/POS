<?php
if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../../logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../../logout.php");
}
?>        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-sm-12">
                
                <!-- First panel -->
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3 style="margin:0px;padding:0px;">Reports</h3>
                                    
                                </div>
                            </div>
                        </div>
 
                        <a href="reports.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>

                    </div>
                </div>
                
                <!-- Second panel -->
                <div class="col-md-3 col-sm-6 col-sm-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-inbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    
                                <h3 style="margin:0px;padding:0px;">POS SYSTEM</h3>
                                </div>
                            </div>
                        </div>
                        <a href="../pos.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!-- Third panel -->
                <div class="col-md-3 col-sm-6 col-sm-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge' id="total_users"></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- Fourth panel -->
                <div class="col-md-3 col-sm-6 col-sm-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge' id="total_items">26</div>
                                    <div>Items</div>
                                </div>
                            </div>
                        </div>
                        <a href="items_list.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            
    </div>
    <!-- /.row -->
        

    