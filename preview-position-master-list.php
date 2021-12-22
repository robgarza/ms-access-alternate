<?php include "db.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<title>Position Table Form</title>
</head>
<body>
<div class="container text-center">
    
        
        <div class="row">
            <header class="mt-5">
                <img src="img/wup-logo.png" alt="logo" width="10%">

                <address>

                    ABS Global Sales Corporation<br>
                    Sampaguita St., Mabini Extension, Cabanatuan City Philippines 3100

                </address>
            </header>
        </div>
            <h1 class="preview">Position Master List</h1>
            </div>
        
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Position ID</th>
                    <th>Position Code</th>
                    <th>Position Description</th>
                    <th>Basic Pay</th>
                </tr>
                <?php
                        $query = "SELECT * FROM positionTable";
                        global $connection;
                        $result=mysqli_query($connection, $query);
                        if($result){
                    
                        }
                        while($row =  mysqli_fetch_assoc($result)){
                                $positionID = $row['positionID'];
                                $positionCode = $row['positionCode'];
                                $positionDescription = $row['positionDescription'];
                                $basicPay = $row['basicPay'];
                    
                        echo "
                        <tr>
                            <td>$positionID</td>
                            <td>$positionCode</td>
                            <td>$positionDescription</td>
                            <td>$basicPay</td>
                        </tr>
                        ";  
                        }
                        ?>
                
                </table>

        </div>
    </div>
    

</div>
</body>
</html>