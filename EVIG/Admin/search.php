<link rel="stylesheet" type="text/css" href="./aCss/aNav.css">
<?php include "./aIncludes/aNav.php"; ?>

<div class="col-md-4">
<?php 
if(isset($_POST['submit'])){
  $search  = $_POST['search'];

  $query = "SELECT * FROM constructor WHERE firstname = '$search' ";
 
  $search_Query = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($search_Query);

  if(!$search_Query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
 $count = mysqli_num_rows($search_Query);

}
?>
  </div>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>