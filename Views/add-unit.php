<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Unit</title>
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
    <h1><?= isset($unit)? "Edit Unit" : "Add Unit" ?></h1>
    <?php if (isset($message) && $message): ?>
    <div class="error-message">
        <?= htmlspecialchars($message) ?>
    </div>
    <?php endif; ?>
    <form action="<?= isset($unit)? "index.php?action=edit-unit" : "index.php?action=add-unit" ?>" method="post">
        <input type="hidden" name="id" value="<?= isset($unit)? $unit->getId() : '' ?>">
        <label for="unitName">Unit Name:</label>
        <input type="text" id="unitName" name="unitName" required value="<?= isset($unit)? $unit->getName() : '' ?>">

        <label for="unitCost">Unit Cost:</label>
        <input type="number" id="unitCost" name="unitCost" required value="<?= isset($unit)? $unit->getCost() : '' ?>">

        <label for="unitOrigin">Unit Origin:</label>
        <input type="text" id="unitOrigin" name="unitOrigin" required value="<?= isset($unit)? $unit->getOrigin() : '' ?>">

        <label for="unitUrlImg">Unit Image URL:</label>
        <input type="text" id="unitUrlImg" name="unitUrlImg" required value="<?= isset($unit)? $unit->getUrlImg() : '' ?>">

        <button type="submit"><?= isset($unit)? "Edit Unit" : "Add Unit" ?></button>
    </form>
</div>
</body>
</html>