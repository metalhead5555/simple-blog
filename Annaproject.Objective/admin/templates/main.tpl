<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminPart</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/awesome-bootstrap-checkbox.css">
  <link rel="stylesheet" href="../css/universal.css">
  <link rel="stylesheet" href="../css/adm.css">
<!--   // <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script> -->
  <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<header class="navbar navbar-default " role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
	       <a class="navbar-brand " href="#">AdminTools</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li ><a href="index.php?view=page_list">Редактор страниц</a></li>
          <li><a href="index.php?view=albums">Редактор альбомов</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a class="glyphicon glyphicon-user" href="index.php?view=setup"></a></li>
          <li><a class="glyphicon glyphicon-off" href="index.php?view=logout"></a></li>
        </ul>
      </div>

    </div>
  </header>
  <div class="jumbotron">
    <div class="container main">
    {if $view!="" && $view!='index'}
      {include file = "$view.tpl"}
    {/if}
    </div>
  </div>
  <footer>
  </footer>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
  <script src="../js/file-style.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="../js/adm.js"></script>
</body>
</html>