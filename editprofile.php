<?php
    session_start();
    if (empty($_SESSION['login'])) // check is not login
    {
        header("location:login.php");
    }
    // redirection to login page
    require ("connection.php");
    try {
        $db = new PDO('mysql:host=localhost;dbname=pharmacyproject;charset=UTF8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // search user from database
        $sql = $db->prepare("SELECT * FROM users WHERE Username=?;");
        $sql->execute([$_SESSION['Username']]);
        $user = $sql->fetchAll()[0];

        $Username = $user['Username'];


    } catch (PDOException $ex) {
        die($ex);
    }
    if (isset($_POST['update'])) { // check if submit form
        // get data from form

        $Username = trim($_POST['Username']);

        $oldPassword = trim($_POST['oldPassword']);
        $newPassword = trim($_POST['newPassword']);
        $Password = $user['Password'];
        $errors = array(); // to collect errors

        if (!empty($newPassword)) {
            if (!preg_match("/^[\w\!\@\#\$\%\^\&\*\(\)\[\]]{6,10}$/", $newPassword)) {
                array_push($errors, "must be password form 6 to 10 character");
            }
            $Password = $newPassword;
        }

        if (!preg_match("/^(?=[a-zA-Z0-9._]{3,9}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $Username)) {
            array_push($errors, "must be username form 3 to 9 character");
        }

        if (($oldPassword) != $user['Password']) {
            array_push($errors, "old password is wrong");
        }
        if (count($errors) <= 0) { // if don't have error
            try {
                // update user
                $update = $db->prepare("UPDATE users SET Username = ?,  Password = ? WHERE ID = ?;");
                $update->execute([$Username, $Password, $user['ID']]);
                $_SESSION['Username'] = $Username;
                header("location:homePage.php");

            } catch (PDOException $ex) {
                die($ex);
            }
        } else {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <h1 class='main-head'> Upon succesful cahnge, you will be directed to the main page directly.</h1>
        username: <input type="text" name="Username" required value="<?= $Username ?>"><br><br>

        new password: <input type="password" name="newPassword"><br><br>
        old password: <input type="password" name="oldPassword" required><br><br>
        <input type="submit" value="Update" name="update">
    </form>
</body>
</html>