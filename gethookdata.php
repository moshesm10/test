<?php 
        include 'connect.php';

        // get hook
        $json = json_decode(file_get_contents('php://input'), true);

        $timestamp = $json['head_commit']['timestamp'];
        $username = $json['head_commit']['committer']['username'];
        $message = $json['head_commit']['message'];
        $url = $json['head_commit']['url'];

        $query = "INSERT INTO `test` (`timestamp`, 	`username`, `message`, `url`) 
            VALUES ('$timestamp', '$username', '$message', '$url')";
        $result = mysqli_query($link, $query) or die("2Ошибка " . mysqli_error($link)); 
        mysqli_close($link);


        echo 'Done!';
        print_r($json['head_commit']['timestamp']);
        print_r($json['head_commit']['committer']['username']);
        print_r($json['head_commit']['message']);
        print_r($json['head_commit']['url']);
    ?>