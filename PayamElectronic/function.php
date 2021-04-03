<?php



function GenerateCode($length = 10) {
    $alphabet = '123456789abcdefghijklmnopqrstuvwxyz';
    return SelectRandom($alphabet, $length);
}

function SelectRandom($str, $count = 1) {
    $n = strlen($str);
    
    $out = '';
    for($k = 0; $k < $count; $k++) {
        $i = rand(0, $n - 1);
        $out .= substr($str, $i, 1);
    }
    
    return $out;
}


function login($username,$password){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $stmt->bindParam(':email', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        foreach($stmt->fetchAll() as $v) {

            if($v['password']==$password && $v['email']==$username){
                return $v;
            }else{
                return "null";
            }
        }
    }else{
        return "null";
    }

}



function login_ck($id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        return true;
    }else{
        return false;
    }

}


// function privilage_chk($id){
//     global $conn;
//     $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
//     $row= $stmt->rowCount();
//     if($row>0){
//         foreach($stmt->fetchAll() as $v) {
//             if(){
//                 return $v;
//             }else{
//                 return "null";
//             }
//         }
//     }else{
//         return "null";
//     }
// }




function loadpages($page,$admin=0){
    require_once 'PayamElectronic/action.php';
    require_once 'PayamElectronic/Template/header.php';
    require_once 'PayamElectronic/Pages/'.$page.'.php';
    if($admin==1){
        require_once 'PayamElectronic/Template/footer-admin.php';
    }else{
        require_once 'PayamElectronic/Template/footer.php';
    }

}



function loadpages_admin($page){
    include 'PayamElectronic/Pages/admin/action.php';
    require_once 'PayamElectronic/Template/header.php';
    require_once 'PayamElectronic/Pages/admin/nav.php';
    require_once 'PayamElectronic/Pages/admin/'.$page.'.php';
    require_once 'PayamElectronic/Template/footer-admin.php';
}


function authentication_users(){
    if(isset($_SESSION['id-user'],$_SESSION['privilege'])){
        if($_SESSION['privilege']==0){
            return "normal";
        }elseif($_SESSION['privilege']==10){
            return "admin";
        }else {
            return "invalid";
        }
    }else{
        return "invalid";
    }
}

function info_authentication_users($op){
    if(authentication_users()!="invalid"){
        if($op=='name'){
            return info_user($_SESSION['id-user'])['name'];
        }
    }else{
        return "false";
    }
}










function logout(){
    unset($_SESSION['id-user']);
    unset($_SESSION['privilege']);
    header("Location: /login"); 
}


function sign_up($name,$family,$password,$email){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users (name, family, password,) VALUES ('John', 'Doe', 'john@example.com')");
    $stmt->bindParam(':email', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

function send_email(){
    $to_email = "receipient@gmail.com";
    $subject = "Simple Email Test via PHP";
    $body = "
    برای فعال سازی ایمیل روی لینک زیر کلیک کنید.
    https://payamelec.com/emailverify
    ";
    $headers = "From: sender\'s email";

    if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
    } else {
    echo "Email sending failed...";
    }
}

function forget_password($email){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        $code=time().GenerateCode();
        $stmt = $conn->prepare("UPDATE users SET code=:code,resetpass=1  WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return $code;
    }else{
        return "noemail";
    }

}

function code_chk($code){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code and resetpass=1");
    $stmt->bindParam(':code', $code);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        foreach($stmt->fetchAll() as $v) {
            return $v['email'];
        }
    }else{
        return "invalid";
    }

}



function reset_password($email,$code,$password){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code AND email=:email and resetpass=1");
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        $stmt = $conn->prepare("UPDATE users SET password=:password,code='000o',resetpass=0  WHERE email=:email");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return true;
    }else{
        return false;
    }
}

function register_users($name,$family,$email,$password,$code){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        return false;
    }else{

        $stmt = $conn->prepare("INSERT INTO users (name, family, email,password,enable,code) VALUES (:name,:family,:email,:password,0,:code)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':family', $family);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        return true;
    }


}





function insert_goods($name,$description,$cat,$price,$count,$img){
    global $conn;
        $stmt = $conn->prepare("INSERT INTO goods (name_goods, description_goods, cat_goods,price_goods,count_goods,img_goods) VALUES (:name_goods, :description_goods, :cat_goods,:price_goods,:count_goods,:img_goods)");
        $stmt->bindParam(':name_goods', $name);
        $stmt->bindParam(':description_goods', $description);
        $stmt->bindParam(':cat_goods', $cat);
        $stmt->bindParam(':price_goods', $price);
        $stmt->bindParam(':count_goods', $count);
        $stmt->bindParam(':img_goods', $img);
        $stmt->execute();
}



function verifycode_chk($code){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE code=:code and enable=0");
    $stmt->bindParam(':code', $code);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        foreach($stmt->fetchAll() as $v) {
            $stmt = $conn->prepare("UPDATE users SET enable=1,code='000o' WHERE email=:email");
            $stmt->bindParam(':email', $v['email']);
            $stmt->execute();
            return true;
        }
    }else{
        return false;
    }

}



// Function for resizing jpg, gif, or png image files
function ak_img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
      imagesavealpha($img, true);

    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    $background = imagecolorallocatealpha($tci, 255, 255, 255, 127);
    imagecolortransparent($tci, $background);
    imagealphablending($tci, false);
    imagesavealpha($tci, true);
    // imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagepng($tci, $newcopy);
}



function delete_goods($id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM goods WHERE id_goods=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        foreach($stmt->fetchAll() as $v) {
            unlink($v['img_goods']);
            $stmt = $conn->prepare("DELETE FROM goods WHERE id_goods=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        }
    }else{
        return false;
    }

}



function edit_goods($id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM goods WHERE id_goods=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        foreach($stmt->fetchAll() as $v) {
            return $v;
        }
    }else{
        return false;
    }

}




function update_goods($id,$name,$count,$price,$description,$cat){
    global $conn;
    $stmt = $conn->prepare("UPDATE goods SET name_goods=:name,description_goods=:description,cat_goods=:cat,price_goods=:price,count_goods=:count WHERE id_goods=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':cat', $cat);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':count', $count);
    $stmt->execute();

}



function insert_cat($name,$comment){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO cat (name_cat, comment_cat, master_cat,dep_cat) VALUES (:name_cat, :comment_cat, 0,0)");
    $stmt->bindParam(':name_cat', $name);
    $stmt->bindParam(':comment_cat', $comment);
    // $stmt->bindParam(':master_cat', 0);
    // $stmt->bindParam(':dep_cat', 0);
    $stmt->execute();
}


function insert_subcat($id,$name,$comment){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO cat (name_cat, comment_cat, master_cat,dep_cat) VALUES (:name_cat, :comment_cat, 1,:id)");
    $stmt->bindParam(':name_cat', $name);
    $stmt->bindParam(':comment_cat', $comment);
    $stmt->bindParam(':id', $id);
    // $stmt->bindParam(':master_cat', 0);
    // $stmt->bindParam(':dep_cat', 0);
    $stmt->execute();
}


function info_user($id){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        foreach($stmt->fetchAll() as $v) {
            return $v;
        }
    }else{
        return false;
    }
}


function delete_cat($id){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cat WHERE id_cat=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}


function chk_session_basket_repet($id){
    foreach($_SESSION['goods'] as $key=>$animal)
    {   
        foreach ($animal as $attribute => $value)
        {
            if($attribute==$id){
                return true;
            }
        }
    }
    return false;
}

function add_basket($id,$c){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM goods WHERE id_goods=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row= $stmt->rowCount();
    if($row>0){
        
        foreach($stmt->fetchAll() as $v) {
            if(!chk_session_basket_repet($v['id_goods'])){
                array_push($_SESSION["goods"],array($v['id_goods']=>$c));
            }

        }
    }else{
        return false;
    }
    

}



function remove_basket($id){
    $delete=false;
    foreach($_SESSION['goods'] as $key=>$animal)
    {   
        foreach ($animal as $attribute => $value)
        {
            if($attribute==$id){
                $delete=true;
            }
        }
        if($delete==true){
            unset($_SESSION['goods'][$key]);
            return true;
        }
    }
    return false;

}

    

