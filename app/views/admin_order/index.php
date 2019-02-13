<?php include ROOT . '/views/layouts/admin_header.php'; ?>

<section>
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                  <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                      <ul class="nav navbar-nav">
                          <li><a href="/admin">Админпанель</a></li>
                          <li><a href="">Упраление заказами</a></li>
                      </ul>

                  </div>
              </div>

              <div class="row">
                  <div class="col-xs-10 col-sm-12 col-md-12">


                      <table class="table table-striped">
                            <thead>
                                    <th>ID</th>
                                    <th>Покупатель</th>
                                    <th>Телефон</th>
                                    <th>Дата оформления</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                    <?php foreach ($ordersList as $myOrder): ?>
                                        <tr>
                                            <td>
                                                <a href="/admin/order/view/<?php echo $myOrder['id']; ?>">
                                                    <?php echo $myOrder['id']; ?>
                                                </a>
                                            </td>
                                            <td><?php echo $myOrder['user_name']; ?></td>
                                            <td><?php echo $myOrder['user_phone']; ?></td>
                                            <td><?php echo $myOrder['с_date']; ?></td>
                                            <td><a href="/admin/order/view/<?php echo $myOrder['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                                            <td><a href="/admin/order/update/<?php echo $myOrder['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                            <td><a href="/admin/order/delete/<?php echo $myOrder['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </thead>
                      </table>
                  </div>
              </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>












