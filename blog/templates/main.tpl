<!DOCTYPE html>
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
          {if !$authorized}
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
          {else}
           <!-- Greeting form -->
            <li><a href="">Hello, <b>{$userlogin}</b></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span></a></li>
          {/if}
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
        <div class="{$class} col-md-6 col-md-offset-3 text-center" id="info">
            {$content}
        </div>
        <!-- Massege form-->
        <form action="index.php" method="POST" class="form-horizontal">
            {if !$guestAuth and !$authorized  }
            <div class="form-group">
              <label for="name" class="col-md-2 col-md-offset-3">Ваше ім'я</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="name" name="name"  required >
              </div>
            </div>
            {/if}
            <div class="form-group">
              <label for="header" class="col-md-2 col-md-offset-3">Заголовок</label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="header" name="header" {if $upd } value="{$curpost.header}"{/if}  required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <textarea name="content" id="content"  rows="10" class="form-control" autofocus>{if $upd }{$curpost.content}{/if}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-default btn-block" type="submit" name="addpost">{if $upd } Зберегти{else}Опублікувати {/if}</button>
              </div>
            </div>
            {if $upd }<input type="hidden" name="curid" value="{$curid}">{/if}
        </form>
        <!-- Massege form-->
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          {section loop=$posts name = i}
            <article class="panel panel-primary">
              <header class="panel-heading">
                <div class="text-right" id="contorols">
                  {if $userid == $posts[i].authorid || 2}
                    <a href="index.php?op=upd&id={$posts[i].postid}" style="color:white"><span class="glyphicon glyphicon-pencil "></span></a>
                    <a href="index.php?op=del&id={$posts[i].postid}" style="color:white"><span class="glyphicon glyphicon-trash "></span></a>
                  {/if}
                  <a href="#" style="color:white" class="hide-post"><span class="glyphicon glyphicon-eye-close"></span></a>
                </div>
                <h2 class="text-center">{$posts[i].header}</h2>
                <blockquote class="blockquote">
                  <b>Author:{$posts[i].login}</b>
                  <p>{$posts[i].pub_date}</p>
                </blockquote>
              </header>
              <blockquote class="bg-info" style="margin-bottom:0">
                {$posts[i].content}
              </blockquote>
            </article>
          {/section}
        </div>
      </div>
<!--     {if $page!=""}
      {include file = "$page.tpl"}
    {/if} -->
  <ul class="pager">
    <li class="previous {$prev}"><a href="index.php?pg={$pg-1}"><span class="glyphicon glyphicon-chevron-left"></span></a></li>

    <li class="next {$next} "><a href="{if !$next }index.php?pg={$pg+1}{/if}"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
  </ul>
  </div>

  <footer>
    
  </footer>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="js/main.js"></script>
</body>
</html>