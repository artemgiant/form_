<div class="register-main">
    <div class="col-md-6 account-left col-md-offset-3">
        <form enctype="multipart/form-data" autocomplete="on" method="post" action="comment/add" id="signup" role="form" data-toggle="validator">

            <div class="form-group has-feedback">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                       value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : ''; ?>"
                       required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="login">Фамилия</label>
                <input  type="text" name="surname" class="form-control" id="surname"
                        placeholder="Surname"
                        value="<?= isset($_SESSION['form_data']['surname']) ? h($_SESSION['form_data']['surname']) : ''; ?>"
                        required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>

            <div class="form-group has-feedback">
                <label for="password">Password</label>
                <input autocomplete="current-password" type="password" name="password" class="form-control" id="pasword"
                       placeholder="Password" data-error="Пароль должен включать не менее 6 символов" data-minlength="6"
                       value="<?= isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : ''; ?>"
                       required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group has-feedback">
                <label for="pasword">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                       data-error="Укажите корректный email"
                       value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''; ?>"
                       required pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$">
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group has-feedback">
                <label>Коментарий</label>
                <textarea name="comment" value="<?= isset($_SESSION['form_data']['comment']) ? h($_SESSION['form_data']['comment']) : ''; ?>" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
            </div>

            <div class="form-group ">
                <div class="">
                    <div class="box box-primary box-solid file-upload">
                        <div class="box-header">
                            <h3 class="box-title">Базовое изображение</h3>
                        </div>
                        <div class="box-body">
                            <div id="single" class="btn btn-success" data-url="comment/add-image" data-name="single">Выбрать файл</div>
                            <p><small>Рекомендуемые размеры: 75х132</small></p>
                            <div class="single">
                                <?=(!empty($_SESSION['form_data']['photo']))? '<img src="'.PATH.'/upload/images/'.$_SESSION["form_data"]["photo"].'" style="max-height: 75px;">' : ''?>
                            </div>
                        </div>
                        <div class="overlay upload_img" style="display: none">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-default">Добавить</button>
        </form>
        <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</div>