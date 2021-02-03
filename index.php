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
        if($json = json_decode(file_get_contents("php://input"), true)) {
            print_r($json);
            $data = $json;
        } else {
            print_r($_POST);
            $data = $_POST;
        }
        ?>