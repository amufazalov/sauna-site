<div class="container">

    <?php if(isset($_SESSION['msg'])): ?>
        <div class="alert alert-danger" style="margin: 15px 0 0 0">
            <!-- Кнопка для закрытия сообщения, созданная с помощью элемента a -->
            <a href="#" class="close" data-dismiss="alert">×</a>
            <?=$_SESSION['msg']; unset($_SESSION['msg']);?>
        </div>
    <?php endif;?>

    <form class="form-signin" method="post" action="/admin/login">
        <h2 class="form-signin-heading text-center">Вход в панель администратора</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label  for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Войти">
    </form>

</div> <!-- /container -->