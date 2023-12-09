<?php
// Assuming you have a database connection established

// Retrieve user data from the database based on user ID
$userID = $_SESSION['user_id']; // Assuming you have stored the user ID in a session variable
$query = "SELECT * FROM users WHERE id = $userID";
$result = mysqli_query($connection, $query);
$userData = mysqli_fetch_assoc($result);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];

    // Update the user data in the database
    $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail' WHERE id = $userID";
    mysqli_query($connection, $updateQuery);

    // Check if a new password is provided
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $passwordUpdateQuery = "UPDATE users SET password = '$hashedPassword' WHERE id = $userID";
        mysqli_query($connection, $passwordUpdateQuery);
    }

    // Redirect to the profile page or display a success message
    header("Location: profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $userData['username']; ?>"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $userData['email']; ?>"><br><br>
        
        <label for="password">New Password:</label>
        <input type="password" name="password"><br><br>
        
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>