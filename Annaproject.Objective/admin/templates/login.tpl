
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form action="index.php?view=login" method="POST" class="form-signin" role="form">
            <h2 class="text-center">Вход в админ часть</h2>
            <input type="text" class="form-control" placeholder="Login" required autofocus name="login">
            <input type="password" class="form-control" placeholder="Password" name="pass">
            <input type="hidden" name="secret" value="?">
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button> 
            <div class="{$class} text-center">
                {$msg}
            </div>
        </form>
    </div>
</div>
