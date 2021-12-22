<?php include "db.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script>
        window.onload = function () {
    window.print();
}
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<title>Position Table Form</title>
</head>
<body>
<div class="container">
    <div class="row">
        <header class="text-center mt-5">
        <img src="img/wup-logo.png" alt="logo" width="10%">

        <address>

            ABS Global Sales Corporation<br>
            Sampaguita St., Mabini Extension, Cabanatuan City Philippines 3100

        </address>


            <h1 class="preview">Employee Profile Master List</h1>
        </header>
    </div>
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>Employee Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Birthdate</th>
                <th>Phone Number</th>
                <th>Position</th>
            </tr>
            <?php
                    $query = "SELECT * FROM employeeProfileTable";
                    global $connection;
                    $result=mysqli_query($connection, $query);
                    if($result){
                
                    }
                    while($row =  mysqli_fetch_assoc($result)){
                            $employeeNumber = $row['employeeNumber'];
                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $sex = $row['sex'];
                            $civilStatus = $row['civilStatus'];
                            $birthDate = $row['birthDate'];
                            $phoneNumber = $row['phoneNumber'];
                            $position = $row['position'];
                
                    echo "
                    <tr>
                        <td>$employeeNumber</td>
                        <td>$firstName</td>
                        <td>$lastName</td>
                        <td>$sex</td>
                        <td>$civilStatus</td>
                        <td>$birthDate</td>
                        <td>$phoneNumber</td>
                        <td>$position</td>
                    </tr>
                    ";
                    }
            ?>
            </table>

    </div>

</div>
</body>
</html>