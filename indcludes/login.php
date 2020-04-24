<div class="container login-container">
    <div class="row justify-content-center">
        <?php
        if(isSet($_SESSION['alertSuccess'])){echo '<div class="col-md-6 align-self-center alert alert-success text-center" style="margin-top: -5px" role="alert">'.$_SESSION['alertSuccess'].'</div>'; unset($_SESSION['alertSuccess']);}
        if(isSet($_SESSION['loginError'])){echo '<div class="col-md-6 align-self-center alert alert-danger text-center" style="margin-top: -5px" role="alert">'.$_SESSION['loginError'].'</div>'; unset($_SESSION['loginError']);}
        ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 align-self-center login-form-1">

            <h3>LOGOWANIE</h3>

            <form action="source.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="adres email lub login *" value="" name="login"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="hasło *" value="" name="password"/>
                </div>

                <div class="form-group">
                    <input type="hidden" name="action" value="login">
                    <input type="submit" class="btnSubmit" value="Zaloguj" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Zresetuj hasło</a><br />
                    <a href="#" class="ForgetPwd">Utwóż konto</a>
                </div>

            </form>
        </div>
    </div>
</div>