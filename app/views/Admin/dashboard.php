<?php if(isset($_SESSION['msg'])): ?>
    <div class="alert alert-danger" style="margin: 15px 0 0 0">
        <!-- Кнопка для закрытия сообщения, созданная с помощью элемента a -->
        <a href="#" class="close" data-dismiss="alert">×</a>
        <?=$_SESSION['msg']; unset($_SESSION['msg']);?>
    </div>
<?php endif;?>

<a href="/book-it/oauth-callback" class="btn btn-success btn-lg">Обновить маркер</a>
