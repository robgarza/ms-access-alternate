<?php
$connection = mysqli_connect('localhost', 'root', '', 'HUMAN_RESOURCE_MANAGEMENT_DATABASE');
        if(!$connection){
            die("Database connection failed :(");
        }