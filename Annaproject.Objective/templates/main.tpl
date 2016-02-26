<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{$keywords}">
  <meta name="keywords" content="{$descr}">
  <meta name="author" content="Petrenko Yaroslav">
	<title>{$pagetitle}</title>
  <link rel="icon" type="image/png" sizes="32x32" href="img/main/favicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/main/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/universal.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header class="navbar-default "><!-- or navbar-fixed-top -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
	       <a class="navbar-brand" href="index.php">ANNA<strong>VYALOVA</strong></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        {section loop=$catname name=i}
          <!-- <li{if $catname[i].id==$cat} class="active" {/if}> --><li><a href="index.php?view=viewcat&pg=1&idcat={$catname[i].id}">{$catname[i].name}</a></li>
        {/section}
          <!-- <li{if $page=="about"} class="active"{/if}> --><li><a href="index.php?view=about">ABOUT</a></li>
          <!-- <li{if $page=="contact"} class="active"{/if}>--><li ><a href="index.php?view=contact">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </header>
  <div class="jumbotron main">
    <div class="container">
    {if $view!=""}
      {include file = "$view.tpl"}
    {/if}
  </div>
  <footer>
    
  </footer>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>