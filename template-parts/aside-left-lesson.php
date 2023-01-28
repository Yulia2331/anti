<?php 

$user_info = get_userdata(get_current_user_id());



?>
    <section class="navigation-block-close">
      <div class="navigation-block-close__header">
        <button class="navigation-block-close__button-open"><i class="fa-solid fa-angles-right"></i></button>
      </div>
      <div class="navigation-block__body">
        <nav class="navigation-block__pages navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/author/<?php echo $user_info->user_nicename ?>">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-user"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/kalendar-kluba/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-calendar"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/analitika/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-solid fa-chart-line"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="./users/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-address-book"></i></div></a></li>
                <? if( is_user_role_in( [ 'administrator','contributor' ] ) ){ ?>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/spisok-razreshenij/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-file-excel"></i></div></a></li>
                <?php	}?>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/spisok-kursov/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-newspaper"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/lenta/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-window-restore"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/bank-idej/">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-lightbulb"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="<?php echo home_url(); ?>/teacher">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-solid fa-list-check"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link"  href="<?php echo home_url(); ?>/home-work">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-solid fa-list-check"></i></div></a></li>
          </ul>
        </nav>
      </div>
    </section>

    <section class="navigation-block">
      <div class="navigation-block__wrapper"> 
      
        <div class="navigation-block__header">
        
         <? the_custom_logo(); ?>
       
        <!-- <img class="navigation-block__logo" src="img/logo.svg" alt="logo"></a>  -->
 
          <button class="navigation-block__button"> <i class="fa-solid fa-angles-left"></i></button>
        </div>

        <div class="navigation-block__body" style="padding: 30px 0px !important;">          

          <nav class="navigation-block__pages navigation">
            <ul class="navigation__list">
              <?php
                LearnPress::instance()->template( 'course' )->course_curriculum();
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </section>