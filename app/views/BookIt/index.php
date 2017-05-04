<?php if(isset($_SESSION['msg_suc'])): ?>
    <div class="alert alert-success" style="margin: 15px 0 0 0">
        <!-- Кнопка для закрытия сообщения, созданная с помощью элемента a -->
        <a href="#" class="close" data-dismiss="alert">×</a>
        <?=$_SESSION['msg_suc']; unset($_SESSION['msg_suc']);?>
    </div>
<?php endif;?>

<div class="container">
    <hr/>

    <div class="row">

        <div class="col-md-9">
            <iframe src="https://calendar.google.com/calendar/embed?src=rgmjsj7ts4i77v6pup17ps2fho%40group.calendar.google.com&ctz=Europe/Moscow"
                    style="border: 0" width="100%" height="800" frameborder="0" scrolling="no"></iframe>
        </div>

        <div class="col-md-3">
            <form method="post" action="/book-it">
                <div class="form-group">
                    <label for="inputDate">Выберите день недели:</label>
                    <input type="date" class="form-control" id="inputDate" name="inputDate" required autofocus>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="inputStartTime">с:</label>
                            <input type="time" class="form-control" id="inputStartTime" name="inputStartTime" required></div>
                        <div class="col-sm-6">
                            <label for="inputEndTime">до:</label>
                            <input type="time" class="form-control" id="inputEndTime" name="inputEndTime" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputClientName">Как вас зовут:</label>
                    <input type="text" class="form-control" id="inputClientName" name="inputClientName"
                           placeholder="Введите имя..." required>
                </div>
                <div class="form-group">
                    <label for="inputClientPhoneNumber">Мобильный телефон:</label>
                    <input type="text" class="form-control" id="inputClientPhoneNumber" name="inputClientPhoneNumber"
                           placeholder="Введите контакнтый номер телефона..." required>
                </div>
                <div class="form-group">
                    <label class="control-label">Количество человек:</label>

                    <select class="form-control" name="inputAmountPeople">
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<option value='$i'>$i</option>>";
                        }
                        ?>
                    </select>

                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Забронировать" name="addEventSubmit">
                </div>
            </form>
        </div>

    </div>
    <hr/>
</div>


