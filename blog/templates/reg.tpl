<!DOCTYPE html>
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
      <div class="{$class} col-md-6 col-md-offset-3 text-center">
           {$content}
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
</html>