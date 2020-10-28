<h4>Gallery</h4>
<form action="index.php?page=3" method="post">
    <label for="ext">Select ext:
    <select name="ext" id="ext">
        <option value="" selected disabled hidden>Choose ext</option>
        <?php
        $path='images/';
        if($dir=opendir($path)){
            $ar=[];
            while ($file=readdir($dir)){
              $ext=strtolower(pathinfo($file,PATHINFO_EXTENSION));//получаем расшерение файлов
            if(!in_array($ext,$ar)and $ext!==''){
                $ar[]=$ext;//добавление в конец массива
                echo "<option>$ext</option>";
            }
            }
            closedir($dir);
        }

        ?>
    </select>
    </label>
    <button type="submit" name="submit" class="btn btn-primary">Show Images</button>
</form>



<?php
if (isset($_POST['submit'])){
    $ext=$_POST['ext'];//имя селекта
    $ar=glob("$path*.$ext");
    foreach ($ar as $a){
        //echo "<img src=$a width='150px' height='150px'>";
        echo "<a class=example-image-link href=$a data-lightbox=example-1><img class='example-image img-fluid px-3' style='max-width: 200px' src=$a alt='image-1' /></a>";


        
    }
}
