<h4>Home</h4>
<?php
if($_SESSION['registered_user']){


echo "<h3>Hello, {$_SESSION['registered_user']}</h3>";
echo "<form action='index.php?page=1' method='post'>
<input type='submit'name='logout' class='btn btn-dark' value='LOG OUT'>
</form>";
if (isset($_POST['logout'])){
    session_destroy();
    echo '<script>window.location="index.php?page=1"</script>';
}
}

else{
   echo "<h2>Need Log In</h2>";
}