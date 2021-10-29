<?php
if(!$_SESSION['username']||empty($_SESSION['username'])){
    header("location:../../logout.php");
}
if($_SESSION['role']!='admin'){
    header("location:../../logout.php");
}
?>
<div class="container">

<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="lastname" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="account_type">Account Type</label>
            <select name="account_type" id="account_type" class="form-control">
                <option>Administrator</option>
                <option>Cashier</option>
            </select>
        </div>

    
        <!-- <div class="form-group">
            <label for="org_id">Organization</label>
            <select name="org_id" id="org_id" class="form-control"> -->
                <?php
                // $sql = "SELECT * FROM organization";
                // $result = $db->query($sql);

                // if (!$result) {
                //     echo "QUERY FAILED" . $db->error;
                // } else {

                //     while ($row = $result->fetch_assoc()) {
                //         $org_id = $row['id'];
                //         $org_name = $row['org_name'];

                //         echo "<option value={$org_id}>$org_name</option>";
                //     }
                // }
                ?>
            <!-- </select>
        </div> -->

        <div class="form-group">
            <input type="submit" name="create_user" class="btn btn-primary" value="Create User" id="create_user">
        </div>
    </form>
    </div>