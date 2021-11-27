<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "springlabsdb";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Quotations Details</title>
    <style>
        body {
            font-size: 16px;
        }

        .navbar {
            display: flex;
        }

        .navbar ul,
        li {
            display: flex;
            justify-content: space-between;
        }

        .main-section h2 {
            font-size: 3rem;
            color: lightgreen;
        }

        .sub-section {
            display: flex;
            justify-content: space-between;
            margin-right: 100px;
            margin-top: 20px;
        }

        .sub-section p {
            font-size: 1.2rem;
        }

        .service-details table {
            border-collapse: collapse;
            width: 100%;
        }

        .service-details table,
        th,
        tr,
        td {
            border-bottom: 2px solid black;
            font-size: 1.5rem;

        }

        .service-details td {
            height: 50px;
            vertical-align: center;

        }

        .notes-services ul {
            list-style-type: dots;
        }
    </style>
</head>

<body class="container">

    <header class="navbar">
        <ul>
            <li><img src="logo.png" alt="Springlabs" style="width:30%; height: 50%;" /></li>
            <li>
                <ul class="nav" style="margin-right: 100px;">
                    <h2>SpringLabs</h2><br><br>
                    <p>#320/1, Opp to Govt. College,<br>
                        K R Puram, Bengaluru-36, IN.</p>
                </ul>
            </li>
        </ul>
    </header>
    <hr>
    <?php

    $quoteid = isset($_GET['quoteid']) ? $_GET['quoteid'] : '';

    $result1 = mysqli_query($conn, "SELECT * FROM customer_details WHERE quoteid = '$quoteid'");


    if ($quoteid = mysqli_fetch_assoc($result1)) {
    ?>

        <div class="main-section">
            <h2>Quote Number</h2>
            <h4><b>#<?php echo $quoteid["quoteid"]; ?></b></h4>
            <div class="sub-section">
                <div>
                    <p>Quote Date: <b><?php echo $quoteid["date"]; ?></b></p>
                    <p>Expire Date: <b><?php echo $quoteid["date"]; ?></b></p>
                    <p>Email: <b><?php echo $quoteid["mail"]; ?></b></p>
                    <p>Mobile: <b><?php echo $quoteid["mobile"]; ?></b></p>
                </div>
                <div>
                    <h3>To</h3>
                    <p><b><?php echo $quoteid["customer"]; ?></b></p>
                    <p><b><?php echo $quoteid["company"]; ?></b></p>
                    <p><b><?php echo $quoteid["street1"]; ?></b></p>
                    <p><b><?php echo $quoteid["street2"]; ?></b></p>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

    <!-- Table -->
    <table class="service-details" style="width: 100%; ">
        <thead>
            <tr>
                <th>Service Details</th>
                <th>Amount</th>
                <th>Yearly Amount</th>
            </tr>
        </thead>
        <?php
        $quoteid = isset($_GET['quoteid']) ? $_GET['quoteid'] : '';

        $result2 = mysqli_query($conn, "SELECT * FROM service_details WHERE quoteid = '$quoteid'");

        $i = 0;
        while ($quoteid = mysqli_fetch_assoc($result2)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $quoteid['service']; ?></td>
                    <td><?php echo $quoteid['subamount']; ?></td>
                    <td><?php echo $quoteid['yearlyamount']; ?></td>
                </tr>
            </tbody>
        <?php
            $i++;
        }
        ?>
        <tfoot>
            <?php

            $quoteid = isset($_GET['quoteid']) ? $_GET['quoteid'] : '';

            $result1 = mysqli_query($conn, "SELECT * FROM customer_details WHERE quoteid = '$quoteid'");


            if ($quoteid = mysqli_fetch_assoc($result1)) {
            ?>
                <td></td>
                <td>SubAmount: <?php echo $quoteid["subgrandtotal"]; ?> </td>
                <td>YearlyAmount: <?php echo $quoteid["subyearlyamount"]; ?> </td>
            <?php
            }
            ?>
        </tfoot>

    </table>
    <?php

    $quoteid = isset($_GET['quoteid']) ? $_GET['quoteid'] : '';

    $result1 = mysqli_query($conn, "SELECT * FROM customer_details WHERE quoteid = '$quoteid'");


    if ($quoteid = mysqli_fetch_assoc($result1)) {
    ?>
        <div style="margin-top: 10px;float: right; margin-right: 400px;">
            <h3>Ground Total: <b><?php echo $quoteid["grandtotal"]; ?></b></h3>
        </div>
    <?php
    }

    ?>

    <div class="notes-services" style="margin-top:50px;">
        <h3>Notes:</h3>
        <?php
        $quoteid = isset($_GET['quoteid']) ? $_GET['quoteid'] : '';

        $result3 = mysqli_query($conn, "SELECT * FROM notes_details WHERE quoteid = '$quoteid'");

        $i = 0;
        while ($quoteid = mysqli_fetch_assoc($result3)) {
        ?>
            <ol>
                <li><?php echo $quoteid["notes"]; ?>
                <li>
            </ol>
        <?php
        }
        ?>
    </div>
</body>

</html>