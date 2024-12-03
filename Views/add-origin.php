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

    <form action="" method="post">
        <label for="originName">Origin Name:</label>
        <input type="text" id="originName" name="originName" required>

        <label for="originUrlImg">Origin Image URL:</label>
        <input type="text" id="originUrlImg" name="originUrlImg" required>

        <button type="submit">Add Origin</button>
    </form>
</div>
</body>
</html>