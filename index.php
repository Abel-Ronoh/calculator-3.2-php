<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
    <style>
      
    </style>
</head>
<body>
    <div class="calculator">
        <form action="" method="post">
            <input type="number" step="any" name="input1" placeholder="First Value">
            <input type="number" step="any" name="input2" placeholder="Second Value">

            <div>
                <button type="submit" name="operation" value="add">+</button>
                <button type="submit" name="operation" value="subtract">-</button>
                <button type="submit" name="operation" value="multiply">*</button>
                <button type="submit" name="operation" value="divide">/</button>
                <button type="submit" name="operation" value="exponent">^</button>
                <button type="submit" name="operation" value="percentage">%</button>
                <button type="submit" name="operation" value="sqrt">√</button>
                <button type="submit" name="operation" value="log">log</button>
            </div>
        </form>
        <?php
        function calculatePercentage($input1, $input2) {
            return ($input1 / 100) * $input2;
        }

        function calculateSquareRoot($input) {
            return sqrt($input);
        }

        function calculateLogarithm($input) {
            return log($input);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input1 = isset($_POST['input1']) ? (float)$_POST['input1'] : 0;
            $input2 = isset($_POST['input2']) ? (float)$_POST['input2'] : 0;
            $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

            $result = '';
            $result1 = 0;
            $result2 = 0;

            switch ($operation) {
                case 'add':
                    $result = $input1 + $input2;
                    break;
                case 'subtract':
                    $result = $input1 - $input2;
                    break;
                case 'multiply':
                    $result = $input1 * $input2;
                    break;
                case 'divide':
                    if ($input2 != 0) {
                        $result = $input1 / $input2;
                    } else {
                        $result = 'Error: Division by zero';
                    }
                    break;
                case 'exponent':
                    $result = pow($input1, $input2);
                    break;
                case 'percentage':
                    $result = calculatePercentage($input1, $input2);
                    break;
                case 'sqrt':
                    $result = "√$input1 = " . calculateSquareRoot($input1);
                    if ($input2 != 0) {
                        $result .= ", √$input2 = " . calculateSquareRoot($input2);
                    }
                    break;
                case 'log':
                    $result1 = calculateLogarithm($input1);
                    $result = "log($input1) = $result1";
                    if ($input2 != 0) {
                        $result2 = calculateLogarithm($input2);
                        $result .= ", log($input2) = $result2";
                    }
                    break;
                default:
                    $result = 'Invalid operation';
                    break;
            }
            echo "<h1>THE ANSWER = $result</h1>";
        }
        ?>
    </div>
</body>
</html>
