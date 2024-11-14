
    <?php
    $num = range(1, 30);
    foreach ($num as $n) {
        $new_n = $n + 5;
        if ($new_n % 2 == 0) {
            echo "$new_n is even <br>";
        } else {
            echo "$new_n is odd <br>";
        }
    }
    ?>
