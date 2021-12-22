<?php include "db.php";?>
<?php include "functions.php";?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="JS/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<title>Employee Table Form</title>
</head>
<body class="employee-profile">
<div class="container">
    <div class="row">
        <header>
            <h1>Employee Profile</h1>
        </header>
    </div>

    <div class="row">
    <div class="col-sm-6">

        <form action="employee-profile.php" method="GET">
        <?php
        defaultEmployeeProfileForm();
        deleteEmployeeProfileRecord();
        
        ?>

        </div>


</div>
<div class="row mt-3">
    <div class="col">
            <div class="d-md-block d-grid">

            <a href="first-employee-profile.php"><button type="button" name="first-record" value="First Record" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-start" viewBox="0 0 16 16">
  <path d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L5 8.752V12a.5.5 0 0 1-1 0V4zm7.5.633L5.696 8l5.804 3.367V4.633z"/>
</svg></button></a>

            <a href="first-employee-profile.php"><button type="button" name="previous-employee-record" value="Previous Record" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
  <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
</svg></button></a>


            <a href="last-employee-profile.php"><button type="button" name="next-employee-record" value="Next Record" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
  <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
</svg></button></a>

            <a href="last-employee-profile.php"><button type="button" name="last-employee-record" value="Last Employee Profile" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-end" viewBox="0 0 16 16">
  <path d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0V4zM5 4.633 10.804 8 5 11.367V4.633z"/>
</svg></button></a>


            <button type="submit" name="add-employee-record" value="add-employee-record" class="btn btn-primary">Add Record</button>


            <button type="submit" name="delete-record" value="Delete Record" class="btn btn-danger">Delete Record</button>

            <a href="human-resource-management-form.php"><button type="button" name="close-form" value="close form" class="btn btn-light">Close Form</button></a>
            </div>
        </form>
        </div>


</div>
</div>
</body>

</html>