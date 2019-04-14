


<?php 

include_once "templates/head.php" ?>

  <!-- Navigation -->
  <?php 
  include_once "templates/mainNav.php";


if(isset($_GET['email']) || isset($_SESSION['loggedIn'])){

    $Id = "";
    $FirstName = "";
    $Surname = "";
    $BusinessName = "";
    $JobTitle = "";
    $AreaOfCyberSecurity = "";
    $EmailAddress = "";
    $Password = "";
    
    $file="Reg";
    $btnVal="SUBMIT";




    if(isset($_GET['email'])){
            
        $EmailAddress = $_GET['email'];
        

    }else{
        include_once"dbConnection.php"; 
        $conn = dbConncetion();

        $EmailAddress = $_SESSION['EmailAddress'];
        $sql = "SELECT * FROM customerdetails WHERE EmailAddress ='$EmailAddress'";
        $result = $conn->query($sql);

        foreach($result as $row){
            $Id = $row['id'];
            $FirstName = $row['FirstName'];
            $Surname = $row['Surname'];
            $BusinessName = $row['BusinessName'];
            $JobTitle = $row['JobTitle'];
            $AreaOfCyberSecurity = $row['AreaOfCyberSecurity'];
            $EmailAddress = $row['EmailAddress'];
            $Password = $row['Password'];
        }

        $file = "Update";
        $btnVal = "UPDATE";
    }



  ?>



  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="bg-success my-5 py-2 text-light col-lg-10 offset-1">
        <form class="form" action="php_User<?=$file?>.php" method="post">

    <?php 
        

    ?>

            <input type="hidden" name="id" value="<?=$Id?>">

            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" class="form-control" id="firstName" value="<?=$FirstName?>">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" name="surname" class="form-control" id="surname" value="<?=$Surname?>">
            </div>
            <div class="form-group">
                <label for="businessName">Business Name:</label>
                <input type="text" name="businessName" class="form-control" id="businessName" value="<?=$BusinessName?>">
            </div>
            <div class="form-group">
                <label for="jobTitle">Job Title:</label>
                <input type="text" name="jobTitle" class="form-control" id="jobTitle" value="<?=$JobTitle?>">
            </div>
            <div class="form-group">
                <label for="acs">Area Of Cyber Security:</label>
                <input type="text" name="acs" class="form-control" id="acs" value="<?=$AreaOfCyberSecurity?>">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?=$EmailAddress?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" value="<?=$Password?>">
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-secondary form-control" value="<?=$btnVal?>">
            </div>
        </form>

        
      
      </div>

    </div>


  </div>
  <?php include_once "templates/footerSection.php" ?>

  <?php include_once "templates/footer.php" ?>
  
  

<?php }else{
    header("location:index.php");
}
?>