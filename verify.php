<?php
    session_start();
    //           login   باخذ داتا من  
    
    $Username = trim($_POST['Username']);
    $Email = trim($_POST['Email']);
    $Password = trim($_POST['Password']);
    try {
        require('Connection.php');
        
        //   coloums   بختار كل   
    
            // search user from database
            $sql = "SELECT * FROM users WHERE Username=?";
        $stmt = $db->prepare($sql);//    prepare  استخدمت علامة؟ عالشان اسوي 
        $stmt->execute([$Username]);//              Fetch  فاحولهم الى اري شلون؟ باستخدام  result في   select حق execute سويت 
        $result = $stmt->fetchAll();

// اتاكد ان اليوز يكون موجود او لا عقب ما تأكد اتاد ان الباسورد صح او لا
        if(count($result) == 0)
            die("Incorrect username <br> <a href='Login.php'>Login Again</a>");

        if(!password_verify($Password, $result[0]['Password']))//        اللي باليوزر  select  اللي اخذته من  table   اللي موجود في hash password استخدام 
            die("Incorrect password <br> <a href='Login.php'>Login Again</a>");

    
                
                $type="";
                while ($row = $r->fetch()) {
                    $idused= $row[0];
                     $type= $row[4];

                if($type=="cutomer1"){
                    header("location:home.php"); // redirection to index
                }
                else if($type=="Staff"){
                    header("location:home.php"); // redirection to index
                }
               
                else if($type=="admin"){
                    header("location:home.php"); // redirection to index
                }}


             { // if username or password wrong
                echo "username or password is wrong, please try again";
            }
            $db = null;
        }catch (PDOException $ex) {
            die($ex);
        }
?>