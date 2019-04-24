<?php include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php include_once "templates/mainNav.php";


if(isset($_SESSION['loggedIn'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = $_SESSION['id'];
    }
    include_once "dbConnection.php"; 
    $conn = dbConncetion();

        $sql = "SELECT * FROM customerdetails WHERE id = '$id'";
        $result = $conn->query($sql);

        foreach($result as $row){

  ?>



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="bg-success my-5 py-2 text-light col-lg-6 offset-lg-3">
        <form class="form" action="php_UserUpdate.php" method="post">
            <hr class="bg-light">
            <legend class="text-center"> User Details</legend>
            <hr class="bg-light">
            <input type="hidden" name="id" value="<?=$row['id']?>">

            <div class="form-group">
                <label for="CustomerReg">First Name:</label>
                <input type="text" name="CustomerReg" class="form-control" id="CustomerReg" value="<?=$row['CustomerReg']?>" readonly>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" class="form-control" id="firstName" value="<?=$row['FirstName']?>">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" name="surname" class="form-control" id="surname" value="<?=$row['Surname']?>">
            </div>
            <div class="form-group">
                <label for="businessName">Business Name:</label>
                <input type="text" name="businessName" class="form-control" id="businessName" value="<?=$row['BusinessName']?>">
            </div>
            <div class="form-group">
                <label for="jobTitle">Job Title:</label>
                <input type="text" name="jobTitle" class="form-control" id="jobTitle" value="<?=$row['JobTitle']?>">
            </div>
            <div class="form-group">
                <label for="acs">Area Of Cyber Security:</label>
                <input type="text" name="acs" class="form-control" id="acs" value="<?=$row['AreaOfCyberSecurity'];?>">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?=$row['EmailAddress']?>" readonly>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" value="<?=$row['Password']?>">
            </div>

            <?php if($_SESSION['UserRole'] == "ADMIN"){ ?>

            <div class="form-group">
                <label for="UserRole">User Role:</label>
                <select class="form-control" name="UserRole">
                    <option value="<?=$row['UserRole']?>">Selected As: <?=$row['UserRole']?></option>
                    <option value="ADMIN">ADMIN</option>
                    <option value="CUSTOMER">CUSTOMER</option>
                </select>
            </div>
            
            <?php }else{?>
                <input type="hidden" name="UserRole" value="CUSTOMER">
            <?php }?>
            
            <div class="form-group">
                <input type="submit" class="btn btn-secondary form-control" value="UPDATE">
            </div>
        </form>

        
            <?php } 
            if(isset($_SESSION['msg'])){
    
                $msg = $_SESSION['msg'];
                echo "<script>alert('$msg');</script>";
                unset($_SESSION['msg']);
            }
   ?>
      
      </div>

    </div>


  </div>
  <?php include_once "templates/footerSection.php" ?>

  <?php include_once "templates/footer.php" ?>
  
  

<?php }else{
    header("location:login.php");
}

?>