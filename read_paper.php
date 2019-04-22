

<?php 
if(isset($_GET['file'])){
    $file = $_GET['file'];
    ?>
    
    <embed src="Media/<?=$file?>" type="application/pdf" width="100%" height="920" />
    
<?php }else{
    header("location:services.php");
}


?>