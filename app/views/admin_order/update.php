<?php include ROOT . '/views/layouts/admin_header.php'; ?>


<section>
    <div class="container">
        <div class="row our-recomendation">
        
                <ul class="nav navbar-nav">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление заказами</a></li>
                    <li class="active"><a href="">Редактировать заказ</a></li>
                </ul>

        </div>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">

                    <form action="" method="post" enctype="multipart/form-data">

                        <p>Имя клиента</p>
                        <input type="text" class="form-control" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

                        <p>Телефон клиента</p>
                        <input type="text" class="form-control" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

                        <p>Комментарий клиента</p>
                        <input type="text" class="form-control" name="userComment" placeholder="" value="<?php echo $order['user_comment']; ?>">

                        <p>Дата оформления заказа</p>
                        <input type="text" class="form-control" name="с_date" placeholder="" value="<?php echo $order['с_date']; ?>">

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>

            </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/admin_footer.php'; ?>






		





