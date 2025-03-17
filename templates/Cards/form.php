<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Number of People</title>
</head>
<body>
    <h1>Enter Number of People</h1>
    <form action="/cards/distribute" method="get">
        <label for="people">Number of People:</label>
        <input type="number" id="people" name="people" min="1" required>
        <button type="submit">Distribute Cards</button>
    </form>
</body>
</html>