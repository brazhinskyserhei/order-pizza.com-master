<?php include ROOT . '/views/layouts/admin_header.php'; ?>

<section>
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                  <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                      <ul class="nav navbar-nav">
                          <li><a href="/admin">Админпанель</a></li>
                          <li><a href="/admin/product/">Управение товарами</a></li>
                      </ul>

                  </div>
              </div>

              <div class="row">
                  <div class="col-xs-10 col-sm-12 col-md-12">

                      <a href="/admin/product/create" class="btn good-button"><i class="fa fa-plus"></i> Добавить товар</a>

                      <table class="table table-striped">
                            <thead>
                                    <th>ID товара</th>
                                    <th>Номер</th>
                                    <th>Название товара</th>
                                    <th>Цена</th>
                                    <th></th>
                                    <th></th>
                            </thead>

                          <?php foreach ($productsList as $product): ?>
                              <tr>
                                  <td><?php echo $product['id']; ?></td>
                                  <td><?php echo $product['code']; ?></td>
                                  <td><?php echo $product['name']; ?></td>
                                  <td><?php echo $product['price']; ?></td>
                                  <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                  <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                              </tr>
                          <?php endforeach; ?>

                      </table>
                  </div>
              </div>



        </div>
    </div>















</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>






		





