<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/slider.php'; ?>
<?php include ROOT . '/views/layouts/navigation.php'; ?>



<section>
        <div class="container">
              <div class="row">
                   
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">
                          <h1>Новинки <span class="label label-pill label-danger">NEW</h1>
                    </div>



              <div class="col-xs-12 col-sm-12 col-md-12 new-goods">
                <div class="row">

                    <?php foreach ($newProducts as $newProductsIndex):?>
                        <div class="col-sm-6 col-md-4 ">
                          <div class="thumbnail">
                              <span class="label label-pill label-danger">NEW</span>
                              <a href="/product/<?php echo $newProductsIndex['id']; ?>"><img src="/upload/images/product/<?php echo $newProductsIndex['id']?>.jpg" alt="<?php echo $latestProductsIndex['name']; ?>"></a>
                              <div class="caption">
                                    <h3 class="name-good"><?php echo $newProductsIndex['name']; ?></h3>
                                    <p class="good-description"></p>

                                    <form>
                                        <h3 class="price-good"><?php echo $newProductsIndex['price']; ?> ГРН</h3>
                                        <p><a href="#" class="btn btn-danger good-button add-to-card" data-id ="<?php echo $newProductsIndex['id'];?>"  role="button">В корзину
                                          </a></p>
                                    </form>
                              </div>
                          </div>
                        </div>
                    <?php endforeach;?>

            <div class="col-xs-12 col-sm-12 col-md-12 our-recomendation">
                <h1>Акция <span class="label label-pill label-danger">АКЦИЯ</h1>
            </div>
        </div>

                  <div class="row">

                      <?php foreach ($actionProducts as $newProductsIndex):?>
                          <div class="col-sm-6 col-md-4 ">
                              <div class="thumbnail">
                                  <span class="label label-pill label-danger">АКЦИЯ</span>
                                  <a href="/product/<?php echo $newProductsIndex['id']; ?>"><img src="/upload/images/product/<?php echo $newProductsIndex['id']?>.jpg" alt="<?php echo $latestProductsIndex['name']; ?>"></a>
                                  <div class="caption">
                                      <h3 class="name-good"><?php echo $newProductsIndex['name']; ?></h3>
                                      <p class="good-description"></p>

                                      <form>
                                          <h3 class="price-good"><?php echo $newProductsIndex['price']; ?> ГРН</h3>
                                          <p><a href="#" class="btn btn-danger good-button add-to-card" data-id ="<?php echo $newProductsIndex['id'];?>"  role="button">В корзину
                                              </a></p>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      <?php endforeach;?>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>