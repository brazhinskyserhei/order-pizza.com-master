<!--Меню с категориями-->
<nav class="navbar navbar-inverse navbar-class-category">
    <div class="container-fluid">
        <!-- Бренд и конпка при изменении размера для маленьких устройств-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed menu-btn" data-toggle="collapse" data-target="#menu-category" aria-expanded="false">

                <span class="glyphicon glyphicon-cutlery"></span>

            </button>
        </div>

        <!-- Меню -->
        <div class="collapse navbar-collapse category-menu-change" id="menu-category" >
            <ul class="nav navbar-nav">
                <?php foreach ($categories as $categoryItem):?>

                    <li><a href="/category/<?php echo $categoryItem['id']; ?>">
                            <p class="p-menu-icons">
                                <?php echo $categoryItem['simvol'];?>
                            </p><?php echo $categoryItem['name'];?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</nav>
</header>