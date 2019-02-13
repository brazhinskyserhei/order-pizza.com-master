<?php include ROOT . '/views/layouts/admin_header.php'; ?>

<section>
    <div class="container">
        <div class="row our-recomendation">
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li><a href="">Создать товар</a></li>
                </ul>
            </div>
        </div>


            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-xs-12 col-sm-6 col-md-8 our-recomendation">
                <h4 class="our-recomendation">Добавить новый товар</h4>
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data" class="form-group">

                        <p>Название товара</p>
                        <input type="text" class="form-control" required name="name" placeholder="Название товара" value="">

                        <p> Номер</p>
                        <input type="text" class="form-control" name="code" required  placeholder="Номер товара" value="">

                        <p>Цена, грн</p>
                        <input type="text" class="form-control" name="price"  required  placeholder="Цена" value="">

                        <p>Категория</p>
                        <select name="category_id" class="form-control" >
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Количество</p>
                        <input type="text" class="form-control" required  name="avalability" placeholder="" value="">

                        <p>Изображение товара</p>
                        <input type="file" class="form-control" name="image" required  placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea class="form-control" required  name="description"></textarea>

                        <br/><br/>

                        <p>Акционный товар</p>
                        <select class="form-control" name="is_action">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Новинка</p>
                        <select class="form-control" name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Рекомендуемые</p>
                        <select name="is_recomendation" class="form-control">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status" class="form-control">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn good-button" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin_footer.php'; ?>






		





