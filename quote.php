<?php

    $hostname="localhost";
	$username="root";
	$password="";
    $dbname="springlabsdb";
    

        $customer = $_POST["customer"];
        
        $company = $_POST["company"];

        $mail = $_POST["mail"];

        $date = $_POST["date"];

        $street1 = $_POST["street1"];

        $street2 = $_POST["street2"];

        $city = $_POST["city"];

        $postalcode = $_POST["postalcode"];

        $mobile = $_POST["mobile"];

        $subgrandtotal = $_POST["subgrandtotal"];

        $subyearlyamount = $_POST["subyearlyamount"];

        $grandtotal = $_POST["grandtotal"];

        $service = $_POST["service"];

        $subamount = $_POST["subamount"];

        $yearlyamount = $_POST["yearlyamount"];

        $notes = $_POST["notes"];

        


$conn = mysqli_connect($hostname,$username, $password, $dbname);
	//mysqli_select_db($dbname);

    if(mysqli_connect_error())
    {
       // echo "Failed to connect" . mysqli_connect_error();
    }
	
	if(mysqli_ping($conn))
	{
	    
	    //echo "User Submitted";
	}
	else{           
	    
	  //  echo "Error" . mysqli_error();
    } 

    $sql = "INSERT INTO customer_details (customer, company, mail, date, street1, street2, city, postalcode, mobile, subgrandtotal, subyearlyamount, grandtotal)
                 VALUES ('$customer', '$company', '$mail', '$date', '$street1', '$street2', '$city', '$postalcode', '$mobile', '$subgrandtotal', '$subyearlyamount', '$grandtotal')";

$query = mysqli_query($conn,$sql);

if($query){
    $sql_service_details = "SELECT quoteid FROM customer_details ORDER BY quoteid DESC LIMIT 1";

    $service_details_result = mysqli_query ($conn , $sql_service_details);


    while ($row = $service_details_result->fetch_assoc()) {
                //  echo "valule" , $row['id'];
                $quoteid = $row['quoteid'];
            }

        for($i = 0; $i < count($service); $i++)
        {

            $sql_service_details_insert = "INSERT INTO service_details (quoteid, service, subamount, yearlyamount) 
                                            VALUES ('$quoteid', '{$service[$i]}', '{$subamount[$i]}','{$yearlyamount[$i]}')";
                                
            
                $sql_service_details_insert_result = mysqli_query($conn , $sql_service_details_insert); 

                // echo " Service Details Submitted";
            }

            for($i= 0; $i < count($notes); $i++)
            {

                $sql_notes_details_insert = "INSERT INTO notes_details (quoteid, notes) VALUES ('$quoteid', '{$notes[$i]}')";
    
                $sql_notes_details_insert_result = mysqli_query($conn , $sql_notes_details_insert);
                
                // echo " Notes Details Submitted";
            }
            echo "<script>  window.location.href = 'index.php';
                </script> ";
                exit;

        }else{
            // echo " not Submitted";
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


// if ($conn->query($sql) === TRUE) {

//     echo "<script>  window.location.href = 'index.php';
//         </script> ";
//         exit;
//  } else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
//  }

$conn->close();
?>