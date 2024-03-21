<!DOCTYPE html>
<html>
<head>
    <title>Mengurutkan Angka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .box {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
        }

        input[type="text"], input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9e9e9;
            border-radius: 5px;
        }

        .result p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Mengurutkan Angka</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Masukkan angka (pisahkan dengan koma):<br>
            <input type="text" name="numbers"><br><br>
            <input type="submit" value="Urutkan">
        </form>

        <?php
        function bubbleSort($arr) {
            $n = count($arr);
            for ($i = 0; $i < $n - 1; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($arr[$j] > $arr[$j + 1]) {
                        // Tukar posisi
                        $temp = $arr[$j];
                        $arr[$j] = $arr[$j + 1];
                        $arr[$j + 1] = $temp;
                    }
                }
            }
            return $arr;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numbersInput = $_POST['numbers'];
            $numbersArray = explode(",", $numbersInput);
            $numbersArray = array_map('trim', $numbersArray);
            $numbersArray = array_map('intval', $numbersArray);

            $sortedNumbers = bubbleSort($numbersArray);

            echo "<div class='result'>";
            echo "<h3>Hasil setelah diurutkan:</h3>";
            echo "<p>" . implode(", ", $sortedNumbers) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>