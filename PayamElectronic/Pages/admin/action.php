
<?php
$error;
$success;
if(isset($_POST['cat'],$_POST['comment-cat'],$_POST['price-goods'],$_POST['name-goods'],$_POST['count-goods'])){
    $target_dir = "PayamElectronic/img/";
    $ext=@end(explode('.',$_FILES["file-pic"]["name"]));
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["file-pic"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }
      if ($uploadOk == 0) {
        $error= "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          $name=GenerateCode().time().'.'.$ext;
          $path=$target_dir.$name;
        if (move_uploaded_file($_FILES["file-pic"]["tmp_name"], $path)) {
          $target_file = $path;
          $resized_file = $path;
          $wmax = 400;
          $hmax = 400;
          ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);
            insert_goods($_POST['name-goods'],$_POST['comment-cat'],$_POST['cat'],$_POST['price-goods'],$_POST['count-goods'],$path);
            $success= " با موفقیت کالا وارد شد.";
        } else {
          $error= "Sorry, there was an error uploading your file.";
        }
      }
}






if(isset($_POST['up-name-goods'],$_POST['up-count-goods'],$_POST['up-pr-goods'],$_POST['up-des-goods'],$_POST['up-cat-goods'],$_POST['id'])){

  update_goods($_POST['id'],$_POST['up-name-goods'],$_POST['up-count-goods'],$_POST['up-pr-goods'],$_POST['up-des-goods'],$_POST['up-cat-goods']);
  $success="کالا اضافه شد.";
}


if(isset($_POST['cat_name'],$_POST['cat_comment'])){
  insert_cat($_POST['cat_name'],$_POST['cat_comment']);
}


if(isset($_POST['dep_cat_name'],$_POST['dep_cat_comment'],$_POST['id_dep'])){
  insert_subcat($_POST['id_dep'],$_POST['dep_cat_name'],$_POST['dep_cat_comment']);
}


?>
