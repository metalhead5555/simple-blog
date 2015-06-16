<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-23 19:00:29
         compiled from ".\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21515551054bde62168-84195853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56f317135db00c66641ecaa7620e915877f21686' => 
    array (
      0 => '.\\templates\\login.tpl',
      1 => 1426703493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21515551054bde62168-84195853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551054bdf19b16_06224410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551054bdf19b16_06224410')) {function content_551054bdf19b16_06224410($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

  <title>Вход в админ часть</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form action="login.php" method="POST" class="form-signin" role="form">
            <h2 class="text-center">Вход в админ часть</h2>
            <input type="text" class="form-control" placeholder="Login" required autofocus name="login">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <input type="hidden" name="secret" value="?">
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button> 
            <div class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 text-center">
              <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </body>
</html><?php }} ?>
