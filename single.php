<?php
    get_header();
    the_post();

    $product = false;
    foreach (get_the_category() as $cat){
        if ($cat->cat_ID == 2){
            $product = true;
        }
    }
?>
    <div class="wrapper" id="single">
        <div class="sales__item flex">
            <div class="sales__info">
                <h1 class="sales__title"><?php the_title(); ?></h1>
                <?php
                if ($product){
                    echo "<div class='goods__image'>";
                    the_post_thumbnail();
                    echo "</div>";
                    echo "<h2>Описание</h2>";
                    echo "<div class='sales__description'>";
                    the_content();
                    echo "</div>";
                    echo "<h2>Стоимость</h2>";
                    echo get_post_custom_values("cost")[0] . ' рублей';
                    echo "<br><button>Добавить в корзину</button>";
                } else {
                    echo "<div class='sales__description'>";
                     the_content();
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
<?php
    get_footer();
?>

<style>
    .wrapper{
        flex: 1;
    }
    #single{
        margin-top: 50px;
    }
</style>
