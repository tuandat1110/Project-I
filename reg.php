<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Lay du lieu
        $username = $_POST["username"];
        $password = $_POST["password"];
        //Ket noi co so du lieu
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "project1";

        $con = new mysqli($host,$dbusername,$dbpassword,$dbname);

        if($con->connect_error){
            die("Connection failed: ".$con->connect_error);
        }

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $con->query($query);
        if($result->num_rows == 1){
            //login success
            header("Location: index.html");
            exit();
        }
        else{
            //login failed
            echo "<script>alert('Tài khoản không tồn tại hoặc sai mật khẩu!');</script>"; 
        }

        $con->close();
    }
?>