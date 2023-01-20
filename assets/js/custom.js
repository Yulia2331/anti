
let localurl = 'http://localhost:8000/';

if (document.getElementsByName('reg-user-type')){
let numOfChanges = 0;
const radioButtons = document.getElementsByName('reg-user-type');
for(let radio of radioButtons) {
  radio.addEventListener('change', function(e) {
	let label = document.querySelector(`[for="${e.target.id}"]`);
	let labelsALL = document.querySelectorAll('#reg-user-type > label')
    for(let labels of labelsALL) {
      if(labels === label) {
		    labels.classList.remove('btn-secondary');
        labels.classList.add('btn-primary');
      } else {
			labels.classList.add('btn-secondary');
			labels.classList.remove('btn-primary');
      }
    }
    numOfChanges++;
   
  });
}
}

if (document.getElementsByName('analitic-checker')){
  let numOfChanges = 0;
  const radioButtons = document.getElementsByName('analitic-checker');
  for(let radio of radioButtons) {
    radio.addEventListener('change', function(e) {
    let label = document.querySelector(`[for="${e.target.id}"]`);
    let labelsALL = document.querySelectorAll('#analitic-checker > label')
      for(let labels of labelsALL) {
        if(labels === label) {
          labels.classList.remove('btn-secondary');
          labels.classList.add('btn-primary');
        } 
        else {
          labels.classList.add('btn-secondary');
          labels.classList.remove('btn-primary');
        }
      }
      numOfChanges++;
      window.location.href=( $("input[name='analitic-checker']:checked").attr('data-href'));
    });
  }
}

var ajaxurl = localurl + "/wp-admin/admin-ajax.php";



jQuery(document).ready(function($){




  

//   Inputmask({
//     "mask" : "(999) 999-99-99"
// }).mask("#input_phone, #user_phone");

$(document).on('click','#kt_charts_widget_5 .apexcharts-yaxis-label', function(){
	let city = $(this).find('title').text();
	location.href = '/users/?city=' + city;
})



  let telegram = document.getElementById("iput_telegram");
  if (telegram){
				telegram.addEventListener("focus", function () {
					if (this.value[0] != '@') {
						this.value = '@' + this.value;
					}

				});
				telegram.addEventListener("change", function () {
					if (this.value[0] != '@') {
						this.value = '@' + this.value;
					}

				});
      }
  
  
  $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
	$( ".datepicker" ).datepicker({
    dateFormat: "dd.mm.yy",
    yearRange: "1870:2022",
    changeYear:true
  });
  $( ".datepicker" ).mask("99.99.9999");

  var input = document.querySelector("#input_phone");
  if (input){
				window.intlTelInput(input, {

					autoHideDialCode: false,
					separateDialCode: true,
					preferredCountries: ['ru', 'ua', 'by'],
					// onlyCountries: ['ru', 'ua', 'by'],
					initialCountry: "auto",
          autoPlaceholder:"aggressive",
					placeholderNumberType:"MOBILE",
          utilsScript:"/wp-content/themes/panel/assets/js/cityphone/js/utils.js",
					geoIpLookup: function (success, failure, setCity) {
						$.get("//ip-api.com/json/?lang=ru", function () { }, "jsonp").always(function (resp) {
							var countryCode = (resp && resp.countryCode) ? resp.countryCode : "be";
							
							$('#input_city').val(resp.city);
							success(countryCode);
						});
					},
					
				});
				input.addEventListener("countrychange", function() {
          
          
				});

        $("#input_phone").on("close:countrydropdown focus",function(e,countryData){
          // $(this).val('');
          
          $(this).mask($(this).attr('placeholder').replace(/[0-9]/g,'9'));
        });
      }

        
    $(document).on("change keyup input click", ".textonly", function() {
        if(this.value.match(/[^A-zА-яЁё]/g)){
            this.value = this.value.replace(/[^A-zА-яЁё]/g, "");
        };
    });

  $(document).click( function(e){
    if ( $(e.target).closest('#smiling').length ) {
        $('#smiling .smiling__body').css({'display':'flex'});
        return;
    }
// клик снаружи элемента 
  $('#smiling .smiling__body').css({'display':'none'});
  });

  $(document).click( function(e){
    if ( $(e.target).closest('.comment-smiling').length ) {
  
       var tar = $(e.target).parents('div').attr('data-target');
       $('#'+tar).css({'display':'flex'});
        return;
    }
// клик снаружи элемента 
  $('.comment-smiling .smiling__body').css({'display':'none'});
  });
  
  $(document).on('click','.post-vision li:not(.active)', function(){
    $('.post-vision li.active').removeClass('active');
    $(this).addClass('active');
   
  })





  $(document).click( function(e){
    if ( $(e.target).closest('#subscriptions').length ) {
        $('#subscriptions .subs').css({'display':'flex'});
        console.log($(window).width());
        if ($(window).width()<499){
          $('#subscriptions .subs').css({'transform': 'translateX(-90px)'});
        }
        return;
    }
// клик снаружи элемента 
  $('#subscriptions .subs').css({'display':'none'});
  });
  $(document).click( function(e){
    if ( $(e.target).closest('#subscribers').length ) {
        $('#subscribers .subs').css({'display':'flex'});
        return;
    }
// клик снаружи элемента 
  $('#subscribers .subs').css({'display':'none'});
  });

  function check_input(element){
    if (element.val()==''){
      element.css('border-color', 'red');
      return false
    }
    else {
      element.css('border-color', '#F5F8FA');
      return true;
    }

  }

  function get_course(v){
   
    let course;
    $.ajax({
    type:'GET',
    url: 'https://www.cbr-xml-daily.ru/daily_json.js',
    dataType: "json",
    async:false,
    success: function(response){
      course = response.Valute[v].Value
    },
    error: function(respone){
      console.log(respone.error);
    }
    
    });
    return course;
  }



  $('#new_user_money').submit(function(e){
    e.preventDefault();
    let this_money = $('[name="this_month_money"]');
    let next_money = $('[name="next_month_money"]');
    let valute = $('#valute').val();
    
    check_this = check_input(this_money);
    check_next = check_input(next_money);
    
    if(check_next == true && check_this==true){
      if (valute != "RUB"){
        let curs = get_course(valute);
        this_money = Math.floor(parseFloat(this_money.val().replace(",",".").replace(/[^0-9.]/gim, "")) * curs);
        next_money = Math.floor(parseFloat(next_money.val().replace(",",".").replace(/[^0-9.]/gim, "")) * curs);
        console.log(curs);
        console.log(this_money);
        console.log(next_money);
      }
      else{
        this_money = this_money.val().replace(",",".").replace(/[^0-9.]/gim, "");
        next_money = next_money.val().replace(",",".").replace(/[^0-9.]/gim, "");
      }
      $.ajax({
        type:'POST',
        url: localurl + '/wp-admin/admin-ajax.php',
        data: {
            action: 'add_user_money',
            this_money: this_money,
            next_money: next_money,
        },  
        dataType: "json",
        success: function (response) {
          Swal.fire({
            text: "Вы успешно заполнили",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
          }).then(function (result) {
            if (result.isConfirmed) { 
					$('[name="this_month_money"]').val('');
					$('[name="next_month_money"]').val('');
              location.href = response.url;
   
            }
        });
        setTimeout(
          ()=>{
              Swal.close();
              $('[name="this_month_money"]').val('');
              $('[name="next_month_money"]').val('');
              location.href = response.url;
          }, 2000
      );
        },
        error: function (response) {
          Swal.fire({
            text: "Проверьте правильность введенных данных",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        }
      });
    }
  });


  $("#smiling .smile").on('click', function() {
    var $txt = $("#post_text");
    var caretPos = $txt[0].selectionStart;
    var textAreaTxt = $txt.val();
    let add = $(this).attr('data-smile');
    
    $txt.val(textAreaTxt.substring(0, caretPos) + add + textAreaTxt.substring(caretPos) );
  });
  $(document).on('click', '.comments-form .smiling__body .smile', function(){
    let txt = $(this).parent().parent().parent().find('.form-control');
    console.log(txt);
    let caretPos = txt[0].selectionStart;
    let textAreaTxt = txt.val();
    let add = $(this).attr('data-smile');
    txt.val(textAreaTxt.substring(0, caretPos) + add + textAreaTxt.substring(caretPos) );
  })

  //загрузка картинки к посту для предпросмотра

$('#post-image-input').change(function(){
  
  if (this.files[0]) {
    var fr = new FileReader();
    fr.addEventListener("load", function () {
      document.querySelector(".output-image").style.backgroundImage = "url(" + fr.result + ")";
    }, false);
    fr.readAsDataURL(this.files[0]);
   let image = upload_files(this.files[0]);
   $('#uploaded_image').val(image.id);
  };
});
//----------------------------------//

$('.filter-links a').on('click', function(e){
  e.preventDefault();
  if ($(this).hasClass('active')){
    return;
  }
  else{
    $('.filter-links a.active').removeClass('active');
    $(this).addClass('active');
    let target = $(this).attr('data-filter');
    let user = $(this).attr('data-user');
    console.log(user, target);
    filter_users_posts(user, target)
  }
})


$('#public-post-btn').on('click', function(e){
  $(this).attr('disabled', true);
  console.log(window.location.href);
  e.preventDefault();
  let content = $('#post_text').val();
  let id = $(this).attr('data-user');
  let status = $('#post-privacy li.active').attr('data-vision');
  let picture = $('#uploaded_image').val();
  let image = 'None';

  console.log(window.location.href);
  
  if (picture!=''){
    image = picture;
  }
 
      if (content.length < 1 && image=="None"){
       
        Swal.fire({
          text: "Пост не должен быть пустым, проверьте все ли заполнено",
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn btn-primary"
          }
      });
      $("#public-post-btn").attr('disabled', false);
      return;
    }
    
    else{
      $("#public-post-btn").attr('disabled', false);
      
    
      $.ajax({
        type:'POST',
        url: localurl + '/wp-admin/admin-ajax.php',
        data: {
            action: 'add_user_post',
            user_id: id,
            content,
            status,
            image,
        },  
        dataType: "json",
        success: function (response) {
          console.log(response);
          
          $('#post_text').val('');
          $('#post_text').css('height', '43px');
          $('#uploaded_image').val('');
          $('#output').css('background', 'none');
          Swal.fire({
            text: "Ваш пост успешно опубликован",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
          });
          setTimeout(
            ()=>{
                Swal.close();
            }, 2000
          );
          get_user_post(response.status, status);
          $("#public-post-btn").attr('disabled', false);
        },
       
        error: function (response) {
          Swal.fire({
            text: "Произошли ошибки",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok!",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
        }
      });
    }
});

$('#changeProfilePhoto').change(function(){
  let id = $(this).attr('data-user');
  if (this.files[0]) {
    var fr = new FileReader();
    fr.addEventListener("load", function(){
      $('#profilePhotoImg').attr('src',fr.result );
    }, false);
    fr.readAsDataURL(this.files[0]);
    let image = upload_files(this.files[0]);
    image_id = image.id;
    
    var formData = new FormData();
    formData.append('action', 'upload_uimage');
    formData.append('user_id', id);
    formData.append('image_id', image_id);
    jQuery.ajax({
      type:'POST',
      url: localurl + '/wp-admin/admin-ajax.php',
      dataType: "json",
      data: {
        action:'upload_profileimage',
        id: id,
        image: image_id
      },
      success: function (response) {
        
        Swal.fire({
          text: "Фото успешно изменено",
          icon: "success",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn btn-primary"
          }
        });
          setTimeout(
            ()=>{
                Swal.close();
            }, 2000
          );
        },
      error: function (response) {
        Swal.fire({
          text: "Произошли ошибки",
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn btn-primary"
          }
      });
      }
    });
  }
});

//удалить пост
$(document).on("click", '.delete-post', function(e){
  e.preventDefault();
  let id = $(this).attr('data-id');
  let item = $(this).attr('data-item');
  Swal.fire({
    title: 'Вы действительно хотите удалить пост?',
    
    showCancelButton: true,
    confirmButtonText: 'Да, удалить',
    cancelButtonText: 'Нет, оставить',
    customClass: {
      confirmButton: "btn btn-primary",
      cancelButton:"btn btn-secondary"
  }
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
          $.ajax({
              type:'POST',
              url: localurl + '/wp-admin/admin-ajax.php',
              dataType: "json",
              data: {
                action:'delete_user_post',
                id: id,
                
              },
              success: function (response) {
                $(item).remove();
                Swal.fire({
                  text: "Пост удален",
                  icon: "success",
                  buttonsStyling: false,
                  confirmButtonText: "Ok!",
                  customClass: {
                      confirmButton: "btn btn-primary"
                  }
                });

                  setTimeout(
                    ()=>{
                        Swal.close();
                    }, 2000
                  );
                },
              error: function (response) {
                Swal.fire({
                  text: "Произошли ошибки",
                  icon: "error",
                  buttonsStyling: false,
                  confirmButtonText: "Ok!",
                  customClass: {
                      confirmButton: "btn btn-primary"
                  }
              })
            }
          });
    
     
    } else  {
      Swal.fire('Пост не удален', '', 'info');
      setTimeout(
        ()=>{
            Swal.close();
        }, 2000
      );
    }
  })
})



//нажать ответить на коммент
$(document).on('click','.comments__answer', function(){
  let id = $(this).attr('data-comment');
  let post = $(this).attr('data-post');
  let name = $(this).attr('data-name');
  localStorage.setItem('name', name);
  localStorage.setItem('answer_to', id);
  let input = $('#comments-form-' + post + ' .form-control');
  input.val(name + ', ' + input.val());
  input.attr('data-answer', id);
});

//нажать отправить коммент
$(document).on('click', '.send-comment', function(e){
  e.preventDefault();
  $(this).attr('disabled', true); 
  let post = $(this).attr('data-post');
  
  input = $('#comments-form-' + post + ' .form-control');
  let l = 0;
  let attr = 0;
  if (input.attr('data-answer')!=''){
    l = localStorage.getItem('name').length;
    attr = localStorage.getItem('answer_to');
  }
  text = input.val();
  if ((input.val().length - l) > 0 ){
    send_comment(text, post, attr);
    input.val('');
  }
  else{
    Swal.fire({
      text: "Сообщение слишко короткое",
      icon: "error",
      buttonsStyling: false,
      confirmButtonText: "Ok!",
      customClass: {
          confirmButton: "btn btn-primary"
      }
  });
  setTimeout(
    ()=>{
        Swal.close();
    }, 2000
  );
  $(this).attr('disabled', false); 
  }
});

$('#subscribers_search').keyup(function() {
  let json = $('#subscribers_json').text();
  let newjs = JSON.parse(json);
  let list = $('#subscribers_list');

  let text = $(this).val();
  if($(this).val().length>3){
    list.empty();
    let result = searchtest(newjs, text);
    result.map(element => append_search_results(element, list))
  }
  else{
    list.empty();
    newjs.map(element => append_search_results(element, list))
  }

});


$('#subscribes_search').keyup(function() {
  let json = $('#subscribes_json').text();
  let newjs = JSON.parse(json);
  let list = $('#subscribes_list');

  let text = $(this).val();
  if($(this).val().length>3){
    list.empty();
    let result = searchtest(newjs, text);
    result.map(element => append_search_results(element, list))
  }
  else{
    list.empty();
    newjs.map(element => append_search_results(element, list))
  }

});



$('#change_prod_info').on('click', function(e){
  e.preventDefault();
  $('#user_info_values').hide();
  $('#user_form').show();
  let phone = $('#user_phone'), lPadd = phone.prev('.iti__flag-container').width() + 6;

  phone.css('padding-left', lPadd);
  $('.iti').css('width', "100%");
});

$('#user_prof_form').submit(function(e){
  e.preventDefault();
  let action =$(this).attr('action');
  let data = $(this).serialize() + '&action='+ action;
  console.log(data);
  $.ajax({
    url:ajaxurl,
    type:'POST',
    data,
    error: function (response) {
      Swal.fire({
        text: "Произошли ошибки",
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    
  },
  success: function(){
    console.log(data);
    location.reload();
  }
  })
});

if (localStorage.getItem('search-city') !== null){
  $('#search-city').attr('checked', true);
}
else{
  $('#search-city').attr('checked', false);
}

if (localStorage.getItem('search-sphera') !== null){
  $('#search-sphera').attr('checked', true);
}
else{
  $('#search-sphera').attr('checked', false);
}

$('#search-preferences').submit(function(e){
  e.preventDefault();
  if ($('#search-city').is(':checked')){
    localStorage.setItem('search-city', 1)   
  }
  else{
    localStorage.removeItem('search-city', 1)   
  }
  if ($('#search-sphera').is(':checked')){
    localStorage.setItem('search-sphera', 1);  
  }
  else{
    localStorage.removeItem('search-sphera');
  }
  $(this).addClass('d-none');
  $('#search_wrapper').removeClass('d-none');
  
});
$('#advanced-header-search').on('click', function(e){
  e.preventDefault();
  let url = $(this).attr('href');
      city = $('#header-search-city');
      sphera = $('#header-search-sphera');
      age_start = $('#header_date_number_start');
      age_end = $('#header_date_number_end');
      new_url =[];
  if(city && city.val().length > 0){
    new_url.push('city=' + city.val());
  }
  if(sphera && sphera.val() !==null){
    new_url.push('sphera=' + sphera.val());
  }
  if(age_start && age_start.val().length > 0){
    new_url.push('age_start=' + age_start.val());
  }
  if(age_end && age_end.val().length > 0){
    new_url.push('age_end=' + age_end.val());
  }
  window.location = url + (new_url.length>0 ? '?'+new_url.join('&'):'');
});


$('.btn-loadmore').on('click', function(){
  let _this = $(this);
  _this.html('<span class="fas fa-redo fa-spin"></span> Загрузка...'); // изменение кнопки 

  let data = {
      'action': 'loadmore',
      'query': _this.attr('data-param-posts'),
      'page': this_page,
      'tpl': _this.attr('data-tpl')
  }

  $.ajax({
      url: localurl + '/wp-admin/admin-ajax.php',
      data: data,
      type: 'POST',
      success:function(data){
          if (data) {
              _this.html('<span class="fas fa-redo"></span> Загрузить ещё');
              $('#posts-lists').append(data); // где вставить данные 
              this_page++;                      // увелич. номер страницы +1 
              if (this_page == _this.attr('data-max-pages')) {
                  _this.remove();               // удаляем кнопку, если последняя стр. 
              }
          } else {                              // если закончились посты 
              _this.remove();                   // удаляем кнопку 
          }
      }
});





});


if (document.getElementById('kt_card_widget_4_chart_custom')){
  var ctx = document.getElementById('kt_card_widget_4_chart_custom').getContext('2d');
  let users = get_users_ages();
  var myChart = new Chart(ctx, {
    
    type: 'doughnut',
    data: {
        labels: Object.keys(users),
        datasets: [{
            data: Object.values(users),
            backgroundColor: ['#e91e63', '#00e676', '#ff5722', '#1e88e5'],
            borderWidth: 0.5 ,
            borderColor: '#ddd',
            fontColor: '#B5B5C3'
        }]
    },
  
    options: {
      cutoutPercentage:80,
        title: {
            display: false,
          
            position: 'top',
            fontSize: 16,
            fontColor: '#ddd',
            padding: 10
        },
        legend: {
            display: true,
            position: 'right',
           
            labels: {
                boxWidth: 20,
                fontColor: '#B5B5C3',
                padding: 15,
                
            }
        },
        tooltips: {
            enabled: false
        },
        plugins: {
            datalabels: {
                color: '#111',
                textAlign: 'center',
              
                font: {
                    lineHeight: 1.6
                },
                formatter: function(value, context) {
                  return context.chart.data.labels[context.dataIndex] + value + '%';
                }
            }
        }
    }
  });
}

if (document.getElementById('kt_card_widget_4_chart_pkm_custom')){
  var ctx = document.getElementById('kt_card_widget_4_chart_pkm_custom').getContext('2d');
  let users = get_users_ages_pkm();
  var myChart = new Chart(ctx, {
    
    type: 'doughnut',
    data: {
        labels: Object.keys(users),
        datasets: [{
            data: Object.values(users),
            backgroundColor: ['#e91e63', '#00e676', '#ff5722', '#1e88e5'],
            borderWidth: 0.5 ,
            borderColor: '#ddd'
        }]
    },
  
    options: {
      cutoutPercentage:80,
        title: {
            display: false,
          
            position: 'top',
            fontSize: 16,
            fontColor: '#111',
            padding: 10
        },
        legend: {
            display: true,
            position: 'right',
           
            labels: {
                boxWidth: 20,
                fontColor: '#111',
                padding: 15,
                
            }
        },
        tooltips: {
            enabled: false
        },
        plugins: {
            datalabels: {
                color: '#111',
                textAlign: 'center',
              
                font: {
                    lineHeight: 1.6
                },
                formatter: function(value, context) {
                  return context.chart.data.labels[context.dataIndex] + value + '%';
                }
            }
        }
    }
  });
}



$('.make_user').on('click', function(e){
  e.preventDefault();
  let id = $(this).attr('data-id');
  Swal.fire({
    text: "Вы действительно хотите убрать пользователя из администраторов?",
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    confirmButtonText: "Да!",
    cancelButtonText: "Нет",
    customClass: {
        confirmButton: "btn fw-bold btn-danger",
        cancelButton: "btn fw-bold btn-active-light-primary"
    }
}).then(function (result) {
  if (result.value) {
      Swal.fire({
          text: "Пользователь больше не администатор",
          icon: "success",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn fw-bold btn-primary",
          }
      }).then(function () {
          // Remove current row
         
          $.ajax({
              type:'POST',
              url: localurl + "/wp-admin/admin-ajax.php",
              data:{
                  action: 'make_user_user',
                  user: id,
              },
              success:function(respone){
                  location.reload();
              },
              error: function(resp){
                  console.log(resp)
              }

          })
      });
  } else if (result.dismiss === 'cancel') {
      Swal.fire({
          text: "Пользователь не был изменен.",
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn fw-bold btn-primary",
          }
      });
  }
});
});




$('.make_admin').on('click', function(e){
  e.preventDefault();
  let id = $(this).attr('data-id');
  Swal.fire({
    text: "Вы действительно хотите сделать пользователя администратором?",
    icon: "warning",
    showCancelButton: true,
    buttonsStyling: false,
    confirmButtonText: "Да!",
    cancelButtonText: "Нет",
    customClass: {
        confirmButton: "btn fw-bold btn-danger",
        cancelButton: "btn fw-bold btn-active-light-primary"
    }
}).then(function (result) {
  if (result.value) {
      Swal.fire({
          text: "Пользователь - администратор",
          icon: "success",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn fw-bold btn-primary",
          }
      }).then(function () {
          // Remove current row
         
          $.ajax({
              type:'POST',
              url: localurl + "/wp-admin/admin-ajax.php",
              async:false,
              data:{
                  action: 'make_user_admin',
                  user: id,
              },
              success:function(respone){
                setTimeout(
                  ()=>{
                      Swal.close();
                      location.reload();
                  }, 2000
                );
              },
              error: function(resp){
                  console.log(resp)
              }

          })
      });
      
  } else if (result.dismiss === 'cancel') {
      Swal.fire({
          text: "Пользователь не был изменен.",
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn fw-bold btn-primary",
          }
      });
  }
});




});

$(".money_input").keyup(function(){
  discharge($(this));
});
if ($(".money_input").length){
  discharge($(".money_input"));
}



$('.show_comments').on('click', function(e){
	e.preventDefault();
	let postId = $(this).attr('data-id');
	let t = $(this);
	$.ajax({
		type:'POST',
		url: localurl + "/wp-admin/admin-ajax.php",
		data:{
			 action: 'get_comments',
			 post_id: postId,
		},
		success:function(response){
			t.children('.spinner-border').removeClass('d-none');
			let json = JSON.parse(response);
			$('#user-post-'+postId+' .commets__list').empty();
			json.forEach(element => {

				let html = make_comment(element);
				$('#user-post-'+postId+' .commets__list').append(html);
			});
			
		},
		complete:function(response){
			t.remove();
		},
		error: function(resp){
			 console.log(resp)
		}

  })
})


$('.del_notification').on('click', function(e){
  e.preventDefault();

  let notificationId = $(this).attr('notificationId');
  let notificationContent = $(this).attr('notificationContent');
  let t = $(this).parent();

  t.css('opacity','0.3'); 

  $.ajax({
    type:'POST',
    url: localurl + "/wp-admin/admin-ajax.php",
    data:{
       action: 'del_notifications',
       notification_id: notificationId,
       notification_content:notificationContent,
    },
    success:function(response){
     console.log(response);
     //t.remove();
     console.log(t);      
    },
    complete:function(response){
      t.remove();
    },
    error: function(resp){
       console.log(resp)
    }

  })
})


}); // document ready

function discharge(input){
  input.val(String(input.val().replace(/[^0-9.]/g,'')).replace(/\B(?=(\d{3})+(?!\d))/g, " "));
}



function get_users_ages(){
  let users = [];
  $.ajax({
    url: localurl + '/wp-admin/admin-ajax.php',
    data: {
      action:'get_users_ages',
    },
    async:false,
    type: 'POST',
    success: function(response){
        console.log(response);
        users = JSON.parse(response);
        let sum = 0;

    },
    error: function(respone){
      console.log(respone.error);
    }
  })
  
  return users;
}

function get_users_ages_pkm(){
  let users = [];
  $.ajax({
    url: localurl + '/wp-admin/admin-ajax.php',
    data: {
      action:'get_users_ages_pkm',
    },
    async:false,
    type: 'POST',
    success: function(response){
        console.log(response);
        users = JSON.parse(response);
    },
    error: function(respone){
      console.log(respone.error);
    }
  })
  return users;
}

function searchtest(obj, search) {
  let newobj = obj.filter(el => el.name.toLowerCase().includes(search.toLowerCase()));
  return newobj;
}

function append_search_results(element, list){
  console.log(typeof(element.image));
  let image = '';
  if (element.image!=='null'){
    image = element.image;
  }
  html = ' <div class="d-flex align-items-center mb-5">';
  html += '<div class="symbol symbol-40px me-4">';
  html += '<span class="symbol-label bg-light ">';
  html += '<img src="'+image+'" alt="">';
  html += '		</span>';
  html += '</div>';
  html += '	<div class="d-flex flex-column">';
  html += '<a href="'+element.url+'" class="fs-6 text-gray-800 text-hover-primary fw-bold">'+element.name+'</a>';
	html += '	<div class="d-flex align-items-center">';
  html += '	<span class="comment ">'+element.city+'</span>';
  html += '	<span class="comment ">'+element.sphera+'</span>';
  html += '	</div>';
  html += '	</div>';
  html += '	</div>';
 	list.append(html);
  console.log(html)											
																		
}

function apend_header_search_results(element, res){
  console.log(element);
  let html ='';
   html ='<a href="/author/'+element.nice+'" class="d-flex text-dark text-hover-primary align-items-center mb-5">';  
   html +=   '<div class="symbol symbol-40px me-4">';
   html +=    '<img src=" ';
   html +=      element.photo && element.photo
   html +=    '" alt="">';
   html +=   '</div>'
   
   html +=    '<div class="d-flex flex-column justify-content-start fw-bold">';
   html +=       '<div class="fs-6 fw-bold">';
   html +=        element.last_name && element.last_name+' ';
   html +=        element.first_name && element.first_name+ ' ';
   html +=        element.fathers_name && element.fathers_name;
   html += ' </div>';
   html +=     ' <span class="fs-7 fw-bold text-muted">';
   html +=   element.sphera && element.sphera;
   html +='</span>';
   html +=   ' </div> </a>';


   res.append(html);
  }

function send_comment(text, post_id, answer){

  $.ajax({
    type : 'POST',
    url: ajaxurl,
    data:{
      action: 'sendcomment',
      text:text,
      post: post_id,
      answer
    },
      error: function (response) {
        Swal.fire({
          text: "Произошли ошибки",
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Ok!",
          customClass: {
              confirmButton: "btn btn-primary"
          }
      });
      $('.send-comment').attr('disabled', false); 
    },
    success:function(response) {
      if (response!=='Обнаружен дубликат комментария. Кажется, вы уже сказали это!' || response!=='Вы комментируете слишком быстро. Попридержите коней.' || response!=="Обнаружен дубликат комментария. Кажется, вы уже сказали это!"){
      
      html = make_comment(response);
      // if (answer == 0){
        $('#user-post-'+post_id+' .commets__list').prepend(html);
      // }
      // else{
      //   if ($('#comment-'+answer + '>.children').length){
      //     $('#comment-'+answer + '>.children').append(html)
      //   }
      //   else{
      //    let ul= $('<ul class="children">'+html+'</ul>')
      //    $('#comment-'+answer).append(ul);
      //   }
      // }
    }
    else{
      $('.send-comment').attr('disabled', false); 
      Swal.fire({
        text: response,
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    };
    $('.commets__list .form-control').val('');
    $('.form-control').attr('data-answer', '');
    $('#posts-lists .send-comment').attr('disabled', false);
    localStorage.removeItem('name');
    localStorage.removeItem('answer_to');
  }});




}

function make_comment(response){
	console.log(response);
  try {
	r = response;
	if (typeof(response)!='object'){
		r = JSON.parse(response);
	}
	
  html= '<li class="comment byuser even thread-even depth-1 comments__item main-comment d-flex flex-column" id="comment-'+r.comment_id+'">';
	html+= '			<div class="d-flex">';
	html+= 					'<div class="comments__avatar">';
	html+=						'<div class="author-image lazy" style="background:url('+r.user_photo+')">';
  html+=							'</div>';
	html+=				'	</div>';
	html+=						'<div class="comments_body d-flex flex-column flex-grow-1">';
	html+=					'<a href="'+r.author_link +'" data-name="'+r.user_lastname+'" class="comments__name">';
	html+=						r.user_name+' ' + r.user_lastname +					'	</a>';
	html+=					'	<div class="comments__text">';
	html+=							r.text;
	html+=						'	</div>';
	html+=						'<div class="comments__data d-flex align-items-center">';
	html+=							'<span class="data">';
	html+=								r.date.replace(/'/g, '')	+ '</span>';
	html+=						'	<button class="comments__answer" data-name="'+r.user_name+'" data-comment="'+r.comment_id+'" data-post="'+r.post_id+'">';
	html+=							'	Ответить';
	html+=							'</button>';
	html+=							'</div>';
	html+=						'</div> </div></li>';
  return html;
  }
  catch{
    $('.send-comment').attr('disabled', false); 
    Swal.fire({
      text: response,
      icon: "error",
      buttonsStyling: false,
      confirmButtonText: "Ok!",
      customClass: {
          confirmButton: "btn btn-primary"
      }
  });
  }
}


//получить посты пользователя
  function get_user_post(id, status){
    $.ajax({
      url: localurl + '/wp-admin/admin-ajax.php',
      type:'POST',
      dataType: "json",
      data:{
        action:'get_user_post',
        id
      },
      success: function(response){
        console.log(response.post);
        console.log(status);
        let flink = $('#filter-links .active').attr('data-filter');
        if (flink == status){
          $('#posts-lists').prepend(response.post);
        }
      },
      error: function (response) {
        console.log(response.error);
      }
    })
  }
//загрузка файлов
  function upload_files(files, input){

    var formData = new FormData();
    formData.append('updoc', files);
    formData.append('action', 'questiondatahtml');
    let r =$.ajax({
          url: ajaxurl,
          async:false,
          type: 'POST',
          dataType: "json",
          data:formData,
          cache: false,
          processData: false, // Don’t process the files
          contentType: false, // Set content type to false as jQuery will tell the server its a query string request
          success:function(data) {
            return data;
          },
          error: function (response) {
            console.log(response.error);
          }
    });
    return r.responseJSON;
  }
//фильтр постов пользователя
  function  filter_users_posts(user, target){
    let block = $('#posts-lists');
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      dataType: "json",
      data:{
        action:'filter_users_posts',
        user,
        target
      },
      success:function(response){
        block.empty();
        response.post.map((post)=> block.prepend(post))
      },
      error:function(response){
        console.log(response.error);
      }
    })
  }


 function get_zar_rezults(){
  let result = [];
  $.ajax({
    url: localurl + "/wp-admin/admin-ajax.php",
    data: {
      action:'get_analitic_zar'
    },
    async: false,
    success: function(response){
     

     result = JSON.parse(response);
    },
    error:function(response){
      console.log(response.error);
    }
  })
  return result;
 }

 function get_zar_rezults_pkm(){
  let result = [];
  $.ajax({
    url: localurl + "/wp-admin/admin-ajax.php",
    data: {
      action:'get_analitic_zar_pkm'
    },
    async: false,
    success: function(response){
     

     result = JSON.parse(response);
    },
    error:function(response){
      console.log(response.error);
    }
  })
  return result;
 }
  

