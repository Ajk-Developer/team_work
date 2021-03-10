
<html>
<head>
<title>Login Page</title>
</head>
<body>
    <div class= "col-lg-8">
    <h1>Log In</h1>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION['success'] ?>
   <?php } ?>
Hello. <?php echo $_SESSION['firstname']; ?>   
    </div>
</body>
</html>
