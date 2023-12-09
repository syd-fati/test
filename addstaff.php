

<?php 

include 'Connection.php';

session_start();



    if (isset($_POST['Add'])) {
    // Get form data
    
   
    $name = trim($_POST['name']);
    $jobTitle = trim($_POST['jobTitle']);
     $Address = trim($_POST['Address']);
    $dateOfJoin = trim($_POST['dateOfJoin']);
    $gender = trim($_POST['gender']);
    $DOB = trim($_POST['DOB']);
    $Username = trim($_POST['Username']);
    $Email = trim($_POST['Email']);
    $PhoneNo = trim($_POST['PhoneNo']);
    $Password = trim($_POST['Password']);
    
    $Staff = trim ($_POST['Staff']);
    
    $errors = array();

    if (!preg_match("/^(?=[a-zA-Z0-9._]{3,9}$)(?!.*[_.]{2})[^_.].*[^_.]$/i", $Username)) {
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

            $sql = "SELECT * FROM users WHERE Username LIKE ?";
            $r = $db->query($sql);
            $idused = 0;
            while ($row = $r->fetch()) {
                $idused = $row[0];}
            


  
        // Insert into staffandadmin table
        $stmt = $db->prepare("INSERT INTO staffandadmin ( name, jobTitle, PhoneNo, Email, Address, dateOfJoin,  gender, DOB,UserID) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->execute([$name, $jobTitle, $PhoneNo, $Email, $Address, $dateOfJoin,  $gender, $DOB,$idused]);

        echo "Staff inserted into staffandadmin table successfully<br>";

      
        

       
            }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }}}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Staff</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Staff</h2>
        <form action="" method="POST" >
            

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="jobTitle">Job Title:</label>
            <input type="text" name="jobTitle" id="jobTitle" required>

            <label for="PhoneNo">Phone Number:</label>
            <input type="text" name="PhoneNo" id="PhoneNo" required>

            <label for="Email">Email:</label>
            <input type="Email" name="Email" id="Email" required>

            <label for="Address">Address:</label>
            <input type="text" name="Address" id="Address" required>

            <label for="dateOfJoin">Date of Joining:</label>
            <input type="date" name="dateOfJoin" id="dateOfJoin" required>

           

            <label for="gender">Gender:</label>
            <select name="gender" id="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="Username">Username :  </label>
        <input autocomplete="off" type="text" name="Username" required>
        <br>
         
         <label for="Password"> Password :</label>
        <input autocomplete="off" type="Password" name="Password" required>
        <br>

            <label for="DOB">Date of Birth:</label>
            <input type="date" name="DOB" id="DOB" required><br>

            
            </select><br>

           
            <input type="submit" value="Add" name="Add">
        </form>
    </div>
</body>
</html>