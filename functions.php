<?php include "db.php";?>
<?php


function defaultForm(){
    $query = "SELECT COUNT(*) FROM positionTable";


    global $connection;

        $result = mysqli_query($connection,$query);
        
        $newResult = $result->fetch_array();
        if($newResult[0] == 0){
            echo "
            <div class='form-group'>
                <label for='positionID'>Position ID</label>
                <input type='text' name='positionID' class='form-control' value='New'>
            </div>
            <div class='form-group'>
                <label for='positionCode'>Position Code</label>
                <input type='text' name='positionCode' class='form-control' placeholder='Position Code' required>
            </div>
            <div class='form-group'>
                <label for='positionDescription'>Position Description</label>
                <input type='text' name='positionDescription' class='form-control' placeholder='Position Description' required>
            </div>
            <div class='form-group'>
                <label for='basicPay'>Basic Pay</label>
                <input type='text' name='basicPay' class='form-control' placeholder='Basic Pay' required>
            </div>
            ";  
        }
        else if (isset($_GET['next-record'])){
            
            nextRow();
            
        }
        else if (isset($_GET['previous-record'])){
            
            previousRow();
            
        }
        else{
            lastRow();
        }
}


// last record button begins
function clickedLastRecord(){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['last-record']) && $_GET['positionID'] == "New"){
            header("Location: read.php");
        }
        else if(isset($_GET['last-record'])){
            header("Location: last-record.php");
        }
    }
}
// last record button begins
// first record button begins
function clickedFirstRecord(){

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['first-record']) && $_GET['positionID'] == "New"){
            header("Location: read.php");
        }
        else if(isset($_GET['first-record'])){
            header("Location: first-record.php");
        }
    }
}


// Add record button begins

function addRecord(){

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(isset($_GET['add-record']) && is_int($_GET['positionID']) == false && $_GET['positionCode'] !=''  && $_GET['positionDescription'] !='' && $_GET['basicPay'] !=''){

        $basicPay = $_GET['basicPay'];
        $positionCode = $_GET['positionCode'];
        $positionDescription = $_GET['positionDescription'];
        global $connection;
        $query = "INSERT INTO positionTable(basicPay, positionCode, positionDescription) VALUES ('$basicPay', '$positionCode', '$positionDescription')";
        // $query .= "";
        $result = mysqli_query($connection,$query);
        header("Location: read.php");


    
        if(!$result){
            die('Query failed' . mysqli_error($connection));
        }

        }

        
    }
}

// Add record button ends

// Last row function begins
function lastRow(){
    
    $query = "SELECT * FROM positionTable ORDER BY positionID DESC LIMIT 1";
    global $connection;
        // $query .= "";
        $result = mysqli_query($connection,$query);
        if($result){
            while($row =  mysqli_fetch_assoc($result)){
                if(!$row){
                    defaultForm();                    
                }
                $positionID = $row['positionID'];
                $positionCode = $row['positionCode'];
                $positionDescription = $row['positionDescription'];
                $basicPay = $row['basicPay'];
                echo "
                <div class='form-group'>
                    <label for='positionID'>Position ID</label>
                    <input type='text' name='positionID' class='form-control' value='$positionID'>
                </div>
                <div class='form-group'>
                    <label for='positionCode'>Position Code</label>
                    <input type='text' name='positionCode' class='form-control' value='$positionCode'>
                </div>
                <div class='form-group'>
                    <label for='positionDescription'>Position Description</label>
                    <input type='text' name='positionDescription' class='form-control' value='$positionDescription'>
                </div>
                <div class='form-group'>
                    <label for='basicPay'>Basic Pay</label>
                    <input type='text' name='basicPay' class='form-control' value='$basicPay'>
                </div>
                ";
            }    
    } else if(!$result){
        die('Query failed at printOutData() function' . mysqli_error($connection));
    }
        }




// last row function ends


// next row function begins

function nextRow(){
    if(isset($_GET['next-record'])){
        $positionID = $_GET['positionID'];
    $query = "SELECT * FROM positionTable ORDER BY positionID DESC LIMIT 1";
    global $connection;
    $result = mysqli_query($connection,$query);    
    $newResult=$result->fetch_array();
    if((int)$newResult[0] === (int)$positionID){
        lastRow();
    }else{
        $query = "SELECT * from positionTable
        WHERE positionID > $positionID
        ORDER BY positionID ASC
        LIMIT 1";
        global $connection;
            
            $result = mysqli_query($connection,$query);
        if($result){
            while($row =  mysqli_fetch_assoc($result)){
                if(!$row){
                    defaultForm();
                }
                $positionID = $row['positionID'];
                $positionCode = $row['positionCode'];
                $positionDescription = $row['positionDescription'];
                $basicPay = $row['basicPay'];
                echo "
                <div class='form-group'>
                    <label for='positionID'>Position ID</label>
                    <input type='text' name='positionID' class='form-control' value='$positionID'>
                </div>
                <div class='form-group'>
                    <label for='positionCode'>Position Code</label>
                    <input type='text' name='positionCode' class='form-control' value='$positionCode' placeholder='Position Code'>
                </div>
                <div class='form-group'>
                    <label for='positionDescription'>Position Description</label>
                    <input type='text' name='positionDescription' class='form-control' value='$positionDescription'>
                </div>
                <div class='form-group'>
                    <label for='basicPay'>Basic Pay</label>
                    <input type='text' name='basicPay' class='form-control' value='$basicPay'>
                </div>
                ";
            }    
    } else if(!$result){
        die('Query failed at printOutData() function' . mysqli_error($connection));
    }
    }
    
    


 
        }}

// next row function ends

// previous row begins

function previousRow(){



    if(isset($_GET['previous-record'])){
        $positionID = $_GET['positionID'];
        $query = "SELECT * FROM positionTable ORDER BY positionID ASC LIMIT 1";
        global $connection;
        $result = mysqli_query($connection,$query);    
        $newResult=$result->fetch_array();
    
    if((int)$newResult[0] === (int)$positionID){
        firstRow();
    }
    else{

        $positionID = $_GET['positionID'];

    
    
    
    $query = "SELECT * from positionTable
    WHERE positionID < $positionID
    ORDER BY positionID DESC    
    LIMIT 1";
    global $connection;
        // $query .= "";
        $result = mysqli_query($connection,$query);
        if($result){
            while($row =  mysqli_fetch_assoc($result)){
                if(!$row){
                    defaultForm();
                }
                $positionID = $row['positionID'];
                $positionCode = $row['positionCode'];
                $positionDescription = $row['positionDescription'];
                $basicPay = $row['basicPay'];
                echo "
                <div class='form-group'>
                    <label for='positionID'>Position ID</label>
                    <input type='text' name='positionID' class='form-control' value='$positionID'>
                </div>
                <div class='form-group'>
                    <label for='positionCode'>Position Code</label>
                    <input type='text' name='positionCode' class='form-control' value='$positionCode'>
                </div>
                <div class='form-group'>
                    <label for='positionDescription'>Position Description</label>
                    <input type='text' name='positionDescription' class='form-control' value='$positionDescription'>
                </div>
                <div class='form-group'>
                    <label for='basicPay'>Basic Pay</label>
                    <input type='text' name='basicPay' class='form-control' value='$basicPay'>
                </div>
                ";
            }    
    } else if(!$result){
        die('Query failed at printOutData() function' . mysqli_error($connection));
    }


    }



        }}

// previous row ends


// first row function begins
function firstRow(){
    $query = "SELECT * FROM positionTable ORDER BY positionID ASC LIMIT 1";
    global $connection;
        // $query .= "";
        $result = mysqli_query($connection,$query);
        if($result){
            while($row =  mysqli_fetch_assoc($result)){
                // if(!$row){
                //     defaultForm();
                // }
                $positionID = $row['positionID'];
                $positionCode = $row['positionCode'];
                $positionDescription = $row['positionDescription'];
                $basicPay = $row['basicPay'];
                echo "
                <div class='form-group'>
                    <label for='positionID'>Position ID</label>
                    <input type='text' name='positionID' class='form-control' value='$positionID'>
                </div>
                <div class='form-group'>
                    <label for='positionCode'>Position Code</label>
                    <input type='text' name='positionCode' class='form-control' value='$positionCode'>
                </div>
                <div class='form-group'>
                    <label for='positionDescription'>Position Description</label>
                    <input type='text' name='positionDescription' class='form-control' value='$positionDescription'>
                </div>
                <div class='form-group'>
                    <label for='basicPay'>Basic Pay</label>
                    <input type='text' name='basicPay' class='form-control' value='$basicPay'>
                </div>
                ";
            }    
    } else if(!$result){
        die('Query failed at printOutData() function' . mysqli_error($connection));
    }
        }

// first row funtion ends




function deleteRecord(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      
        if (isset($_GET['delete-record']) && $_GET['positionID'] !='New') {
            $positionID = $_GET['positionID'];
            $connection = mysqli_connect('localhost', 'root', '', 'HUMAN_RESOURCE_MANAGEMENT_DATABASE');
            $query = "DELETE FROM positionTable WHERE positionID = $positionID";
            $result = mysqli_query($connection,$query);
            header("Location: read.php");


            if(!$result){
                die('Query failed dude' . mysqli_error($connection));
            }
        }
      }
    }

// Everything below this line is for the employee profile pages






// I repeat: Everything below this line is for the employee profile pages

function defaultEmployeeProfileForm(){
        
    
        if (isset($_GET['next-record'])){
            
            nextEmployeeProfileRow();
            
        }
        else if (isset($_GET['previous-record'])){
            previousEmployeeProfileRow();
        }
        else if(isset($_GET['add-employee-record'])){
            
           
            addEmployeeProfileRecord();
        }
        else{
            $query = "SELECT COUNT(*) FROM employeeProfileTable";


            global $connection;
        
                $result = mysqli_query($connection,$query);
                
                
                
                    echo "
                    <div class='form-group'>
                    <label for='employeeNumber'>Employee Number</label>
                    <input type='text' name='employeeNumber' class='form-control' placeholder='New'>
                </div>
                <div class='form-group'>
                    <label for='firstName'>First Name</label>
                    <input type='text' name='firstName' class='form-control' placeholder='First Name'>
                </div>
                <div class='form-group'>
                    <label for='lastName'>Last Name</label>
                    <input type='text' name='lastName' class='form-control' placeholder='Last Name'>
                </div>
                <div class='form-group'>
                    <label for='sex'>Sex</label>
                    <select id='sex' name='sex' class='form-select' aria-label='select male or female for sex'>
                        <option value=''class='placeholder'>Sex</option>
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='civilStatus'>Civil Status</label>
                    <select id='civil-status' name='civilStatus' class='form-select' aria-label='Civil Status' >
                    <option value=''class='placeholder'>Civil Status</option>
                    <option value='Single'>Single</option>
                    <option value='Married'>Married</option>
                    <option value='Legally Separated'>Legally Separated</option>
                    <option value='Widow'>Widow</option>
                </select>
                </div>
                <div class='form-group'>
                    <label for='birthDate'>Birthdate</label>
                    <input id='bDay' type='date' name='birthDate' class='form-control' title='Enter year, then month, then day. For example, enter 2001-05-05 for May 05, 2001.'>
                </div>
                <div class='form-group'>
                    <label for='phoneNumber'>Phone Number</label>
                    <input type='tel' data-slots='_' value='(___) ___-____' id='phoneNumber' name='phoneNumber' class='form-control' placeholder='+1 (___) ___-____' >
                </div>
        
                ";
                $query = "SELECT positionCode FROM positionTable";
                global $connection;
                $result = mysqli_query($connection,$query);
                
                    
                echo
                "<div class='form-group'>
                    <label for='position'>Position</label>
                    <select id='position' name='position' class='form-select' aria-label='position'>
                    <option value='select position'>Position</option>";
                    
                // Loop it here.
                while ($position = mysqli_fetch_row($result)) {
                    
                    echo "<option value='$position[0]'>$position[0] </option>";
                }
                    echo "
                    </select>
                </div>";
        }
}


// last record button begins
function clickedLastEmployeeProfileRecord(){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['last-employee-record']) && $_GET['employeeNumber'] == "New"){
            header("Location: employee-profile.php");
        }
        else if(isset($_GET['last-employee-record'])){
            header("Location: last-employee-profile.php");
        }
    }
}


// Add record button begins
function addEmployeeProfileRecord(){

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if($_GET['employeeNumber'] == ""){
            $firstName = $_GET['firstName'];
            $lastName = $_GET['lastName'];
            $sex = $_GET['sex'];
            $civilStatus = $_GET['civilStatus'];
            $birthDate = $_GET['birthDate'];
            $phoneNumber = $_GET['phoneNumber'];
            $position = $_GET['position'];
            global $connection;
            if($birthDate === ''){
                $query = "INSERT INTO employeeProfileTable(firstName, lastName, sex, civilStatus, birthDate, phoneNumber, position) VALUES ('$firstName', '$lastName', '$sex','$civilStatus', null, '$phoneNumber','$position')";
            }else{
                $query = "INSERT INTO employeeProfileTable(firstName, lastName, sex, civilStatus, birthDate, phoneNumber, position) VALUES ('$firstName', '$lastName', '$sex','$civilStatus', '$birthDate', '$phoneNumber','$position')";
            }
            
            $result = mysqli_query($connection,$query);
    
    
        
            if(!$result){
                die('Query failed at addemployeeprofilerecord' . mysqli_error($connection));
            }
    
            header("Location: employee-profile.php");
        }else{
            header("Location: employee-profile.php");
            // echo "<span style='color:white'>add record failed'</span>";
        }



        
    }
}

// Add record button ends

// Last row function begins
function lastEmployeeProfileRow(){
    
    $query = "SELECT * FROM employeeProfileTable ORDER BY employeeNumber DESC LIMIT 1";
    global $connection;
        $result = mysqli_query($connection,$query);
        if(isset($_GET['next-employee-record'])){
            nextEmployeeProfileRow();
    
        }else if(isset($_GET['previous-record'])){
            previousEmployeeProfileRow();
        }
        else if($result){
            while($row =  mysqli_fetch_assoc($result)){
                if(!$row){
                    defaultForm();                    
                }
                $employeeNumber = $row['employeeNumber'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $sex = $row['sex'];
                $civilStatus = $row['civilStatus'];
                $birthDate = $row['birthDate'];
                $phoneNumber = $row['phoneNumber'];
                $position = $row['position'];
                echo "
                <div class='form-group'>
                <label for='employeeNumber'>Employee Number</label>
                <input type='text' name='employeeNumber' class='form-control' value='$employeeNumber'>
            </div>
            <div class='form-group'>
                <label for='firstName'>First Name</label>
                <input type='text' name='firstName' class='form-control' value='$firstName'>
            </div>
            <div class='form-group'>
                <label for='lastName'>Last Name</label>
                <input type='text' name='lastName' class='form-control' value='$lastName'>
            </div>
            <div class='form-group'>
                <label for='sex'>Sex</label>
                <select name='sex' class='form-select' aria-label='select male or female for sex'>
                    <option value='$sex'>Male</option>
                    <option value='$sex'>Female</option>
                </select>
            </div>
            <div class='form-group'>
                <label for='civilStatus'>Civil Status</label>
                <input type='text' name='civilStatus' class='form-control' value='$civilStatus' placeholder='Civil Status'>
            </div>
            <div class='form-group'>
                <label for='birthDate'>Birthdate</label>
                <input type='text' name='birthDate' class='form-control' value='$birthDate'  placeholder='Birthdate'>
            </div>
            <div class='form-group'>
                <label for='phoneNumber'>Phone Number</label>
                <input type='text' name='phoneNumber' class='form-control' value='$phoneNumber'>
            </div>
                ";
        $query = "SELECT positionCode FROM positionTable";
        global $connection;
        $result = mysqli_query($connection,$query);
        
            
        echo
        "<div class='form-group'>
            <label for='position'>Position</label>
            
            <select id='position' name='position' class='form-select' aria-label='position'>
            <option value='position'>$position</option>";
            
        // Loop it here.
        while ($position = mysqli_fetch_row($result)) {
            
            echo "<option value='$position[0]'>$position[0] </option>";
        }
            echo "
            </select>
        </div>";
            }
    } else if(!$result){
        die('Query failed at lastEmployeeProfileRow() function' . mysqli_error($connection));
    }

        }

// last row function ends


// next row function begins

function nextEmployeeProfileRow(){
    if(isset($_GET['next-employee-record'])){
        $employeeNumber = $_GET['employeeNumber'];
    $query = "SELECT * FROM employeeProfileTable ORDER BY employeeNumber DESC LIMIT 1";
    global $connection;
    $result = mysqli_query($connection,$query);
    $newResult=$result->fetch_array();
    if((int)$newResult[0] === (int)$employeeNumber){
        header("Location: last-employee-profile.php");
    }
    else{
        $query = "SELECT * from employeeProfileTable
        WHERE employeeNumber > $employeeNumber
        ORDER BY employeeNumber ASC
        LIMIT 1";
        global $connection;
            
            $result = mysqli_query($connection,$query);
        if($result){
            while($row =  mysqli_fetch_assoc($result)){
                if(!$row){
                    defaultForm();
                }
                $employeeNumber = $row['employeeNumber'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $sex = $row['sex'];
                $civilStatus = $row['civilStatus'];
                $birthDate = $row['birthDate'];
                $phoneNumber = $row['phoneNumber'];
                $position = $row['position'];
                echo "
                <div class='form-group'>
                <label for='employeeNumber'>Employee Number</label>
                <input type='text' name='employeeNumber' class='form-control' value='$employeeNumber'>
            </div>
            <div class='form-group'>
                <label for='firstName'>First Name</label>
                <input type='text' name='firstName' class='form-control' value='$firstName'>
            </div>
            <div class='form-group'>
                <label for='lastName'>Last Name</label>
                <input type='text' name='lastName' class='form-control' value='$lastName'>
            </div>
            <div class='form-group'>
                <label for='sex'>Sex</label>
                <select name='sex' class='form-select' aria-label='select male or female for sex'>
                    <option value='$sex'>Male</option>
                    <option value='$sex'>Female</option>
                </select>
            </div>
            <div class='form-group'>
                <label for='civilStatus'>Civil Status</label>
                <input type='text' name='civilStatus' class='form-control' value='$civilStatus' placeholder='Civil Status'>
            </div>
            <div class='form-group'>
                <label for='birthDate'>Birthdate</label>
                <input type='text' name='birthDate' class='form-control' value='$birthDate'  placeholder='Birthdate'>
            </div>
            <div class='form-group'>
                <label for='phoneNumber'>Phone Number</label>
                <input type='text' name='phoneNumber' class='form-control' value='$phoneNumber'>
            </div>
                ";
        $query = "SELECT positionCode FROM positionTable";
        global $connection;
        $result = mysqli_query($connection,$query);
        
            
        echo
        "<div class='form-group'>
            <label for='position'>Position</label>
            
            <select id='position' name='position' class='form-select' aria-label='position'>
            <option value='position'>$position</option>";
            
        // Loop it here.
        while ($position = mysqli_fetch_row($result)) {
            
            echo "<option value='$position[0]'>$position[0] </option>";
        }
            echo "
            </select>
        </div>";
            }
    } else if(!$result){
        die('Query failed at lastEmployeeProfileRow() function' . mysqli_error($connection));
    }


}}
        }

// next row function ends

// previous row begins

function previousEmployeeProfileRow(){



    if(isset($_GET['previous-record'])){
        $employeeNumber = $_GET['employeeNumber'];
        $query = "SELECT * FROM employeeProfileTable ORDER BY employeeNumber ASC LIMIT 1";
        global $connection;
        $result = mysqli_query($connection,$query);    
        $newResult=$result->fetch_array();
    
    if((int)$newResult[0] === (int)$employeeNumber){
        header("Location: first-employee-profile.php");
    }
    else{

        $positionID = $_GET['employeeNumber'];

    
    
    
    $query = "SELECT * from employeeProfileTable
    WHERE employeeNumber < $employeeNumber
    ORDER BY employeeNumber DESC    
    LIMIT 1";
    global $connection;
        // $query .= "";
        $result = mysqli_query($connection,$query);
        if($result){
            while($row =  mysqli_fetch_assoc($result)){
                if(!$row){
                    defaultForm();
                }
                $employeeNumber = $row['employeeNumber'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $sex = $row['sex'];
                $civilStatus = $row['civilStatus'];
                $birthDate = $row['birthDate'];
                $phoneNumber = $row['phoneNumber'];
                $position = $row['position'];
                echo "
                <div class='form-group'>
                <label for='employeeNumber'>Employee Number</label>
                <input type='text' name='employeeNumber' class='form-control' value='$employeeNumber'>
            </div>
            <div class='form-group'>
                <label for='firstName'>First Name</label>
                <input type='text' name='firstName' class='form-control' value='$firstName' placeholder='First Name'>
            </div>
            <div class='form-group'>
                <label for='lastName'>Last Name</label>
                <input type='text' name='lastName' class='form-control' value='$lastName' placeholder='Last Name'>
            </div>
            <div class='form-group'>
                <label for='sex'>Sex</label>
                <select name='sex' class='form-select' aria-label='select male or female for sex'>
                    <option value='$sex'>Male</option>
                    <option value='$sex'>Female</option>
                </select>
            </div>
            <div class='form-group'>
                <label for='civilStatus'>Civil Status</label>
                <input type='text' name='civilStatus' class='form-control' value='$civilStatus' placeholder='Civil Status'>
            </div>
            <div class='form-group'>
                <label for='birthDate'>Birthdate</label>
                <input type='text' name='birthDate' class='form-control' value='$birthDate'  placeholder='Birthdate'>
            </div>
            <div class='form-group'>
                <label for='phoneNumber'>Phone Number</label>
                <input type='text' name='phoneNumber' class='form-control' value='$phoneNumber'>
            </div>
            <div class='form-group'>
                <label for='position'>Position</label>
                <input type='text' name='position' class='form-control' value='$position'>
            </div>
                ";
            }    
    } else if(!$result){
        die('Query failed at printOutData() function' . mysqli_error($connection));
    }


    }



        }}

// previous row ends


// first row function begins
function firstEmployeeProfileRow(){
    if(isset($_GET['next-employee-record'])){

        nextEmployeeProfileRow();

    }else if(isset($_GET['previous-record'])){
        previousEmployeeProfileRow();
    }
    else{

        $query = "SELECT * FROM employeeProfileTable ORDER BY employeeNumber ASC LIMIT 1";
        global $connection;
            // $query .= "";
            $result = mysqli_query($connection,$query);
            if($result){
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
                    <div class='form-group'>
                    <label for='employeeNumber'>Employee Number</label>
                    <input type='text' name='employeeNumber' class='form-control' value='$employeeNumber'>
                </div>
                <div class='form-group'>
                    <label for='firstName'>First Name</label>
                    <input type='text' name='firstName' class='form-control' value='$firstName' placeholder='First Name'>
                </div>
                <div class='form-group'>
                    <label for='lastName'>Last Name</label>
                    <input type='text' name='lastName' class='form-control' value='$lastName' placeholder='Last Name'>
                </div>
                <div class='form-group'>
                    <label for='sex'>Sex</label>
                    <select name='sex' class='form-select' aria-label='select male or female for sex'>
                        <option value='$sex'>Male</option>
                        <option value='$sex'>Female</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='civilStatus'>Civil Status</label>
                    <input type='text' name='civilStatus' class='form-control' value='$civilStatus' placeholder='Civil Status'>
                </div>
                <div class='form-group'>
                    <label for='birthDate'>Birthdate</label>
                    <input type='text' name='birthDate' class='form-control' value='$birthDate'  placeholder='Birthdate'>
                </div>
                <div class='form-group'>
                    <label for='phoneNumber'>Phone Number</label>
                    <input type='text' name='phoneNumber' class='form-control' value='$phoneNumber'>
                </div>
                <div class='form-group'>
                    <label for='position'>Position</label>
                    <input type='text' name='position' class='form-control' value='$position'>
                </div>
                    ";
                }
        } else if(!$result){
            die('Query failed at printOutData() function' . mysqli_error($connection));
        }
    }

        }

// first row funtion ends


function deleteEmployeeProfileRecord(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      
        if (isset($_GET['delete-record']) && $_GET['employeeNumber'] !='New') {
            $employeeNumber = $_GET['employeeNumber'];
            $connection = mysqli_connect('localhost', 'root', '', 'HUMAN_RESOURCE_MANAGEMENT_DATABASE');
            $query = "DELETE FROM employeeProfileTable WHERE employeeNumber = $employeeNumber";
            $result = mysqli_query($connection,$query);
            header("Location: employee-profile.php");


            if(!$result){
                die('Query failed dude' . mysqli_error($connection));
            }
        }
      }
    }


// fill preview employee record preview table
// function fillPreviewTable(){

// }

