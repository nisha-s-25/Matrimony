<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $religion = $_POST['religion'];
        $mother_tongue = $_POST['mother_tongue'];
        $number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $file = $_FILES['picture'];

        $capital_letter = false;
        $lower_case = false;
        $numeric = false;
        $special = false;

        if(strlen($password) < 8){
            echo "<h1>Password must of 8 characters long</h1>";
            exit();
        }

        for($i = 0; $i < strlen($password); $i++){
            if($password[$i] >= 'A' && $password[$i] <= 'Z'){
                $capital_letter = true;
            }
            if($password[$i] >= 'a' && $password[$i] <= 'z'){
                $lower_case = true;
            }
            if($password[$i] >= '0' && $password[$i] <= '9'){
                $numeric = true;
            }
            if($password[$i] == '!' || $password[$i] == '@' || $password[$i] == '#' || $password[$i] == '$' || $password[$i] == '%' || $password[$i] == '&' || $password[$i] == '*'){
                $special = true;
            }
        }

        if(($capital_letter && $lower_case && $number && $special) == false){
            echo "
                <h1>Password must contain one upper_case, one lower_case, one numeric values and one special character</h1>
            ";
        }
        else{
            echo "Registered";
        }

        $target_directory = "upload/";
        $fileName = $file['tmp_name'];

        $newFileName = $email . '.jpeg';

        $target_file = $target_directory . $newFileName;

        move_uploaded_file($fileName, $target_file);
        echo " and moved file to upload folder";
    }
?>