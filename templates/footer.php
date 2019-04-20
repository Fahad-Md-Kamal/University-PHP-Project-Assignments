  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/fontawsome/fontawsome.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <?php if(isset($_SESSION['msg'])){
    
    $msg = $_SESSION['msg'];
    
    echo "<script>alert('$msg')</script>";

    unset($_SESSION['msg']);
  } ?>

</body>

</html>
