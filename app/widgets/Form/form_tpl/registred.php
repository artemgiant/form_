
<div class="register-main">
    <div class="col-md-6 account-left col-md-offset-3">
        <form  autocomplete="on" method="post" action="comment/add" role="form" data-toggle="validator">



            <div class="form-group has-feedback">
                <label  >Ваш коментарий <?=$_SESSION['user']['name']?></label>
                <textarea name="comment" value="<?= isset($_SESSION['form_data']['comment']) ? h($_SESSION['form_data']['comment']) : ''; ?>" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
            </div>
            <input name="registred" type="hidden" value="user <?=$_SESSION['user']['id'] ?>">

            <button type="submit" class="btn btn-default">Добавить</button>
        </form>
        <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</div>
