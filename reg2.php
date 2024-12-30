<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project1";

    // Kết nối cơ sở dữ liệu
    $con = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Lấy giá trị tìm kiếm từ form và loại bỏ khoảng trắng thừa
    $search = strtolower($_POST['search']);
    $search = trim($search);
    echo $search;

    // Truy vấn cơ sở dữ liệu
    $sql = "SELECT * FROM books WHERE TRIM(Ten) = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Lấy thông tin sách đầu tiên
        $bookName = trim($row['Ten']); // Chuẩn hóa giá trị trả về từ cơ sở dữ liệu

        // Kiểm tra và chuyển hướng đến trang HTML tương ứng
        switch ($bookName) {
            case "a brief history of time":
                header("Location: Book1.html");
                break;
            case "the great gatsby":
                header("Location: Book2.html");
                break;
            case "the little prince":
                header("Location: Book3.html");
                break;
            case "cô bé lọ lem":
                header("Location: Book4.html");
                break;
            default:
                echo "<script>alert('Không có trang HTML tương ứng cho sách này!');</script>";
                break;
        }
        exit();
    } else {
        echo "<script>alert('Không tìm thấy sách bạn mong muốn!');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
