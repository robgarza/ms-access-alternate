<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="JS/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<title>Position Table Form</title>
</head>
<body class="some-profile">
<div class="container">
    <div class="row">
        <header class="text-center mt-5">
            <h1>Human Resource Management System</h1>
        </header>
    </div>
    <div class="row text-center mt-5 mb-5">
        <h2>Form Operations</h2>
        <div class="d-grid gap-2 d-md-block mt-5 mb-5">
            <a href="employee-profile.php"><button class="btn btn-light" type="button">Employee Profile Data Entry Form</button></a>
            <a href="read.php"><button class="btn btn-light" type="button">Position Data Entry Form</button></a>
        </div>
    </div>
    <div class="row text-center mt-5 mb-5">
        <h2>Report Operations</h2>
        <h3></h3>
        <div class="d-grid gap-2 d-lg-block mt-5 mb-5">
            <a href="preview-employee-profile-master-list.php"><button class="btn btn-light" type="button">Preview Employee Profile Master List</button></a>
            <button class="btn btn-light" type="button" onclick="loadOtherPage()">Print Employee Profile Master List</button>
            <a href="preview-position-master-list.php"><button class="btn btn-light" type="button">Preview Position Master List</button></a>
            <button class="btn btn-light" type="button" onclick="loadYetAnotherPage()">Print Position Master List</button>
        </div>
    </div>
    <div class="row text-center mt-5 mb-5">
        <h2>Application</h2>
        <div class="d-grid gap-2 d-lg-block mt-5 mb-5">
        <a href="index.php"><button class="btn btn-light" type="button">Close Application</button></a>
        </div>
    </div>

</div>
</body>
</html>