<?php



$hostname="localhost";
	$username="root";
	$password="";
    $dbname="springlabsdb";



$conn = mysqli_connect($hostname,$username, $password, $dbname);

$query = "SELECT * FROM customer";


if(isset($_GET['page']))
{
  $page = $_GET['page'];
}else
{
  $page = 1;
}

$num_per_page = 10;
$start_from = ($page-1)*10;

$records = mysqli_query($conn, "SELECT * FROM customer limit $start_from,$num_per_page");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- Our Custom CSS -->
     
     </head>
 <body>
 <div class="container">
        <!-- Sidebar Holder -->
        <h1>Quotations Details</h1>

        <div id="content">
    
                

            

<!--Delete option-->
<?php
            if(isset($_POST['save'])){
    $checkbox = $_POST['check'];
    for($i=0;$i<count($checkbox);$i++){
    $del_id = $checkbox[$i]; 
    mysqli_query($conn , "DELETE FROM customer_details WHERE quoteid ='".$del_id."'");
    $message = "Data deleted successfully !";
    }
    }
    
  $result = mysqli_query( $conn , "SELECT * FROM customer_details limit $start_from,$num_per_page");
  ?>
<div><?php if(isset($message)) { echo $message; } ?>
  </div>
<!-- <div id="snackbar">< ?php 
$message = "Data deleted successfully !"; 
{ echo $message; } ?></div> -->
  <form class="form-inline" method="post" action="PDF.php">
  
</form>
  <form method="post" action="" >
  <div class="row">          
          <!--Search button-->
          <div class="col-lg-4">
            <div class="input-group">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Customer." title="Type in a name" style="border-radius:5px; height:40px;">
                <button type="submit" class="btn btn-success" name="save" style="background-color:#092d44;  margin-left:50px;" onclick="SnackbarFunction()">DELETE</button><br><br>
                <button style="background-color:#092d44; color:white; padding:10px; border-radius:5px; "><a href="quotecreate.php" style="color:white;">Create</a></button>
              </div> 
          </div>
            </div><br>
  <table class="table table-bordered" id="myTable">
  <thead>
  <tr>
      <th><input type="checkbox" id="checkAl"> Select All</th>
      <th >Quote Id</th>
<th >Customer Name</th>
<th>Grand Total</th>
<th>Preview</th>

<!--<th><input type="checkbox" id="checkAl"> Select All</th>-->
</tr>
  </thead>
  <tbody id="searchTable">
  <?php
  $i=0;
  while($quote = mysqli_fetch_assoc($result)) {
  ?>
  <tr >
  <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $quote["quoteid"]; ?>"></td> 
      <td><?php echo $quote["quoteid"]; ?></td>  
    <td><?php echo $quote["customer"]; ?></td>
    <td><?php echo $quote["grandtotal"];?></td>
    <td>
      
      <a href="previewdetails.php?quoteid=<?php echo $quote["quoteid"];?>">Preview</a></td>
  </tr>
  <?php
  $i++; 
  }
  ?>
  </tbody>
  </table>
<div style="margin-left:100px; margin-top:10px;">
<?php

  $pr_query  = mysqli_query($conn, "SELECT * FROM customer_details");

  $number = mysqli_num_rows($pr_query);
  
  
  /*Getting number of record iin databses */
     $toatl_page =ceil($number/$num_per_page);
     /*
     echo $toatl_page;
      */ 
     
     if($page>1)
     {
      echo "<a href='index.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";
     }

     for ($k=1; $k<$toatl_page;$k++)
     {
       echo "<a href='index.php?page=".$k."' class='btn btn-primary'>$k</a>";    
     }

     if($k>1)
     {
      echo "<a href='index.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";
     }
?>
</div>
    
    <br><br>
   </form>

   <script>
  $("#checkAl").click(function () {
  $('input:checkbox').not(this).prop('checked', this.checked);
  });

  </script>
  </div>
      </div>
      <script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#searchTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!--Snack Bar Script-->
  <!-- <script>
  function SnackbarFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
}
</script> -->

 </body>
 </html>    