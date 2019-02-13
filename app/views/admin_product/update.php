<?php include ROOT . '/views/layouts/admin_header.php'; ?>


<section>
    <div class="container">
        <div class="row our-recomendation">


                <ul class="nav navbar-nav">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active"><a href="">Редактировать товар</a></li>
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

                        <p>Название товара</p>
                        <input type="text" name="name" class="form-control" placeholder="" value="<?php echo $product['name']; ?>">

                        <p>Артикул</p>
                        <input type="text" name="code"  class="form-control" placeholder="" value="<?php echo $product['code']; ?>">

                        <p>Стоимость, $</p>
                        <input type="text" name="price" class="form-control" placeholder="" value="<?php echo $product['price']; ?>">

                        <p>Категория</p>
                        <select name="category_id" class="form-control">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <br/><br/>

                        <p>Количество</p>
                        <input type="text" name="avalability" class="form-control"  placeholder="" value="<?php echo $product['avalability']; ?>">


                        <p>Изображение товара</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
                        <input type="file" class="form-control"  name="image" placeholder="" value="<?php echo $product['image']; ?>">



                        <p>Детальное описание</p>
                        <textarea name="description" class="form-control"><?php echo $product['description']; ?></textarea>

                        <p>Акция</p>
                        <select name="is_action" class="form-control" >
                            <option value="1" <?php if ($product['is_action'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['is_action'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        <br/><br/>


                        <p>Новинка</p>
                        <select name="is_new" class="form-control" >
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_recomendation" class="form-control" >
                            <option value="1" <?php if ($product['is_recomendation'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recomendation'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status" class="form-control" >
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>

            </div>

    </div>
</section>


<?php include ROOT . '/views/layouts/admin_footer.php'; ?>






		





