<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require('DataBase.php');


    $method = $_SERVER['REQUEST_METHOD'];

    if($method == "GET"){
        $sql = "SELECT * FROM tblemp";
        if(isset($_GET['id'])){
            $sql = "SELECT * FROM tblemp WHERE id =" . $_GET['id'];
        }

        $db = new DB();
        $connect = $db->connect(); //Connect Database
        $result = mysqli_query($connect, $sql); //Execute Query
    
        if (mysqli_num_rows($result) > 0) { //Check number of row
            while($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) { // Fetch each data
                $data = $row;
            }
        } 
        else {
            $data = "0 results";
        }
        mysqli_free_result($result);
        $db->closeConnection($connect);
        echo json_encode($data);
    }

    if($method == "POST"){
        $data = urldecode(file_get_contents('php://input'));
        
        $value = json_decode($data, TRUE);

        $db = new DB();
        $sql = "INSERT INTO tblemp (first_name, mid_add, last_name, contact_num, email_add, address) VALUES (?,?,?,?,?,?)";
         
        $connect = $db->connect();//Connect Database
        //Execute Query
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $mid_add, $last_name, $contact_num, $email_add, $address);
            
            $first_name = $value['first_name'];  
            $mid_add = $value['mid_add']; 
            $last_name =  $value['last_name'];    
            $contact_num =  $value['contact_num'];    
            $email_add =  $value['email_add'];    
            $address = $value['address']; 
            mysqli_stmt_execute($stmt);
        }
        else{
            echo json_decode("No Record Found");
        }
        
        mysqli_stmt_close($stmt);
        $db->closeConnection($connect);
        $response =
        [
            "Message" => "Record Added Successful",
        ];
        echo json_encode($response);
    }

    if($method == "PUT"){
        $message = null;
        $sql = null;

        $data = urldecode(file_get_contents('php://input'));
        
        $value = json_decode($data, TRUE);

        if(isset($_GET['id'])){
            $first_name = $value['first_name'];  
            $mid_add = $value['mid_add']; 
            $last_name =  $value['last_name'];    
            $contact_num =  $value['contact_num'];    
            $email_add =  $value['email_add'];    
            $address = $value['address']; 
            $sql = "UPDATE tblemp SET first_name = '$first_name', mid_add = '$mid_add', last_name = '$last_name', contact_num = '$contact_num', email_add = '$email_add', address = '$address' WHERE id = ". $_GET['id'];
        }
        else{
            die("Error ID");
        }

        $db = new DB();
        //Connect Database
        $connect = $db->connect();
        //Execute Query
        
        if (mysqli_query($connect, $sql)) {
            $message = "Record Update Successful";
        } 
        else {
            $message = "Error Updating record";
        }
        $db->closeConnection($connect);
        echo json_encode($message);      
    }

    if($method == "DELETE"){
        $message = null;
        $sql = null;

        $data = urldecode(file_get_contents('php://input'));
        
        $value = json_decode($data, TRUE);

        if(isset($_GET['id'])){
            $sql = "DELETE FROM tblemp WHERE id = " . $_GET['id'];
        }
        else{
            die("Error ID");
        }

        $db = new DB();
        //Connect Database
        $connect = $db->connect();
        //Execute Query
        
        if (mysqli_query($connect, $sql)) {
            $message = "Record Delete Successful";
        } 
        else {
            $message = "Error Updating record";
        }
        $db->closeConnection($connect);
        echo json_encode($message);      
    }


?>