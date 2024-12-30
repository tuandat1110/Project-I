<?php include "Connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Sắp xếp các phần tử theo chiều dọc */
            justify-content: flex-start; /* Căn phía trên */
            align-items: center;
            height: 100vh;
        }

        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-top: 20px; /* Thêm khoảng cách phía trên */
            margin-bottom: 20px; /* Khoảng cách giữa tiêu đề và form */
        }

        #container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Định dạng các nhãn và input */
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Khu vực nút bấm */
        #button {
            text-align: center;
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 0 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Khoảng cách giữa các nhóm input */
        input[type="text"] + br {
            display: none;
        }

        br + label {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h1>Quản lý,thêm,xóa sách trong database</h2>
    <div id='container'>
        <form action="" method="POST">
            <label>
                Tên sách:
                <input type="text" name="Ten" placeholder="enter name"><br><br>
            </label>
            <label>
                Loại sách:
                <input type="text" name="Loai" placeholder="enter type"><br><br>
            </label>
            <label>
                Tác giả:
                <input type="text" name="Tac_gia" placeholder="enter author"><br><br>
            </label>
            <label>
                Ngày xuất bản:
                <input type="text" name="Ngay_xuat_ban" placeholder=""><br><br>
            </label>
            <label>
                Nhà xuất bản:
                <input type="text" name="Nha_xuat_ban" placeholder=""><br><br>
            </label>
            <div id='button'>
                <input type="submit" name="save" value="save">
                <input type="submit" name="delete" value="delete">
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['save'])){
        $ten = $_POST['Ten'];
        $loai = $_POST['Loai'];
        $tacGia = $_POST['Tac_gia'];
        $ngayXuatBan = $_POST['Ngay_xuat_ban'];
        $nhaXuatBan = $_POST['Nha_xuat_ban'];
        $query="INSERT INTO books(Ten,Loai,Tac_gia,Ngay_xuat_ban,Nha_xuat_ban) values ('$ten','$loai','$tacGia','$ngayXuatBan','$nhaXuatBan')";
        $data = mysqli_query($con,$query);
        if($data){
            echo "<script>alert('Nhập dữ liệu thành công!');</script>";
        }
        else{
            echo "Please try again !";
        }
    }
    if(isset($_POST['delete'])){
        $ten = $_POST['Ten'];
        $query="DELETE FROM books WHERE Ten = '$ten'";
        $data = mysqli_query($con,$query);
        if($data){
            echo "<script>alert('Xóa dữ liệu thành công!');</script>";
        }
        else{
            echo "Please try again !";
        }
    }
    ?>
</body>
</html>

