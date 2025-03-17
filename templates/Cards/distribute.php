<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Distribution</title>
</head>
<body>
    <h1>Card Distribution</h1>

    <?php if (isset($distributedCards)): ?>
        <?php foreach ($distributedCards as $personIndex => $cards): ?>
            <p>Person <?= $personIndex + 1 ?>: <?= implode(', ', $cards) ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No cards distributed.</p>
    <?php endif; ?>
</body>
</html>