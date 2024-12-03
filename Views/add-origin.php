<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Origin</title>
    <link rel="stylesheet" href="/public/css/main.css">
</head>
<body>
<div class="menu">
    <a class="menu-link" href="?action=index">Home</a>
    <a class="menu-link" href="?action=add-unit">Add Unit</a>
    <a class="menu-link" href="?action=search">Search</a>
    <a class="menu-link" href="?action=add-unit-origin">Add Unit Origin</a>
</div>
<div class="container">

    <h1>Add Origin</h1>

    <?php if (isset($message)): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="index.php?action=add-unit-origin" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="url_img">Image URL:</label>
        <input type="url" id="url_img" name="url_img" required>

        <button type="submit">Add Origin</button>
    </form>
</div>
</body>
</html>