
<ul class="nav nav-pills justify-content-between ">
    <li class="nav-item"><a href="index.php?page=1" class="nav-link active">Home</a></li>
    <?php
    if ($_SESSION['registered_user']==='admin'){


    ?>
    <li class="nav-item"><a href="index.php?page=2" class="nav-link">Upload</a></li>
    <?php }?>
    <li class="nav-item"><a href="index.php?page=3" class="nav-link">Gallery</a></li>
    <li class="nav-item"><a href="index.php?page=4" class="nav-link">Registration</a></li>
    <li class="nav-item"><a href="index.php?page=5" class="nav-link">Login</a></li>
    <?php
    if($_SESSION['registered_user']){
echo "<div style='border: 2px solid blue; border-radius: 25px;width: 100px;height: 100px;'>";

    echo "<h4 class='text-success text-center mt-2'> {$_SESSION['registered_user']}</h4>";


    echo "<form action='index.php?page=1' method='post' class='text-center''>
<input type='submit'name='logout' class='btn btn-sm btn-dark' value='LOG OUT'>
</form>";
    if (isset($_POST['logout'])){
        session_destroy();
        echo '<script>window.location="index.php?page=1"</script>';
    }
    echo "</div>";}
    ?>



</ul>