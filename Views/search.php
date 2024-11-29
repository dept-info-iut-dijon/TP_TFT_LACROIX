<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Units</title>
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
    <h1>Search Units</h1>
    <form action="" method="get">
        <label for="searchField">Search:</label>
        <input type="text" id="searchField" name="searchField" required>

        <label for="searchBy">Search By:</label>
        <select id="searchBy" name="searchBy" required>
            <?php
            use Models\Unit;
            $properties = Unit::getProperties();
            foreach ($properties as $property) {
                echo "<option value=\"$property\">$property</option>";
            }
            ?>
        </select>

        <button type="submit">Search</button>
    </form>
</div>
</body>
</html>