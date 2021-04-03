<?php
$error;
$success;

if(isset($_POST['email'])&&isset($_POST['password'])&&isset( $_POST['code'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $captcha=$_POST['code'];
    if($_SESSION['captcha']==$captcha){
        $status=login($email,$password);
        if($status=="null"){
            $error="ایمیل یا رمزعبور شما نادرست میباشد.";
        }else{

            $_SESSION["id-user"]=$status['id'];
            $_SESSION["privilege"]=$status['privilege'];
            header("Location: /login");
        }
    }else{
        $error="کد امنیتی معتبر نیست.";
    }

}




if(isset($_POST['forget-email'],$_POST['code'])){
    $captcha=$_POST['code'];
    $email=$_POST['forget-email'];

    if($_SESSION['captcha']==$captcha){

         $re=forget_password($email);
         if($re=="noemail"){
            $error="ایمیل شما ثبت نشده است.";
         }else{
            
            $subject = "بازنشانی رمز عبور";
            $txt ="برای بازنشانی رمز عبور روی لینک زیر کلیک کنید. \n".URL."resetpassword/$re";
            $headers = "From: payamele@payamelec.com" . "\r\n" ."CC: $email";
             if (mail($email,$subject,$txt,$headers)) {
                $success="بازنشانی رمز عبور به ایمیل شما ارسال شد.";
             } else {
                $error= "خطایی رخ داده است لطفا دوباره سعی کنید.";
            }
         }
        

    }else{
        $error="کد امنیتی معتبر نیست.";
    }
}




if(isset($_POST['email-reset'],$_POST['email-reset'],$_POST['password-reset'],$_POST['repassword-reset'])){
    $captcha=$_POST['code'];
    if($_SESSION['captcha']==$captcha){
        if($_POST['password-reset']==$_POST['repassword-reset']){
            if(reset_password($_POST['email-reset'],$_POST['id'],$_POST['password-reset'])){
                $success='رمز شما با موفقیت تغییر کرد.';
            }
        }else{
            $error="رمز عبور باهم تطابق ندارد.";
        }
    }else{
        $error="کد امنیتی معتبر نیست.";
    }
}





if(isset($_POST['name-r'],$_POST['family-r'],$_POST['email-r'],$_POST['pass-r'],$_POST['repass-r'],$_POST['code'],$_POST['low'])){
    $captcha=$_POST['code'];
    if($_SESSION['captcha']==$captcha){
        if($_POST['pass-r']==$_POST['repass-r']){
            $code=time().GenerateCode();//gen code
            if(register_users($_POST['name-r'],$_POST['family-r'],$_POST['email-r'],$_POST['repass-r'],$code)){
                $subject = "فعال سازی ایمیل";
                $txt ="برای فعالسازی ایمیل روی لینک زیر کلیک کنید. \n".URL."emailverify/$code";
                $headers = "From: payamele@payamelec.com" . "\r\n" ."CC: ".$_POST['email-r'];
                 if (mail($_POST['email-r'],$subject,$txt,$headers)) {
                $success='باموفقیت ثبت نام شما انجام شد.\n ایمیل فعال سازی برای شما ارسال شد.';
                 }else{
                    $error="خطایی رخ داده است.";
                 }
            }else{
                $error="ایمیل قبلا ثبت نام شده است.";
            }
        }else{
            $error="رمز عبور باهم تطابق ندارد.";
        }
    }else{
        $error="کد امنیتی معتبر نیست.";
    }
}