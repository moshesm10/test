        <?php 
         
        $user = 'a0413857_test';
        $password = 'test';
        $db = 'a0413857_test';
        $host = 'localhost';

        $link = mysqli_connect($host, $user, $password, $db) 
            or die("1Ошибка " . mysqli_error($link));

        $query = "INSERT INTO `test` (`data`) VALUES $_POST[0]";
        $result = mysqli_query($link, $query) or die("2Ошибка " . mysqli_error($link)); 
        // close link

        mysqli_close($link);
        ?>