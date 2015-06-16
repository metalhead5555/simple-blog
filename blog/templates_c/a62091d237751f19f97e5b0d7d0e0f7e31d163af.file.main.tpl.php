<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-16 20:48:05
         compiled from ".\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1050355806cd2bb33d2-12972601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a62091d237751f19f97e5b0d7d0e0f7e31d163af' => 
    array (
      0 => '.\\templates\\main.tpl',
      1 => 1434480370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1050355806cd2bb33d2-12972601',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55806cd30efdb9_44787022',
  'variables' => 
  array (
    'authorized' => 0,
    'userlogin' => 0,
    'class' => 0,
    'content' => 0,
    'guestAuth' => 0,
    'upd' => 0,
    'curpost' => 0,
    'curid' => 0,
    'posts' => 0,
    'userid' => 0,
    'page' => 0,
    'prev' => 0,
    'pg' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55806cd30efdb9_44787022')) {function content_55806cd30efdb9_44787022($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Petrenko Yaroslav">
	<title>SimpleBlog</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header class="navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
	       <a class="navbar-brand" href="index.php">
          Simple<b>Blog</b>Example
         </a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <!-- Search form -->
          <form action="index.php" method="POST" class="form-inline" style="margin-top:7px">
            <div class="btn-group">
                <input type="search" class="form-control"  placeholder="Search here" name="searchRequest">
              </div>
          </form>
           <!-- Search form -->
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right:0">
          <?php if (!$_smarty_tpl->tpl_vars['authorized']->value) {?>
           <!-- Auth form -->
          <form action="login.php" method="POST" class="form-inline" style="margin-top:7px">
            <div class="form-group">
              <label class="sr-only" for="login">Email</label>
              <input type="email" class="form-control" id="login" placeholder="Enter email or login" name="email">
            </div>
            <div class="form-group">
              <label class="sr-only" for="pass">Пароль</label>
              <input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
            </div>
            <button type="submit" class="btn block-btn btn-success " name="enter">Вхід</button>
            <a href="reg.php" class="btn block-btn btn-success">Реєстрація</a>
          </form>
           <!-- Auth form -->
          <?php } else { ?>
           <!-- Greeting form -->
            <li><a href="">Hello, <b><?php echo $_smarty_tpl->tpl_vars['userlogin']->value;?>
</b></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span></a></li>
          <?php }?>
        </ul>
      </div>
    </div>
  </header>
  <div class="container main">
    <div class="jumbotron pad">
      <div class="row">
         <!-- Collapse button-->
        <div class="btn btn-default btn-clps  col-md-offset-11 col-md-1 col-xs-12" data-toggle="collapse" data-target="#postform" id="btn-clps" style="margin-bottom:10px">
          <span class="glyphicon glyphicon-plus"></span>
        </div>
        <!-- Collapse button-->
      </div>
      <div id="postform" class="collapse on">
        <div class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 col-md-6 col-md-offset-3 text-center" id="info">
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div>
        <!-- Massege form-->
        <form action="index.php" method="POST" class="form-horizontal">
            <?php if (!$_smarty_tpl->tpl_vars['guestAuth']->value&&!$_smarty_tpl->tpl_vars['authorized']->value) {?>
            <div class="form-group">
              <label for="name" class="col-md-2 col-md-offset-3">Ваше ім'я</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="name" name="name"  required >
              </div>
            </div>
            <?php }?>
            <div class="form-group">
              <label for="header" class="col-md-2 col-md-offset-3">Заголовок</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="header" name="header" <?php if ($_smarty_tpl->tpl_vars['upd']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['curpost']->value['header'];?>
"<?php }?>  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <textarea name="content" id="content"  rows="10" class="form-control" autofocus><?php if ($_smarty_tpl->tpl_vars['upd']->value) {
echo $_smarty_tpl->tpl_vars['curpost']->value['content'];
}?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-default btn-block" type="submit" name="addpost"><?php if ($_smarty_tpl->tpl_vars['upd']->value) {?> Зберегти<?php } else { ?>Опублікувати <?php }?></button>
              </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['upd']->value) {?><input type="hidden" name="curid" value="<?php echo $_smarty_tpl->tpl_vars['curid']->value;?>
"><?php }?>
        </form>
        <!-- Massege form-->
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['posts']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
            <article class="panel panel-primary">
              <header class="panel-heading">
                <div class="text-right" id="contorols">
                  <?php if ($_smarty_tpl->tpl_vars['userid']->value==$_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['authorid']||2) {?>
                    <a href="index.php?op=upd&id=<?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['postid'];?>
" style="color:white"><span class="glyphicon glyphicon-pencil "></span></a>
                    <a href="index.php?op=del&id=<?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['postid'];?>
" style="color:white"><span class="glyphicon glyphicon-trash "></span></a>
                  <?php }?>
                  <a href="#" style="color:white" class="hide-post"><span class="glyphicon glyphicon-eye-close"></span></a>
                </div>
                <h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['header'];?>
</h2>
                <blockquote class="blockquote">
                  <b>Author:<?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['login'];?>
</b>
                  <p><?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['pub_date'];?>
</p>
                </blockquote>
              </header>
              <blockquote class="bg-info" style="margin-bottom:0">
                <?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'];?>

              </blockquote>
            </article>
          <?php endfor; endif; ?>
        </div>
      </div>
<!--     <?php if ($_smarty_tpl->tpl_vars['page']->value!='') {?>
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['page']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?> -->
  <ul class="pager">
    <li class="previous <?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
"><a href="index.php?pg=<?php echo $_smarty_tpl->tpl_vars['pg']->value-1;?>
"><span class="glyphicon glyphicon-chevron-left"></span></a></li>

    <li class="next <?php echo $_smarty_tpl->tpl_vars['next']->value;?>
 "><a href="<?php if (!$_smarty_tpl->tpl_vars['next']->value) {?>index.php?pg=<?php echo $_smarty_tpl->tpl_vars['pg']->value+1;
}?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
  </ul>
  </div>

  <footer>
    
  </footer>
	<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
