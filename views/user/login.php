<?php require_once 'views/layout/head.php' ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="stylesheet" href="<?=base_url?>views/assets/css/pages/auth.css">
<title>Login Correspondencia</title>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="<?=base_url?>"><img src="<?=base_url?>/views/assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Iniciar Sesión</h1>
                    <p class="auth-subtitle mb-5">Inicie sesión con sus datos que ingresó durante el registro.</p>

                    <form action="<?=base_url?>/User/CheckLogin" id="fromLogin" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="usuario" placeholder="Usuario">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" id="clave" name="clave" placeholder="Clave">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="g-recaptcha" data-sitekey="6Lez6LEaAAAAACOud8oUkQDs9RbWia-EG2S-HIq8"></div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Iniciar</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
<?php require_once 'views/layout/footer.php' ?>
