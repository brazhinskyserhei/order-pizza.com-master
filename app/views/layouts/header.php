<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8" />

	<title>Товары</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="/template/libs/bootstrap/css/bootstrap.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<link rel="stylesheet" href="/template/libs/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/template/css/main.css">
  <link rel="stylesheet" href="/template/css/fonts.css">


    

</head>
<body>
	 <!--Шапка-->
    <header>
        <nav class="navbar navbar-inverse navbar-class-user">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed menu-btn" data-toggle="collapse" data-target="#menu" aria-expanded="false">

                      <span class="glyphicon glyphicon-menu-hamburger">

                    </button>
                    <a class="navbar-brand logo" href="/" >OrderPizza</a>
                </div>


                <div class="collapse navbar-collapse" id="menu" >
                    <ul class="nav navbar-nav">
                        <li><a href="/cantacts/">КОНТАКТЫ</a></li>
                        <li><a href="/about/">О ЗАВЕДЕНИИ</a></li>
                        <li><a href="/blog/">БЛОГ</a></li>
                        <li><a href="/catalog/">КАТАЛОГ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">КОНТАКТЫ <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-contacts menu-dropdown">
                                <li><a><b>Служба доставки:</b></a></li>
                                <li><a href="#"><img src = "/template/img/3.png">(044) 377-73-55</a></li>
                                <li><a href="#"><img src = "/template/img/1.png">(099) 454-26-26</a></li>
                                <li><a href="#"><img src = "/template/img/2.png">(099) 454-26-26</a></li>
                                <li><a href="#"><img src = "/template/img/4.png">(099) 454-26-26</a></li>
                            </ul>
                    </ul>


                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/cart/"><span id ="cart-count" class="label label-pill label-danger"><?php echo Cart::countProductsInCard();?></span><span class="glyphicon glyphicon-shopping-cart"></span>
                                <?php
                                if(Cart::countProductsInCard()==0):
                                        $totalPrice=0;
                                        echo '0 ГРН';
                                else:
                                        echo $totalPrice.'ГРН';

                                endif;

                                ?>
                            </a></li>

                        <?php if (User::isGuest()):?>
                            <li><a href="/user/login/"><span class="glyphicon glyphicon glyphicon-log-in"></a></li>
                            <li><a href="/user/register/">Регистрация</a></li>
                        <?php else: ?>
                            <li><a href="/cabinet/"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="/user/logout/"><span class="glyphicon glyphicon glyphicon-log-out"></span></a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>







