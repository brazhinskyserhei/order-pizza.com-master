<?php include ROOT . '/views/layouts/header.php'; ?>

<!--Основной контент, рисунок с описанием товара-->
<section> 
        <div class="container">
              <div class="row">
                <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation ">
                           <h1>Кабинет пользователя</h1>
                           <h3>Привет <?php echo $user['name']; ?></h3>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">
                        <ul>
                            <li><a href="/cabinet/edit">Редактировать данные</a></li>
                            <li><a href="/user/history">Список покупок</a></li>
                            
                        </ul>
                    </div>
               </div>
        </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>






		





