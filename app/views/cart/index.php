<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/navigation.php'; ?>


<!--Основной контент, рисунок с описанием товара-->
<section>
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                  <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                           <h1>Корзина</h1>
                  </div>



              <!--Товары, новинки-->
              </div>

              <div class="row">
                  <div class="col-xs-10 col-sm-12 col-md-12">
                    <!--Текст-->
                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары:</p>


                        <table class="table table-striped">
                            <thead>
                                <th>Код</th>
                                <th>Название</th>
                                <th>Цена,грн</th>
                                <th>Кол.,шт</th>

                            </thead>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['code'];?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name'];?>
                                        </a>

                                    </td>
                                    <td><?php echo $product['price'];?></td>
                                    <td> <a href="/cart/delete/<?php echo $product['id'];?>"><span class="glyphicon glyphicon glyphicon-trash"></span></a>
                                        <?php echo $productsInCart[$product['id']];?></td>


                                </tr>
                            <?php endforeach; ?>
                        </table>

                    <?php else: ?>
                        <p>Корзина пуста!</p>
                    <?php endif; ?>
              </div>
                  <div class="col-xs-12 col-sm-3 col-md-3 our-recomendation">
                      <p>
                          <a href="/cart/checkout" class="btn btn-danger good-button" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить заказ - <?php echo $totalPrice;?>, грн
                          </a>
                      </p>
                  </div>
              </div>



        </div>
    </div>















</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>






		





