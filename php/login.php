<?php
    include_once 'db.php';
    session_start();

    //signin code
    if(isset($_POST['strSignin'])){
        $sql = "SELECT * FROM `credentials`";
        
        $retval = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($retval)){
            if($row['email'] == $_POST['strEmail'] && $row['passw'] == md5($_POST['strPassw']))
            {
                echo 'done';
                header('location: app-main.html');
            }
        }
    }

    //signup code
    if(isset($_POST['strSignup'])){
        $strEmail    = $_POST['strEmail_reg'];
        $strUsername = $_POST['strUsername_reg'];
        
        //passwords encrypt with md5
        $strPassw    = md5($_POST['strPassw_reg']);  
        $strPassw2   = md5($_POST['strPassw_reg2']);
        
        //check if the user had filled the entries
        if ($strEmail != '' && $strUsername != '' && $strPassw != '' && $strPassw2 != ''){
            if($strPassw == $strPassw2){
                $sql ="INSERT INTO `app`.`credentials` (`email`, `username`, `passw`, `repassw`) VALUES ('$strEmail', '$strUsername', '$strPassw', '$strPassw2')";

                $retval = mysqli_query($conn, $sql);
                if(!$retval){
                    //error
                    echo 'error';
                    header('location: ../login.html');
                }
                else{
                    //your task
                    echo 'Done signup';
                    header('location: login.html');
                }
            }
        }
        else{
            echo "<div class='error-report'>Complete the entries</div>";
        }
    }
?>