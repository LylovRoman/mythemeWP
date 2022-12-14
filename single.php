<?php
    get_header();
    the_post();
?>
    <div class="wrapper" id="single">
        <div class="sales__item flex">
            <div class="sales__info">
                <h1 class="sales__title"><?php the_title(); ?></h1>
                <div class="sales__description"><?php the_content(); ?></div>
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
