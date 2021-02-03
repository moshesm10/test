        <?php 
         
        $user = 'a0413857_test';
        $password = 'test';
        $db = 'a0413857_test';
        $host = 'localhost';

        $link = mysqli_connect($host, $user, $password, $db) 
            or die("Ошибка " . mysqli_error($link));


        $query = "INSERT INTO `test` (`data`) VALUES $_REQUEST";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
        // close link
        mysqli_close($link);
        ?>