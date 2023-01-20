<?php 
/**
 * Шаблон для вывода формы комментариев 
 * обязательный параметр $item
 * 
 * $curriculum  = $course->get_curriculum();
 *  foreach ( $curriculum as $section )
 *    $items = $section->get_items();
 * 
 */


//echo $item->get_id();

//print_r($item);

?>

<div class="module-block__add">
  <div class="module-block__add-message">
<?php

$defaults = [
    'fields'  => [
      'author' => 'автор',
      'email'  => 'почта',
      'url'    => 'урл',
      'cookies' => 'куки',
      ],
    'comment_field'  => '
    <input class="module-block__input input-field" name="comment" type="text" placeholder="Ваш комментарий" aria-required="true" required="required">
    <input type="hidden" name="comment_frome_value" value="'.wp_get_current_user()->user_email.'">
    <input type="hidden" name="page_comments" value="'.$_SERVER['REQUEST_URI'].'">
    
    
      ',
    
    'must_log_in'          => '',           
    'logged_in_as'         => '',           
    'comment_notes_before' => '<p class="comment-notes">Авторизуйтесь пожалуста</p>',
    'comment_notes_after'  => '',
    'id_form'              => 'commentform',
    'id_submit'            => 'submit',
    'class_container'      => '',
    'class_form'           => '',
    'class_submit'         => 'submit',
    'name_submit'          => 'submit',
    'title_reply'          => '',
    'title_reply_to'       => '',
    'title_reply_before'   => '',
    'title_reply_after'    => '',
    'cancel_reply_before'  => '',
    'cancel_reply_after'   => '',
    'cancel_reply_link'    => '',
    'comment_notes_after'  => '<div style="display: none;">',
    'label_submit'         => 'Отправить',
    'submit_button'        => '</div><button name="%1$s" type="submit" id="%2$s" class="module-block__send secondary__button %3$s"/><div class="container__icon--18"><i class="fa-solid fa-share"></i></div></button>',
    'submit_field'         => '<p class=" form-submit">%1$s %2$s</p>',
    'format'               => 'xhtml',
  ];

comment_form($defaults,$item->get_id()); 
?>
  </div>

  <div class="module-block__add-file">
    <div class="module-block__all-files"> </div>
    <label id='open-file' class="comment-form-attachment__label module-block__btn secondary__button" for="attachment">Загрузить файл</label>
  </div>

</div>

<script type="text/javascript" src="<?php echo plugins_url();?>/dco-comment-attachment/assets/dco-comment-attachment.js?ver=2.4.0" id="dco-comment-attachment-js"></script>





