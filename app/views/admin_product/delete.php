<?php include ROOT . '/views/layouts/admin_header.php'; ?>

<section>
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                  <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                      <ul class="nav navbar-nav">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/product">Управление товарами</a></li>
                        <li ><a href="">Удалить товар</a></li>
                      </ul>
                  </div>
              </div>

              <div class="row our-recomendation">
                  <div class="col-xs-10 col-sm-12 col-md-12">
                      <h4>Удалить товар номер <?php echo $id; ?></h4>


                      <p>Вы действительно хотите удалить этот товар?</p>

                      <form method="post">
                          <input type="submit" name="submit" class="btn good-button" value="Удалить" />
                      </form>

                  </div>
              </div>
        </div>
    </div>















</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>






		





