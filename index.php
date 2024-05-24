<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آخر الأخبار</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .news {
            margin: 20px 0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .news h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <h1>آخر الأخبار</h1>
    </header>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "news_website";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        $sql = "SELECT title, content, author, published_at FROM news ORDER BY published_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='news'>";
                echo "<h2>" . $row["title"] . "</h2>";
                echo "<p>" . $row["content"] . "</p>";
                echo "<p><strong>الناشر:</strong> " . $row["author"] . "</p>";
                echo "<p><strong>تاريخ النشر:</strong> " . $row["published_at"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "لا توجد أخبار لعرضها.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
