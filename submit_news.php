<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "news_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];

$sql = "INSERT INTO news (title, content, author) VALUES ('$title', '$content', '$author')";

if ($conn->query($sql) === TRUE) {
    echo "تم نشر الخبر بنجاح";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
