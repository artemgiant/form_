<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <base href="/">
<!--    -->
    <?=$this->getMeta();?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/star.png" type="image/png" />
    <title>Form</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/comment.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link href="css/my.css" rel="stylesheet" type="text/css" media="all" />

    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!--top-header-->
<div class="top-header text-center">
   <?php if(!empty($_SESSION['user'])): ?> <span class="logout"><a href="user/logout"> Выход</a></span> <?php endif; ?>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="http://ishop2.loc"><h1>Luxury Watches</h1></a>
</div>
<!--start-logo-->


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>

    <!--prdt-starts-->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php \app\widgets\Form\Form::viewForm(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="footer_wrapper" id="contact">
                    <div class="container">
                        <section class="page_section contact comment " id="contact">
                            <div class="contact_section text-center cn_1">
                                <h4 class="title_comment">Comments</h4>
                            </div>
                            <div id="parrent_comment">
                                <?=$content;?>
                            </div>
                            <div class="preloader" style="display: none;"><img src="images/ring.svg" alt=""></div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($_SESSION['form_data']))unset($_SESSION['form_data']) ?>

    </div>
    <!--product-end--></div>

<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Information</h3>
                <ul>
                    <li><a href="#"><p>Specials</p></a></li>
                    <li><a href="#"><p>New Products</p></a></li>
                    <li><a href="#"><p>Our Stores</p></a></li>
                    <li><a href="contact.html"><p>Contact Us</p></a></li>
                    <li><a href="#"><p>Top Sellers</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>My Account</h3>
                <ul>
                    <li><a href="account.html"><p>My Account</p></a></li>
                    <li><a href="#"><p>My Credit slips</p></a></li>
                    <li><a href="#"><p>My Merchandise returns</p></a></li>
                    <li><a href="#"><p>My Personal info</p></a></li>
                    <li><a href="#"><p>My Addresses</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Store Information</h3>
                <h4>The company name,
                    <span>Lorem ipsum dolor,</span>
                    Glasglow Dr 40 Fe 72.</h4>
                <h5>+955 123 4567</h5>
                <p><a href="mailto:example@email.com">contact@example.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">

    </div>
</div>
<!--footer-end-->

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>

<div class="preloader"><img src="images/ring.svg" alt=""></div>

<script>
    var path = '<?=PATH;?>'
</script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/ajaxupload.js"></script>
<!--dropdown-->

<script src="js/main.js"></script>

</body>
</html>