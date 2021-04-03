<?php

// Use this namespace
use PayamElectronic\Route;

// Include router class
include 'PayamElectronic/Route.php';

// Define a global basepath
define('BASEPATH','/');

// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// define('BASEPATH','/api/v1');

function navi() {
  echo '
  Navigation:
  <ul>
      <li><a href="'.BASEPATH.'">home</a></li>
      <li><a href="'.BASEPATH.'index.php">index.php</a></li>
      <li><a href="'.BASEPATH.'user/3/edit">edit user 3</a></li>
      <li><a href="'.BASEPATH.'foo/5/bar">foo 5 bar</a></li>
      <li><a href="'.BASEPATH.'foo/bar/foo/bar">long route example</a></li>
      <li><a href="'.BASEPATH.'contact-form">contact form</a></li>
      <li><a href="'.BASEPATH.'get-post-sample">get+post example</a></li>
      <li><a href="'.BASEPATH.'test.html">test.html</a></li>
      <li><a href="'.BASEPATH.'phpinfo">PHP Info</a></li>
      <li><a href="'.BASEPATH.'aTrailingSlashDoesNotMatter">aTrailingSlashDoesNotMatter</a></li>
      <li><a href="'.BASEPATH.'aTrailingSlashDoesNotMatter/">aTrailingSlashDoesNotMatter/</a></li>
      <li><a href="'.BASEPATH.'theCaseDoesNotMatter">theCaseDoesNotMatter</a></li>
      <li><a href="'.BASEPATH.'thecasedoesnotmatter">thecasedoesnotmatter</a></li>
      <li><a href="'.BASEPATH.'this-route-is-not-defined">404 Test</a></li>
      <li><a href="'.BASEPATH.'this-route-is-defined">405 Test</a></li>
  </ul>
  ';
}


include 'PayamElectronic/config.php';
include 'PayamElectronic/function.php';


// Add base route (startpage)
Route::add('/', function() {

  loadpages('index');
  
});

// Another base route example
Route::add('/index.php', function() {
});




// Login
Route::add('/login', function() {
  if(authentication_users()=="admin"){
    header("Location: /admin/insert");
  }elseif(authentication_users()=="normal"){
    header("Location: /profile");
  }else {
    loadpages('login',1);
  }

},['get','post']);  

// Logout
Route::add('/logout', function() {
  logout();
  header("Location: /login");

},['get','post']);  


// register
Route::add('/register', function() {
  if(authentication_users()=="admin"){
    header("Location: /admin/insert");
  }elseif(authentication_users()=="normal"){
    header("Location: /profile");
  }else {
    loadpages("register",1);
  }

},['get','post']);  



// captcha
Route::add('/captcha', function() {
  require_once 'PayamElectronic/Pages/captcha.php';
},['get','post']);  



// emailverify
Route::add('/emailverify/(.*)', function($id) {
  define('ID',$id);
  loadpages('emailverify',1);
  //echo 'Edit user with id '.$id.'<br>';
},['post','get']);

// emailverify
Route::add('/resetpassword/(.*)', function($id) {
  define('ID',$id);
  loadpages('resetpassword',1);
},['post','get']);

// forget
Route::add('/forget', function() {
  loadpages('forget',1);
  //echo 'Edit user with id '.$id.'<br>';
},['post','get']);


// emailverify
Route::add('/access',function() {
  loadpages('access',1);
});





// Simple test route that simulates static html file
// TODO: Fix this for some web servers
// Route::add('/test.html', function() {
//   navi();
//   echo 'Hello from test.html';
// });

// This route is for debugging only
// It simply prints out some php infos
// Do not use this route on production systems!



//insert
Route::add('/admin/insert', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('insert-goods');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
  
},['post','get']);




//insert
Route::add('/admin/cat/insert', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('cat_insert');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
  
},['post','get']);





Route::add('/admin/goods', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('goods');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
  
},['post','get']);

Route::add('/admin/goods/delete/(.*)', function($id) {
  define('ID',$id);
  if(authentication_users()=="admin"){
    loadpages_admin('goods_delete');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
},['post','get']);




Route::add('/admin/goods/edit/(.*)', function($id) {
  define('ID',$id);
  if(authentication_users()=="admin"){
    loadpages_admin('goods_edit');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
},['post','get']);





Route::add('/admin/cat', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('cat');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
},['post','get']);



Route::add('/admin/cat-dep/(.*)', function($id) {
  define('ID',$id);
  if(authentication_users()=="admin"){
    loadpages_admin('cat_dep');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
},['post','get']);

Route::add('/admin/cat-delete/(.*)', function($id) {
  if(authentication_users()=="admin"){
    delete_cat($id);
    header("Location: /admin/cat");
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
},['post','get']);


Route::add('/profile', function() {
  if(authentication_users()=="admin"){
    header("Location: /access");
  }elseif(authentication_users()=="normal"){
    loadpages('profile');
  }else {
    header("Location: /login");
  }
  
});



Route::add('/admin/profile', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('profile');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
  
});



Route::add('/upload', function() {

  loadpages('upload',1);
  
});

Route::add('/admin/uploadfile', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('uploadfile');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
  
});

Route::add('/admin/p_uploadfile', function() {
  if(authentication_users()=="admin"){
    loadpages_admin('p_uploadfile');
  }elseif(authentication_users()=="normal"){
    header("Location: /access");
  }else {
    header("Location: /login");
  }
  
},['post','get']);



Route::add('/basket/(.*)/(.*)', function($state,$id) {
if($state=="add"){
  add_basket($id,1);
}else if($state=="delete"){
  remove_basket($id);
}
 header("Location: /");
},['post','get']);








// Route::add('/phpinfo', function() {
//   navi();
//   phpinfo();
// });




// Post route example
Route::add('/contact-form', function() {
  navi();
  echo '<form method="post"><input type="text" name="test"><input type="submit" value="send"></form>';
}, 'get');

// Post route example
Route::add('/contact-form', function() {
  navi();
  echo 'Hey! The form has been sent:<br>';
  print_r($_POST);
}, 'post');

// Get and Post route example
Route::add('/get-post-sample', function() {
  navi();
	echo 'You can GET this page and also POST this form back to it';
	echo '<form method="post"><input type="text" name="input"><input type="submit" value="send"></form>';
	if (isset($_POST['input'])) {
		echo 'I also received a POST with this data:<br>';
		print_r($_POST);
	}
}, ['get','post']);

// Route with regexp parameter
// Be aware that (.*) will match / (slash) too. For example: /user/foo/bar/edit
// Also users could inject SQL statements or other untrusted data if you use (.*)
// You should better use a saver expression like /user/([0-9]*)/edit or /user/([A-Za-z]*)/edit
Route::add('/user/(.*)/edit', function($id) {
  navi();
  echo 'Edit user with id '.$id.'<br>';
});

// Accept only numbers as parameter. Other characters will result in a 404 error
Route::add('/foo/([0-9]*)/bar', function($var1) {
  navi();
  echo $var1.' is a great number!';
});

// Crazy route with parameters
Route::add('/(.*)/(.*)/(.*)/(.*)', function($var1,$var2,$var3,$var4) {
  navi();
  echo 'This is the first match: '.$var1.' / '.$var2.' / '.$var3.' / '.$var4.'<br>';
});

// Long route example
// By default this route gets never triggered because the route before matches too
Route::add('/foo/bar/foo/bar', function() {
  echo 'This is the second match (This route should only work in multi match mode) <br>';
});

// Trailing slash example
Route::add('/aTrailingSlashDoesNotMatter', function() {
  navi();
  echo 'a trailing slash does not matter<br>';
});

// Case example
Route::add('/theCaseDoesNotMatter',function() {
  navi();
  echo 'the case does not matter<br>';
});

// 405 test
Route::add('/this-route-is-defined', function() {
  navi();
  echo 'You need to patch this route to see this content';
}, 'patch');

// Add a 404 not found route
Route::pathNotFound(function($path) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 404 Not Found');
  loadpages('404',1);
});

// Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 405 Method Not Allowed');
  echo 'Error 405 :-(<br>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);