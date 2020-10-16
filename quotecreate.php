<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!-- <script src="jquery.min.js"></script> -->
    <title>Entry details</title>
    <script>
        $('.form-group').on('input','.prc',function(){
            var totalSum = 0;
            $('.form-group .prc').each(function(){
                var inputVal = $(this).val();
                if($.isNumeric(inputVal)){
                    totalSum += parseFloat(inputVal); 
                }
            });
            $('#grandtotal').text(totalSum);
        });
    </script>
</head>
<body>
    <script language="javascript">
		function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    if (rowCount < 10) { // limit the user from creating fields more than your limits
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;
        row.id = 'row_'+rowCount;
        for (var i = 0; i < colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.outerHTML = table.rows[0].cells[i].outerHTML;            
        }
       var listitems= row.getElementsByTagName("input")
            for (i=0; i<listitems.length; i++) {
              listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");
            }
    } else {
        alert("Maximum Passenger per ticket is 10.");

    }
}

function deleteRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    for (var i = 0; i < rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if (null !== chkbox && true === chkbox.checked) {
            if (rowCount <= 1) { // limit the user from removing all the fields
                alert("Cannot Remove all the Passenger.");
                break;
            }
            table.deleteRow(i);
            rowCount--;
            i--;
        }
    }
    $("")
}


//Calculation Part

// function calculate(elementID){
//     var amount = 0;  

//     var grandtotal = 0;

//     var mainRow = document.getElementById(elementID);

//      amount = mainRow.querySelectorAll('[id=amount]')[0].value;

//     var rowIdSet = new Set();
//         rowIdSet.add(elementID);

//         console.log(rowIdSet);
//         var quoteTable = document.getElementById('dataTable');

//         var rowLength = quoteTable.rows.length;
//         console.log("rowLength: " + rowLength);

//         var totalValue = 0;

//         for (i = 0; i < rowLength; i++){

//             var row = document.getElementById("row_"+ i);
            
//             totalValue = row.querySelectorAll('[id=amount]')[0].value;
//             grandTotal = +grandTotal + +totalValue;
           
//            console.log("grandTotal: " + grandTotal);

//         }
//         var Grand_Total = document.getElementById('grandtotal');
//                 Grand_Total.value = grandTotal;
// }

// calc_total();

// function calc_total(){
//   var grandtotal = 0;
//   $(".amount").each(function(){
//     sum += parseFloat($(this).text());
//   });
//   $('#grandtotal').text(grandtotal);
// }

$(document).ready(function () {
    $("#ckbCheckAll").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });
    $(".checkBoxClass").change(function(){
        if (!$(this).prop("checked")){
            $("#ckbCheckAll").prop("checked",false);
        }
    });
    $("#ckbCheckAll1").click(function () {
        $(".checkBoxClass1").prop('checked', $(this).prop('checked'));
    });
    $(".checkBoxClass1").change(function(){
        if (!$(this).prop("checked")){
            $("#ckbCheckAll1").prop("checked",false);
        }
    });

});

</script>
<div class="main">

    <form action="quote.php" method="POST" enctype="multipart/form-data">
        <!-- Customer Detils -->
        <h1><span style="border-bottom: 10px solid lightgreen;">SpringLabs Quote Form</span></h1>

        <div style="text-align: center;">
            <lable for="customer">Customer Name :</lable>
            <input type="text" id="customer" name="customer" placeholder="Customer Name"/><br><br>

            <lable for="company">Company Name :</lable>
            <input type="text" id="company" name="company" placeholder="Company Name"/><br><br>
            <lable for="mail">Email :</lable>
            <input type="email" id="mail" name="mail" placeholder="XYZ@gmail.com" style="margin-left: 200px;"/><br><br>
            <lable for="date" >Date :</lable>
            <input type="date" id="date" name="date" placeholder="Customer Name" style="margin-left: 200px;"/><br><br>
        </div>
        <div class="customer-address">
            <h2><span>Address :</span></h2>
            <input type="text" id="street1" name="street1" placeholder="Street Address" /><br><br>
            <input type="text" id="street2" name="street2" placeholder="Street Address line2" /><br><br>
            <input type="text" id="city" name="city" placeholder="City" /><br><br>
            <input type="number" id="postalcode" name="postalcode" placeholder="Postal Code" /><br><br>
            <input type="text" id="mobile" name="mobile"  placeholder="Mobile Number"/>            
        </div>

        <!-- Curomer Details Ends -->

        <!-- Service Details -->
        <div class="service">

        <h2><span style="border-bottom: 3px solid lightgreen;">Service Details :</span></h2>
            
        <input type="button" value="Add New Row" onclick="addRow('dataTable')" style="background-color:lightgreen; padding: 5px; margin-left: 0px;"/>

        <input type="button" value="Delete Row" onclick="deleteRow('dataTable')" style="margin-left: 50px; background-color:lightgreen; padding: 5px;"/>
        <table class="service-details">
            <thead>
                <tr>
                    <th><input type="checkbox" name="chk" id="ckbCheckAll"/></th>
                    <th>Service Details</th>
                    <th>Amount</th>
                    <th>Yearly</th>
                </tr>
            </thead>
            <tbody id="dataTable" class="form"  border="2" >
                <tr id='row_0'>
                    <td><input type="checkbox" name="chk[]" class="checkBoxClass"/></td>
                    <td><input type="text" name="service[]" id="service"/></td>
                    
                    <td><input type="text"  class="amount" name="subamount[]" id="subamount"  onkeypress="return onlyNumberKey(event)"  required /></td>

                    <td><input type="text"  class="yearlyamount" name="yearlyamount[]" id="yearlyamount" onkeypress="return onlyNumberKey(event)"  required /></td>
                    
                </tr>
                </tbody> 
        </table>
        
            <br><br>
            <!-- <label for="Grand_Total" style="font-size: 24px;">Sub_Total: </label><input  class="subgrandtotal" id="subgrandtotal" name="subgrandtotal[]" onkeypress="return onlyNumberKey(event)" /> <br><br>
            <label for="Grand_Total" style="font-size: 24px;">Yearly_Total: </label><input  class="subyearlyamount" id="subyearlyamount" name="subyearlyamount[]" onkeypress="return onlyNumberKey(event)"  /> <br><br>
            <label for="Grand_Total" style="font-size: 24px;">Grand_total:</label><input class="grandtotal" id="grandtotal" onkeypress="return onlyNumberKey(event)" />  -->
            <br><br>
            <label for="Grand_Total" style="font-size: 24px;">Sub_Total: <span class="subgrandtotal" id="subgrandtotal" name="subgrandtotal" onkeypress="return onlyNumberKey(event)">0</span> </label><br><br>
            <label for="Grand_Total" style="font-size: 24px;">Yearly_Total: <span class="subyearlyamount" id="subyearlyamount" name="subyearlyamount"  onkeypress="return onlyNumberKey(event)">0</span> </label><br><br>
            <label for="Grand_Total" style="font-size: 24px;">Grand_total:<span class="grandtotal" id="grandtotal" onkeypress="return onlyNumberKey(event)">0</span> </label>
            

            <!-- <input type="number" class="form-control" step="0.01" id="grandtotal" name="grandtotal"  placeholder="Grand Total"> -->
        </div>
        <!-- Service detils Ends -->
        <br><br>

        <!-- Impotant Notes -->
       <div class="note">
        <h2><span style="border-bottom: 3px solid lightgreen;">Note:</span></h2>
            
        <input type="button" value="Add New Row" onclick="addRow('noteTable')" style="background-color:lightgreen; padding: 5px; margin-left: 0px;" />

        <input type="button" value="Delete Row" onclick="deleteRow('noteTable')" style="margin-left: 10px; background-color:lightgreen; padding:5px;"/>
        <br>
        <table class="service-details" >
            <thead>
                <tr>
                    <th><input type="checkbox" id="ckbCheckAll1" name="chk"  /></th>
                    <th>Service Details</th>
                    
                </tr>
            </thead>
            <tbody id="noteTable" class="form"  border="2" >
                <tr id='row_0'>
                    <td><input type="checkbox" name="chk[]" class="checkBoxClass1"/></td>
                    <td><input type="text" name="notes[]" id="notes"/></td>
                </tr>
                </tbody> 
        </table>
        <input type="submit"  value="submit" style="background-color: lightgreen; margin-top: 50px; width: 100px; padding: 10px;">
       </div>
    </form>
</div>
    <script>

    // number key event

    function onlyNumberKey(evt) { 
          
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      }
  $(document).ready(function(){

      $(document).on('keyup', ".amount",function () {
        var subtotal = 0;
        
        $('.amount').each(function(){
            if(!isNaN(this.value) && this.value.length!=0){
          subtotal += parseFloat($(this).val());
            }
        })  
      
        console.log(subtotal)
        // $("#subgrandtotal").html(subtotal.toFixed(2));
        $("#subgrandtotal").html(new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR'
          }).format(subtotal.toFixed(2)));
      });


// Yearly cal 


      $(document).on('keyup', ".yearlyamount",function () {
        var yearlytotal = 0;
        
        $('.yearlyamount').each(function(){
            if(!isNaN(this.value) && this.value.length!=0){
          yearlytotal += parseFloat($(this).val());
            }
        })  
      
        console.log(yearlytotal)
       // $("#subyearlyamount").html(yearlytotal.toFixed(2));
        $("#subyearlyamount").html(new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR'
          }).format(yearlytotal.toFixed(2)));
      });
       debugger;
    $("#subgrandtotal,#subyearlyamount").keyup(function(){
         var grandtotal=0;
         var subtotal_1=document.getElementById('subgrandtotal').value;
         var yearlytotal_1=document.getElementById('subyearlyamount').value;
         console.log( "subammount"+subtotal_1);
         console.log("Year amount"+yearlytotal_1);

                  
                //   $('.amount,.yearlyamount').each(function(){
                //     grandtotal+= (subtotal_1+yearlytotal_1);
                //   })
      
       
        console.log(grandtotal)
       // $("#subyearlyamount").html(yearlytotal.toFixed(2));
        $("#grandtotal").val(+Number(subtotal_1)  +  Number(yearlytotal_1)).html(new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR'
          }).format(grandtotal.toFixed(2)));
    
    })

      });




//Grand Total Calculation

// $(document).on('keyup', ".subyearlyamount",".subgrandtotal", function () {
//         var grandtotal1 = 0;
        
//         $('.yearlyamount').each(function(){
//             if(!isNaN(this.value) && this.value.length!=0){
//                 grandtotal1 += parseFloat($(this).val());
//             }
//         })  
      
//         console.log(grandtotal1)
//         $("#grandtotal").html(grandtotall.toFixed(2));
//       });

// $(function(){
//             $('#subgrandtotal, #subyearlyamount').keyup(function(){

//                var value1 = parseFloat($('#subgrandtotal').val()) || 0;
//                var value2 = parseFloat($('#subyearlyamount').val()) || 0;
//                $('#grandtotal').val(value1 + value2);
//             });
//          });

// var x = document.getElementById('subgrandtotal').value;
// var y = document.getElementById('subyearlyamount').value;
  
// document.getElementById("grandtotal").innerHTML = Number(x)+ Number(y);

    </script>
</body>
</html>