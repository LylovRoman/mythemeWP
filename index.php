<?php
    get_header();
?>

<main class="flex-1">
    <div class="section">
        <div class="wrapper">
            <div class="slider">
                <div class="slide">
                    <div class="slide__content">
                        SLIDE 1
                    </div>
                </div>
                <div class="slide">
                    <div class="slide__content">
                        SLIDE 2
                    </div>
                </div>
                <div class="slide">
                    <div class="slide__content">
                        SLIDE 3
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            $('div.slider').slick({
                dots: true,
                height: 300,
                arrows: false
            });
        });
    </script>

    <div class="section sales">
        <div class="wrapper">
            <div class="sales__list">
                <?php
                    // проверяем есть ли посты в глобальном запросе - переменная $wp_query
                    if( have_posts() ){
                        query_posts(array('posts_per_page' => 3, 'cat' => 1));
                        // перебираем все имеющиеся посты и выводим их
                        while( have_posts() ){
                            the_post();
                            ?>
                            <div class="sales__item flex">
                                <div class="sales__image"><?php the_post_thumbnail(); ?></div>
                                <div class="sales__info">
                                    <div class="sales__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <div class="sales__description"><?php the_excerpt(); ?></div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    else {
                        echo "<h2>Записей нет.</h2>";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="section goods">
        <div class="wrapper flex">
            <div class="filter">
                <form action="http://wordpress-mytheme" method="GET">
                    <input type="submit" value="Искать" class="filter__search-btn">
                    <div class="filter__fields">
                        <div class="filter__field">
                            <div class="title">Категория</div>
                            <ul class="values">
                                <li class="flex aic">
                                    <input name="showFurniture" type="checkbox" <?php if( $_GET && isset($_GET['showFurniture'])){ echo "checked"; } ?>> Мебель
                                </li>
                                <li class="flex aic">
                                    <input name="showTechnique" type="checkbox" <?php if( $_GET && isset($_GET['showTechnique'])){ echo "checked"; } ?>> Техника
                                </li>
                                <li class="flex aic">
                                    <input name="showDishes" type="checkbox" <?php if( $_GET && isset($_GET['showDishes'])){ echo "checked"; } ?>> Посуда
                                </li>
                                <li class="flex aic">
                                    <input name="showClothes" type="checkbox" <?php if( $_GET && isset($_GET['showClothes'])){ echo "checked"; } ?>> Одежда
                                </li>
                            </ul>
                        </div>
                        <div class="filter__field">
                            <div class="title">Сортировка</div>
                            <ul class="values">
                                <li class="flex aic">
                                    <input type="radio" name="sort" value="expensive" <?php if( $_GET && isset($_GET['sort']) && $_GET['sort'] == "expensive"){ echo "checked"; } ?>> Сначала дорогие
                                </li>
                                <li class="flex aic">
                                    <input type="radio" name="sort" value="cheap" <?php if( $_GET && isset($_GET['sort']) && $_GET['sort'] == "cheap"){ echo "checked"; } ?>> Сначала дешёвые
                                </li>
                                <li class="flex aic">
                                    <input type="radio" name="sort" value="new" <?php if( $_GET && isset($_GET['sort']) && $_GET['sort'] == "new"){ echo "checked"; } ?>> Сначала новые
                                </li>
                                <li class="flex aic">
                                    <input type="radio" name="sort" value="old" <?php if( $_GET && isset($_GET['sort']) && $_GET['sort'] == "old"){ echo "checked"; } ?>> Сначала старые
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="goods__list flex">
                <?php
                // проверяем есть ли посты в глобальном запросе - переменная $wp_query
                $arr = [];
                $order = 'DESC';
                $orderType = 'date';
                if ($_GET && isset($_GET['sort'])){
                    if ($_GET['sort'] == 'old'){
                        $order = 'ASC';
                    }
                    if ($_GET['sort'] == 'expensive'){
                        $orderType = 'meta_value_num';
                        $order = 'DESC';
                    }
                    if ($_GET['sort'] == 'cheap'){
                        $orderType = 'meta_value_num';
                        $order = 'ASC';
                    }
                }
                if ($_GET && (isset($_GET['showFurniture']) || isset($_GET['showTechnique']) || isset($_GET['showDishes']) || isset($_GET['showClothes']))){
                    if (isset($_GET['showFurniture'])){
                        array_push($arr, 3);
                    }
                    if (isset($_GET['showTechnique'])){
                        array_push($arr, 4);
                    }
                    if (isset($_GET['showDishes'])){
                        array_push($arr, 5);
                    }
                    if (isset($_GET['showClothes'])){
                        array_push($arr, 6);
                    }
                } else {
                    $arr = [2];
                }

                if( have_posts() ){
                    query_posts(array('posts_per_page' => 6, 'cat' => $arr, 'orderby' => $orderType, 'order' => $order, 'meta_key' => 'cost'));
                    // перебираем все имеющиеся посты и выводим их
                    while( have_posts() ){
                        the_post();
                        ?>
                        <div class="goods flex fdc aic">
                            <a href="<?php the_permalink(); ?>"><div class="goods__image"><?php the_post_thumbnail(); ?></div></a>
                            <div class="goods__price"><?php echo get_post_custom()["cost"][0] . " руб."; ?></div>
                            <div class="goods__title"><?php the_title(); ?></div>
                            <button class="goods__buy-btn">Купить</button>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="navigation">
                        <div class="next-posts"><?php next_posts_link(); ?></div>
                        <div class="prev-posts"><?php previous_posts_link(); ?></div>
                    </div>
                    <?php
                }
                else {
                    echo "<h2>Записей нет.</h2>";
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
    get_footer();
