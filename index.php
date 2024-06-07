<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Dinâmico</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Blog Dinâmico</h1>
    </header>
    <main>
        <section id="posts">
            <?php
            include 'db.php';

            $result = $conn->query("SELECT * FROM posts");
            While ($row = $result->fetch_assoc()) {
                echo '<article>';
                echo '<h2><a href=post.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h2>';
                echo '<p>' . substr($row['content'], 0, 100) . '...</p>';
                echo '</article>';
            }
            ?>
        </section>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>