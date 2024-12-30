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

        $query1 = "SELECT * FROM user WHERE username = '$username'";
        $result1 = $con->query($query1);
        if($result1->num_rows == 1){
            echo "<script>alert('Email này đã được dùng để đăng ký!');</script>"; 
        }
        else{
            if($username == "" || $password == ""){
                echo "<script>alert('Vui nhập đủ thông tin!');<script>";
            }
            else{
                $query = "INSERT INTO user(username,password) VALUES ('$username','$password')";
                $result = $con->query($query);
                if($result){
                    echo "<script>alert('Đăng ký tài khoản thành công!');<script>";
                    header("Location: index.html");
                    //echo "<script>alert('Đăng ký tài khoản thành công!');<script>";
                    exit();
                }
            }
        }
        $con->close();
    }
?>