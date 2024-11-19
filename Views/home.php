<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Units</title>
    <link rel="stylesheet" href="/public/css/main.css">
</head>
<body>
<div class="container">
    <?php foreach ($listUnit as $unit): ?>
        <div class="unit-card">
            <img src="<?php echo htmlspecialchars($unit->getUrlImg()); ?>" alt="<?php echo htmlspecialchars($unit->getName()); ?>" class="unit-image">
            <div class="unit-details">
                <h2><?php echo htmlspecialchars($unit->getName()); ?></h2>
                <p>Cost: <?php echo htmlspecialchars($unit->getCost()); ?></p>
                <p>Origin: <?php echo htmlspecialchars($unit->getOrigin()); ?></p>
                <div class="options">
                    <a href="edit.php?id=<?php echo htmlspecialchars($unit->getId()); ?>" class="btn btn-edit">Edit</a>
                    <a href="delete.php?id=<?php echo htmlspecialchars($unit->getId()); ?>" class="btn btn-delete">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>