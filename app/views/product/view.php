<?php include ROOT . '/views/layouts/header.php'; ?>
<?php include ROOT . '/views/layouts/navigation.php'; ?>


<!--Основной контент, рисунок с описанием товара-->
<article> 
        <div class="container">
              <div class="row">
                    <!--Колоночная верстка xs-мобильные устройства, col-md - планшеты, остальные устройства-->
                    <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">
                           <h1><?php echo $product['name'];?></h1>
                    </div>

              <!--Товары, новинки-->
              <div class="col-xs-12 col-sm-12 col-md-12 new-goods">  
                <div class="row">

                    <div class="col-sm-6 col-md-4 ">
                          <div class="thumbnail">

                              <?php if (($product['is_action']=='1')&&($product['is_new']=='1')){
                                  echo '<span class="label label-pill label-danger">NEW+АКЦИЯ</span>';
                              }

                              else if ($product['is_new']=='1'){
                                  echo '<span class="label label-pill label-danger">NEW</span>';
                              }

                              else if ($product['is_action']=='1'){
                                  echo '<span class="label label-pill label-danger">АКЦИЯ</span>';
                              }

                              else{
                                  echo '<span class="label label-pill label-default">ДРУГИЕ</span>';
                              }

                              ?>

                              <a href="/product/<?php echo $product['id'];?>"><img src="/upload/images/product/<?php echo $product['id']?>.jpg" alt="<?php echo $product['name'];?>"></a>
                              <div class="caption">
                                    <h3 class="name-good"><?php echo $product['name'];?></h3>
                                    <form>
                                        <h3 class="price-good"><?php echo $product['price'];?> грн</h3>
                                        <p><a href="#" class="btn btn-danger good-button add-to-card" data-id ="<?php echo $product['id'];?>"  role="button">В корзину
                                          </a></p>
                                    </form>

                                   
                              </div>
                          </div>
                    </div>
                    <div class="col-sm-6 col-md-8 ">
                        <div class="thumbnail">
                           <div class="caption">
                              
                    <table class="table">
                    <thead>
                    <tr>
                        <th>Характеристика</th>
                        <th>Значение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Код товара:</td>
                        <td><?php echo $product['code'];?></td>
                    </tr>
                    <tr>
                        <td>Количество:</td>
                        <td><?php echo $product['avalability'];?></td>
                    </tr>
                    <tr>
                        <td>Наличие</td>
                        <td>
                            <?php
                            if($product['status']=='1'){
                                echo 'в налчии';
                            }
                            else{
                                echo  'нет в наличии';
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Акция</td>
                        <td>
                            <?php
                            if($product['is_action']=='1'){
                                echo 'есть';
                            }
                            else{
                                echo  'нет';
                            }
                            ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                                    <p class="good-description"><?php echo $product['description'];?></p>
                              </div>
                          </div>
                    </div> 
                </div>
              </div>

        </div>
    </div>
</article>
<?php include ROOT . '/views/layouts/footer.php'; ?>






		





