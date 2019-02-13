<?php include ROOT . '/views/layouts/header.php'; ?>

<!--Основной контент, рисунок с описанием товара-->
<section>
    <div class="container">
        <div class="row">
            <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
            <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                <ul class="nav navbar-nav">
                    <h2>История покупок для <?php echo $orders[0]['user_name'];?></h2>
                </ul>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-sm-12 col-md-12">

                <table class="table table-striped">
                    <thead>
                    <th>Телефон</th>
                    <th>Дата оформления</th>
                    <th>Комментарий</th>
                    <?php foreach ($orders as $orderIndex):?>
                        <tr>
                            <td><?php echo $orderIndex['user_phone'];?></td>
                            <td><?php echo $orderIndex['с_date'];?></td>
                            <td><?php echo $orderIndex['user_comment'];?></td>
                        </tr>
                    <?php endforeach;?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>






		





