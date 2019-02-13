<?php include ROOT . '/views/layouts/header.php'; ?>

<!--Основной контент, рисунок с описанием товара-->
<section> 
        <div class="container">
              <div class="row">
                <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation ">
                           <h1>Оформление заказа</h1>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">

                        <?php if(isset($errors)&&is_array($errors)):?>

                        <label>
                            <?php foreach ($errors as $error):?>
                                <li>- <?php echo $error?></li>
                            <?php endforeach;?>
                            <?endif;?>
                        </label>


                        <?php if($result):?>
                            <p>Заказ оформлен. Мы перезвоним</p>
                        <?php else:?>

                        <p>Выбрано товаров: <?php echo $totalQuantity; ?></p>
                        <p>Cумма: <?php echo $totalPrice; ?></p>





                        <form action ="" method ="post">


                            <div class="form-group">
                                <label for="inputName1">Имя</label>
                                <input type="text" class="form-control" id="inputName1" name="inputNameRegister" placeholder="Имя"  value="<?php echo $userName; ?>">
                            </div>

                            <div class="form-group">
                                <label for="inputTel1">Телефон</label>
                                <input type="text" class="form-control" id="inputTel1" name="inputTel1" placeholder="Телефон" value="<?php echo $userPhone; ?>">
                            </div>

                            <div class="form-group">
                                <label for="comment">Коментарий:</label>
                                <textarea class="form-control" rows="5" style="resize: none;" id="comment" name="comment" value="<?php echo $userComment; ?>"></textarea>
                            </div>

                            <button type="submit" name="submitOrder" class="btn btn-primary good-button">Заказать</button>


                        </form>




                    </div>
                  <?php endif; ?>
               </div>

        </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>












