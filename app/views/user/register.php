<?php include ROOT . '/views/layouts/header.php'; ?>
<body>
<!--Основной контент, рисунок с описанием товара-->
<section> 
        <div class="container">
              <div class="row">
                <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation ">
                           <h1>Регистрация на сайте</h1>
                    </div>



                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">
                        <?php if($result):?>
                            <h1>Вы зарегестрированы!</h1>
                        <?php else:?>
                           <form action ="#" method ="post">
                                <div class="form-group">
                                    <label for="inputEmail1">Email</label>
                                        <input type="email" class="form-control" id="inputEmail1" name="inputEmailRegister" placeholder="Email" value = <?php echo $email; ?>>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputName1">Имя</label>
                                    <input type="text" class="form-control" id="inputName1" name="inputNameRegister" placeholder="Имя" value = <?php echo $name; ?>>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputPassword1">Пароль</label>
                                    <input type="password" class="form-control" id="inputPassword1" name="inputPasswordRegister" placeholder="Пароль" value = <?php echo $password; ?>>
                                </div>
                             
                               <button type="submit" name="submitRegister" class="btn btn-primary good-button">Регистрация</button>


                        </form>
                        <?php endif;?>
                    </div>
               </div>



            <?php if(isset($errors)&&is_array($errors)):?>

            <label>
                <?php foreach ($errors as $error):?>
                    <li>- <?php echo $error?></li>
                <?php endforeach;?>
                <?endif;?>
            </label>

        </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>






		





