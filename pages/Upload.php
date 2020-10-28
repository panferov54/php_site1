<h4>Upload</h4>
<?php
if($_SESSION['registered_user']==='admin'){


if (!isset($_POST['uppbtn'])){

?>
<form action="index.php?page=2" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="myfile">Choose picture:
            <input  type="file" id="myfile" class="form-control-file" name="myfile[]" multiple accept="image/*">
        </label>
    </div>
    <button type="submit" class="btn btn-danger" name="uppbtn">Send</button>

</form>

<?php }
    foreach($_FILES['myfile'] as $key => $value) {
        foreach($value as $k => $v) {
            $_FILES['myfile'][$k][$key] = $v;
        }
        // Удалим старые ключи
        unset($_FILES['myfile'][$key]);
    }

// Загружаем все картинки по порядку
    foreach ($_FILES['myfile'] as $k => $v) {
        // Загружаем по одному файлу
        $fileTmpName = $_FILES['myfile'][$k]['tmp_name'];
        $errorCode = $_FILES['myfile'][$k]['error'];
        if (is_uploaded_file($_FILES['myfile'][$k]['tmp_name'])){
        move_uploaded_file($_FILES['myfile'][$k]['tmp_name'],"images/".$_FILES['myfile'][$k]['name']);
            echo "<h3 class='text-success'>Image Download</h3>";
    }


    }


//    if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
//        move_uploaded_file($_FILES['myfile']['tmp_name'],"images/".$_FILES['myfile']['name']);
//        echo "<h3 class='text-success'>Image Download</h3>";
//    }
}else {
    echo "<h1 class='text-danger'>Only admin</h1>";
    if($_FILES['myfile']['error']!=0){
        echo '<h3 class="text-danger">'.$_FILES['myfile']['error'].'</h3>';
        exit;//прерывает дальнеёшее выполнение кода
    }}
