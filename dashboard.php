<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Form</title>
<style>
  body {
    display: flex;
    margin: 0;
    height: 100vh;
  }
  .sidebar {
    flex: 1;
    border-right: 1px solid #ccc;
    padding: 20px;
  }
  .content {
    flex: 3;
    padding: 20px;
  }
  .breadcrumb {
    display: flex;
    margin-bottom: 20px;
  }
  .form-container {
    display: flex;
    flex-direction: column;
  }
  .form-field {
    margin: 10px 0;
  }
  .form-row {
    display: flex;
    justify-content: space-between;
  }
  .form-row > div {
    flex-basis: 48%;
  }
  .form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
  }
  .sidebar, .breadcrumb, .form-container {
    display: flex;
    flex-direction: column;
  }
</style>
</head>
<body>

<aside class="sidebar">
  <div class="profile">
    <img src="images/user.jpg" alt="">
    <h3>Halboos</h3>
  </div>


  <ul class="menu">
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Products</a></li>
    <li><a href="#">Add new product</a></li>
    <li><a href="#">Update Product`</a></li>
    <li><a href="#">Delete Product</a></li>
    <li><a href="#">Reports</a></li>

</aside>

<section class="content">
  <nav class="breadcrumb">
    <a href="#">Dashboard</a>
  </nav>
  <div class="form-container">
    <!-- Form fields go here -->
    <div class="form-row">
      <div class="form-field">
        <!-- Input field -->
      </div>
      <div class="form-field">
        <!-- Input field -->
      </div>
    </div>
    <div class="form-footer">
      <!-- Submit button -->
    </div>
  </div>
</section>

</body>
</html>