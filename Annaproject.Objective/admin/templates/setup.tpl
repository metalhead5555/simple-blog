<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form action="index.php?view=setup" method="POST" class="form-signin" role="form">
      <h2 class="text-center">Изменение личных данных</h2>
        <input type="text" class="form-control" placeholder="Введите новый логин" required autofocus name="login">
        <div class="row">
          <div class="col-md-6 ">
            <input type="password" class="form-control" placeholder="Введите новый пароль" required name="pass">
          </div>
          <div class="col-md-6">
            <input type="password" class="form-control" placeholder="Повторите пароль" required name="pass2">
          </div>
        </div>
        <br>
      <button class="btn btn-md btn-primary btn-block" type="submit" name="enter">Изменить</button>
    </form>
    <div class="{$class}" id="msgArea">
      {$msg}
    </div>
  </div>
</div>