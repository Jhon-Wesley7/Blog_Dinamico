<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post do Blog</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Blog Dinâmico</h1>
    </header>
    <main>
        <?php
        include("db.php");

        if(isset($_GET['id'])) {
           $id = $_GET['id'];
           $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
           $stmt->bind_param( "i", $id);
           $stmt->execute();
           $result = $stmt->get_result();
           
           if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<article>';
                echo '<h2>' . $row['title'] .'</h2>';
                echo 'p'. $row['content'] .'</p>';
                echo '</article>';
            }
           } else {
            echo '<p>Post não encontrado.</p>';
           }

           $stmt->close();
        } else {
            echo '<p>ID do post não especificado.</p>';
        }

        $conn->close();
        ?>
    </main>
</body>
</html>