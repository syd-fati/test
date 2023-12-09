<!DOCTYPE html>
<html>
<head>
  <title>Staff Management System</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 20px;
}

h1 {
  color: #333;
}

h2 {
  color: #666;
  margin-top: 30px;
}

form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-top: 10px;
}

input[type="text"],
input[type="number"],
input[type="tel"],
input[type="date"] {
  width: 200px;
  padding: 5px;
}

select {
  width: 200px;
  padding: 5px;
}

input[type="submit"] {
  padding: 8px 15px;
  background-color: #333;
  color: #fff;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #666;
}
  </style>
  
</head>
<body>
  <h1>Staff Management System</h1>
  
  <!-- Add Staff Form -->
  <h2>Add New Staff</h2>
  <form action="add_staff.php" method="POST">
    <label for="staff_id">Staff ID:</label>
    <input type="number" id="staff_id" name="staff_id" required>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" required>
    <label for="tel">Tel:</label>
    <input type="tel" id="tel" name="tel" required>
    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" required>
    <label for="date_of_join">Date of Joining:</label>
    <input type="date" id="date_of_join" name="date_of_join" required>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" required>
    <input type="submit" value="Add Staff">
  </form>
  
  <!-- Delete Staff Form -->
  <h2>Delete Staff</h2>
  <form action="delete_staff.php" method="POST">
    <label for="delete_staff_id">Staff ID:</label>
    <input type="number" id="delete_staff_id" name="delete_staff_id" required>
    <input type="submit" value="Delete Staff">
  </form>
  
 
 <!-- Update Staff Form -->
 <h2>Update Staff Details</h2>
  <form action="update_staff.php" method="POST">
    <label for="staff_id">Staff ID:</label>
    <input type="number" id="staff_id" name="staff_id" required>
    <label for="job_title">Job Title:</label>
    <input type="text" id="job_title" name="job_title" required>
    <label for="tel">Tel:</label>
    <input type="tel" id="tel" name="tel" required>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    <input type="submit" value="Update Staff">
  </form>
</body>
</html>