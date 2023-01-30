<?php
/**
 * Content Poup.
 * Use for React Quiz.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

//print_r(LearnPress::instance()->template( 'course' ));
//learn_press_get_template( 'content-single-course' );
//the_content();

?>

<!-- <div id="popup-content" > -->
<section class="structure padding-left">

    
    <div class="structure__crums crums">
        <?php learn_press_breadcrumb();?>
    </div>

    <div class="grid-block">
        <div class="drid-block__left">
	       <?php LearnPress::instance()->template( 'course' )->course_content_item(); ?>    
        </div>
        <div class="grid-block__right">

            <?php 
                //выводим домашку
            
                $item = LP_Global::course_item();
                //echo get_post_meta($item->get_id(), 'comments_home_work', 1);
                $files = explode('/*/',get_post_meta($item->get_id(), 'files_home_work', 1));
                //print_r($files);
                $date = explode('/',get_post_meta($item->get_id(), 'date_home_work', 1));
                //print_r($date);

                if (isset($files) and $files[0] != ''){
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


	       <?php LearnPress::instance()->template( 'course' )->course_item_comments();	?>
        </div>
    </div>
</section>
<!-- </div> -->
