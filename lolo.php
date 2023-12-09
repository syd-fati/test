<?php
$db = new PDO('mysql:host=localhost;dbname=pharmacy489;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();

if (isset($_POST['add'])) {
    $Fname = trim($_POST['FName']);
    $Lname = trim($_POST['LName']);
    $Address = trim($_POST['Address']);
    $DOB = trim($_POST['DOB']);
    
   
    $Email = trim($_POST['Email']);
    $Username = trim($_POST['Username']);
    $PhoneNo = trim($_POST['PhoneNo']);
    $Password = trim($_POST['Password']);
    $Staff = trim($_POST['Staff']);

    $errors = array();

    if (!preg_match("/^(?=[a-zA-Z0-9._]{3,9}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $Username)) {
        array_push($errors, "Username must be between 3 and 9 characters");
    }
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email");
    }
    if (!preg_match("/^[\d]{8}$/", $PhoneNo)) {
        array_push($errors, "Phone number must be 8 digits");
    }
    if (!preg_match("/^[\w\!\@\#\$\%\^\&\*\(\)\[\]]{6,10}$/", $Password)) {
        array_push($errors, "Password must be between 6 and 10 characters");
    }

    if (count($errors) <= 0) {
        try {
            $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = $db->prepare("INSERT INTO users (Username, Password, Email, type) VALUES (?, ?, ?, ?)");
            $sql->execute([$Username, $hashedPassword, $Email, $Staff]);

            $sql = "SELECT * FROM users WHERE Username LIKE '%$Username%'";
            $r = $db->query($sql);
            $idused = 0;
            while ($row = $r->fetch()) {
                $idused = $row[0];
            }

            $sql = $db->prepare("INSERT INTO staffandadmin1 (Fname, Lname, PhoneNo, Email, Address, DOB, UserID)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute([$Fname, $Lname, $PhoneNo, $Email, $Address, $DOB,  $idused]);

            header("location: home.php");
        } catch (PDOException $ex) {
            die($ex);
        }
    } else {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    }}

?>




















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
      body {
        background-color: #f2f2f2;
      }
      form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
        width: 400px;
        margin: auto;
        margin-top: 150px;
      }
      input[type=text], input[type=password] ,input[type=number] ,input[type=email],input[type=date] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;}
        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type=submit]:hover {
        background-color: #45a049;
      }


      h1,p {
margin: auto;
justify-content: center;
text-align: center;

      }



      </style>
</head>
<body>
<form method="post" enctype="multipart/form-data" >
<h1>add</h1><br><br>
First Name: <input type="text" name="FName" required><br><br>
        Last Name: <input type="text" name="LName" required><br><br>
        Phone Number: <input type="number" name="PhoneNo" required><br><br>
        Email: <input type="Email" name="Email" required><br><br>
        Address: <input type="text" name="Address" required><br><br>
        Date Of Birth: <input type="date" name="DOB" required><br><br>
       
       User Name: <input type="text" name="Username" required><br><br>
        password: <input type="password" name="Password" required><br><br>
        
       
      <input type="hidden" value="P" name="P">
        <input type="submit" value="add" name="add"><br><br>
        
    </form>
</body>
</html>

