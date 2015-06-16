<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-16 20:37:59
         compiled from ".\templates\reg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:848755806d07cc8044-39547423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afd01ee6907bf829a6c8a640de1a6cb117c4cfff' => 
    array (
      0 => '.\\templates\\reg.tpl',
      1 => 1427315952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '848755806d07cc8044-39547423',
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
  'unifunc' => 'content_55806d07d45381_86183205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55806d07d45381_86183205')) {function content_55806d07d45381_86183205($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Реєстрація</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="jumbotron">
    <div class="container">
      <div class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 col-md-6 col-md-offset-3 text-center">
           <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

      </div>
        <form action="reg.php" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label for="login" class="col-md-2 col-md-offset-3">Логін</label>
            <div class="col-md-4">
                <input type="text" id="login" name="login" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-md-2 col-md-offset-3">Email</label>
            <div class="col-md-4">
                <input type="email" id="email" name="email" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="pass" class="col-md-2 col-md-offset-3">Пароль</label>
            <div class="col-md-4">
                <input type="password" id="pass" name="pass" class="form-control">
            </div>
          </div> 
          <div class="form-group">
            <label for="pass1" class="col-md-2 col-md-offset-3">Повторіть пароль</label>
            <div class="col-md-4">
                <input type="password" id="pass1" name="pass1"  class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4 col-md-offset-5">
              <button class="btn btn-success btn-block" type="submit" name="enter">Зареєструватись</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </body>
</html><?php }} ?>
