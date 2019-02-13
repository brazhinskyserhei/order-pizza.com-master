<?php include ROOT . '/views/layouts/admin_header.php'; ?>

<section>
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                  <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                      <ul class="nav navbar-nav">
                          <li><a href="/admin">Админпанель</a></li>
                          <li><a href="/admin/order">Управление заказами</a></li>
                          <li class=""><a href="">Просмотр заказа</a></li>
                      </ul>

                  </div>
              </div>

              <div class="row">
                  <div class="col-xs-10 col-sm-12 col-md-12">
                      <table class="table table-striped">
                          <tr>
                              <td>Номер заказа</td>
                              <td><?php echo $order['id']; ?></td>
                          </tr>
                          <tr>
                              <td>Имя клиента</td>
                              <td><?php echo $order['user_name']; ?></td>
                          </tr>
                          <tr>
                              <td>Телефон клиента</td>
                              <td><?php echo $order['user_phone']; ?></td>
                          </tr>
                          <tr>
                              <td>Комментарий клиента</td>
                              <td><?php echo $order['user_comment']; ?></td>
                          </tr>
                          <?php if ($order['user_id'] != 0): ?>
                              <tr>
                                  <td>ID клиента</td>
                                  <td><?php echo $order['user_id']; ?></td>
                              </tr>
                          <?php endif; ?>
                          <tr>
                              <td>Дата заказа</td>
                              <td><?php echo $order['с_date']; ?></td>
                          </tr>

                      </table>

                      <table class="table table-striped">
                          <tr>
                              <th>ID товара</th>
                              <th>Код</th>
                              <th>Название</th>
                              <th>Цена</th>
                              <th>Количество</th>
                          </tr>
                          <?php foreach ($products as $product): ?>
                              <tr>
                                  <td><?php echo $product['id']; ?></td>
                                  <td><?php echo $product['code']; ?></td>
                                  <td><?php echo $product['name']; ?></td>
                                  <td><?php echo $product['price']; ?>  ГРН</td>
                                  <td><?php echo $productsQuantity[$product['id']]; ?></td>
                              </tr>
                          <?php endforeach; ?>

                      </table>

                      <a href="/admin/order/" class="btn good-button"><i class="fa fa-arrow-left"></i>Назад</a>
                      <br/>


                  </div>
              </div>



        </div>
    </div>















</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>






		





