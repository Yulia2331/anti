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
    <!-- Хедер урока -->
    <div class="structure__header">
        <div class="structure__title">
            <?php do_action( 'learn-press/before-content-item-summary/' . $item->get_item_type() ); ?>
        </div>
        

        <?php 
            $user   = learn_press_get_current_user();
            $user_course = $user->get_course_data( get_the_ID() );
            echo '<pre>';
            //print_r(array_values((array)$user_course));
            echo '</pre>';

            if ( $user->has_enrolled_or_finished( $item->get_course_id() ) ) : 
                $percent = $user_course->get_percent_completed_items( '', array_values((array)$item)[5]->get_id() );
                $arr_completed_items = $user_course->get_completed_items( '',true, array_values((array)$item)[5]->get_id());

                // $user_items = array_values((array)$item)[5];
                // $val_items = count(array_values((array)$user_items)[6]['items']);
                
            endif; 
        ?>
        <div class="structure__progress"> 
            <div class="structure__pas">Пройдено</div>
            <div class="structure__value"><span><?php echo $arr_completed_items[0];?></span>/<?php echo $arr_completed_items[1]; ?></div>
            <div class="progress">
                <div class="progress__line" style="width:<?php echo $percent;?>%"></div>
            </div>
        </div>

    </div>

    <!-- Контент урока -->
    <div class="structure__content content-video__review">
	   <?php do_action( 'learn-press/content-item-summary/' . $item->get_item_type() ); ?>
    </div>

    <!-- Остольное урока -->
    <!-- <button class="button-main">Завершить</button> -->



	<?php do_action( 'learn-press/after-content-item-summary/' . $item->get_item_type() );?>





