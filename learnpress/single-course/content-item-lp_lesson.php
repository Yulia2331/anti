<?php

if (mydebbug()){
    echo '---> content-item-lp_lesson.php';
}
/**
 * Template for displaying lesson item content in single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/content-item-lp_lesson.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();

$item = LP_Global::course_item();
?>

<div <?php learn_press_content_item_summary_class(); ?>>

	<?php
	do_action( 'learn-press/before-content-item-summary/' . $item->get_item_type() );

	do_action( 'learn-press/content-item-summary/' . $item->get_item_type() );

	do_action( 'learn-press/after-content-item-summary/' . $item->get_item_type() );

    //echo get_post_meta($item->get_id(), 'comments_home_work', 1);
    $files = explode('/*/',get_post_meta($item->get_id(), 'files_home_work', 1));
    //print_r($files);
    $date = explode('/',get_post_meta($item->get_id(), 'date_home_work', 1));
    //print_r($date);
	?>

</div>

<?php 
    if (isset($files)){
        ?>

        <div class="structure__download download">
            <div class="download__title"> 
                <div class="container__icon--24"><i class="fa-solid fa-circle-exclamation"></i></div>Для вас есть домашнее задание
            </div>
            <div class="download__wrapper">
              <div class="download__files"> 
                <?php 
                    foreach($files as $item){
                        if ($item!=''){
                            $name = explode(',',$item)[0];
                            $file = explode(',',$item)[1];
                            ?>
                                <div class="download__item"> <a class="download__link" href="<?php echo $file;?>" download>
                                    <div class="container__icon--18 download__icon"><i class="fa-solid fa-file"></i></div>
                                    <div class="download__name"><?php echo $name; ?> </div></a>
                                </div>
                            <?php
                        }
                    }
                ?>
                <!-- <div class="download__item"> <a class="download__link" href="../../img/ava-1.png" download>
                    <div class="container__icon--18 download__icon"><i class="fa-solid fa-file"></i></div>
                    <div class="download__name">ava-1.png </div></a>
                </div>
                <div class="download__item"> <a class="download__link" href="../../img/ava-1.png" download>
                    <div class="container__icon--18 download__icon"><i class="fa-solid fa-file"></i></div>
                    <div class="download__name">ava-1.png </div></a>
                </div> -->
              </div>
              <!-- <button class="secondary__button download__btn">Скачать файлы</button> -->
            </div>
        </div>

        <?php
    }
?>

