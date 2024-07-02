<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter</title>
</head>
<body>

<h2>Unit Converter</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="input_value">Input Value:</label>
    <input type="text" name="input_value" required>

    <label for="from_unit">From Unit:</label>
    <select name="from_unit" required>
        <?php foreach (getLengthUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
        <?php foreach (getWeightUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
        <?php foreach (getTemperatureUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
        <?php foreach (getHeightUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
    </select>

    <label for="to_unit">To Unit:</label>
    <select name="to_unit" required>
        <?php foreach (getLengthUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
        <?php foreach (getWeightUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
        <?php foreach (getTemperatureUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
        <?php foreach (getHeightUnits() as $unit) echo "<option value='$unit'>$unit</option>"; ?>
    </select>

    <label for="unit_type">Unit Type:</label>
    <select name="unit_type" required>
        <option value="length">Length</option>
        <option value="weight">Weight</option>
        <option value="temperature">Temperature</option>
        <option value="height">Height</option>
    </select>

    <input type="submit" value="Convert">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValue = $_POST['input_value'];
    $fromUnit = $_POST['from_unit'];
    $toUnit = $_POST['to_unit'];
    $unitType = $_POST['unit_type'];

    $convertedValue = convertUnits($inputValue, $fromUnit, $toUnit, $unitType);
    echo "<p>Converted Value: $convertedValue $toUnit</p>";
}

function getLengthUnits()
{
    return ['Inch', 'Centimeter', 'Meter', 'Kilometer'];
}

function getWeightUnits()
{
    return ['Gram', 'Kilogram', 'Pound'];
}

function getTemperatureUnits()
{
    return ['Celsius', 'Fahrenheit'];
}

function getHeightUnits()
{
    return ['Meter', 'Centimeter', 'Foot'];
}

function convertUnits($inputValue, $fromUnit, $toUnit, $unitType)
{
    switch ($unitType) {
        case 'length':
            return convertLength($inputValue, $fromUnit, $toUnit);
        case 'weight':
            return convertWeight($inputValue, $fromUnit, $toUnit);
        case 'temperature':
            return convertTemperature($inputValue, $fromUnit, $toUnit);
        case 'height':
            return convertHeight($inputValue, $fromUnit, $toUnit);
        default:
            return 'Invalid unit type';
    }
}

function convertLength($value, $fromUnit, $toUnit)
{
    $conversionFactors = [
        'Inch' => 1,
        'Centimeter' => 2.54,
        'Meter' => 0.0254,
        'Kilometer' => 0.0000254
    ];

    $convertedValue = $value * ($conversionFactors[$toUnit] / $conversionFactors[$fromUnit]);
    return round($convertedValue, 2);
}

function convertWeight($value, $fromUnit, $toUnit)
{
    $conversionFactors = [
        'Gram' => 1,
        'Kilogram' => 0.001,
        'Pound' => 0.00220462
    ];

    $convertedValue = $value * ($conversionFactors[$toUnit] / $conversionFactors[$fromUnit]);
    return round($convertedValue, 2);
}

function convertTemperature($value, $fromUnit, $toUnit)
{
    if ($fromUnit == 'Celsius' && $toUnit == 'Fahrenheit') {
        return round(($value * 9/5) + 32, 2);
    } elseif ($fromUnit == 'Fahrenheit' && $toUnit == 'Celsius') {
        return round(($value - 32) * 5/9, 2);
    } else {
        return $value; // No conversion needed
    }
}

function convertHeight($value, $fromUnit, $toUnit)
{
    $conversionFactors = [
        'Meter' => 1,
        'Centimeter' => 100,
        'Foot' => 3.28084
    ];

    $convertedValue = $value * ($conversionFactors[$toUnit] / $conversionFactors[$fromUnit]);
    return round($convertedValue, 2);
}
?>

</body>
</html>
