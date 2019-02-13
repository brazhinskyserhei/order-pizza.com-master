<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/navigation.php'; ?>
<!--Основной контент-->
<section>
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">
                          <h1><?php echo $categories[$categoryId-1]['name']?></h1>
                    </div>


              <!--Товары, новинки-->
              <div class="col-xs-12 col-sm-12 col-md-12 new-goods">  
                <div class="row">
                    <?php foreach ($categoryProducts as $latestProductsItem):?>

                    <div class="col-sm-6 col-md-4 ">
                          <div class="thumbnail">

                              <?php if (($latestProductsItem['is_action']=='1')&&($latestProductsItem['is_new']=='1')){
                                    echo '<span class="label label-pill label-danger">NEW+АКЦИЯ</span>';
                                }

                              else if ($latestProductsItem['is_new']=='1'){
                                  echo '<span class="label label-pill label-danger">NEW</span>';
                              }

                              else if ($latestProductsItem['is_action']=='1'){
                                  echo '<span class="label label-pill label-danger">АКЦИЯ</span>';
                              }

                              else{
                                  echo '<span class="label label-pill label-default">ДРУГИЕ</span>';
                              }

                              ?>

                              <a href="/product/<?php echo $latestProductsItem['id']; ?>"><img src="/upload/images/product/<?php echo $latestProductsItem['id']?>.jpg" alt="<?php echo $latestProductsItem['name']; ?>"></a>
                              <div class="caption">
                                    <h3 class="name-good"><?php echo $latestProductsItem['name'];


                                    ?></h3>
                                    <p class="good-description"><?php echo $latestProductsItem['description'];?></p>
                      
                                    <form>
                                        <h3 class="price-good"><?php echo $latestProductsItem['price']; ?> грн</h3>
                                          <p><a href="#" class="btn btn-danger good-button add-to-card" data-id ="<?php echo $latestProductsItem['id'];?>"  role="button">В корзину
                                          </a></p>
                                    </form>
                              </div>
                          </div>
                    </div>
                    <?php endforeach;?>
                </div>
              </div>
            </div>
            <?php echo $pagination->get();?>

        </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>