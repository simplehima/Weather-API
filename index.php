<?php
// index.php
require_once 'Weather.php';

$weather = new Weather();

if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    $data = $weather->getWeather($country);
    $weatherOutput = $weather->displayWeather($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hima Weather App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Hima Weather App</h1>
        <form method="POST">
            <input type="text" name="country" placeholder="Enter country or city" required>
            <button type="submit" name="submit">Get Weather</button>
        </form>

        <?php if (isset($weatherOutput)): ?>
            <div class="weather-result">
                <?php echo $weatherOutput; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>