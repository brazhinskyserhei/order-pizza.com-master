<?php include ROOT . '/views/layouts/header.php'; ?>

<!--Основной контент, рисунок с описанием товара-->
<section> 
        <div class="container">
              <div class="row">
                <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation ">
                           <h1>Редактировать данные</h1>
                    </div>



                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">

                           <form action ="#" method ="post">
                                <div class="form-group">
                                    <label for="inputEmail1">Email</label>
                                        <input type="text" class="form-control" id="inputName1" name="inputNameRegister" placeholder="Email"value = "">
                                </div>

                                
                                <div class="form-group">
                                    <label for="inputPassword1">Пароль</label>
                                    <input type="password" class="form-control" id="inputPassword1" name="inputPasswordRegister" placeholder="Пароль" value = "" >
                                </div>
                             
                               <button type="submit" name="submitRegister" class="btn btn-primary good-button">Сохранить</button>

                        </form>

                    </div>
               </div>


            <?php if($result):?>
                <h1>Данные отредактированы</h1>
            <?php else: ?>

            <?php if(isset($errors)&&is_array($errors)):?>

            <label>
                <?php foreach ($errors as $error):?>
                    <li>- <?php echo $error?></li>
                <?php endforeach;?>
                <?endif;?>
            </label>
            <?endif;?>


        </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>






		





