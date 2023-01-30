let select = function () {
  let selectHeader = document.querySelectorAll('.select__header');
  let selectItem = document.querySelectorAll('.select__item');

  selectHeader.forEach(item =>{
      item.addEventListener('click', selectToggle)
  });

  selectItem.forEach(item =>{
      item.addEventListener('click', selectChoose)
  });

  function selectToggle () {
      this.parentElement.classList.toggle('select-active');
  }

  function selectChoose () {
      let text = this.innerText,
          select = this.closest('.select'),
          currentText = select.querySelector('.select__current');
      currentText.innerText = text;
      select.classList.remove('select-active');
  }
};

select();



let module = function (point, active) {
  let curriculumHeader = document.querySelectorAll(point);

  curriculumHeader.forEach(item =>{
      item.addEventListener('click', selectToggle)
  });

  function selectToggle () {
      this.parentElement.classList.toggle(active);
  }
};

module('.curriculum__header', 'curriculum-active');
module('.module-block__header', 'module-block-active');


// смотрим кнопки и контент скрываем контент в зависимости от нажатой кнопки !)
let tutorial = function(button,content){
    let buttons = document.querySelectorAll(button);
    let tutorials = document.querySelectorAll(content);

    // вешаем слушателя на все кнопки
    buttons.forEach(item =>{
        item.addEventListener('click', selectToggle)
    });

    // скрываем весь контент одного модуля
    function hideAll(blocks,modul){
        blocks.forEach(item =>{
            //console.log(item.id);
            if (moduleId(modul) == moduleId(item.id)){
              item.style.display = 'none';
            }            
        });
    }

    // получаем имя модуля
    function moduleId(modul){
      let arr = modul.split('_');      
      return arr[0];
    }

    // меняем активную вкладку
    function disableAll(elements){
        elements.forEach(item =>{                    
            item.classList.remove('tab_active');
        });        
    }

    // Выводим время модуля
    function show_time(idtab,idmodul){
        //let time_head = this.parentNode.querySelectorAll('.module-block__time'); 
        let time_head = idtab.parentNode.parentNode.parentNode.parentNode.parentNode.children[0].querySelectorAll('.module-block__time');
        console.log(time_head);
        let flag = true;
        //console.log(idmodul);
        console.log(arr_deadline);
        arr_deadline.forEach(item =>{
            
            //console.log(idmodul);
            //console.log(item[0]);

            if(item[0] == idmodul){
                console.log(item[1]);
                console.log(time_head[0]);              
                time_head[0].innerHTML = item[1];
                flag = false;
            }     
            //time_head[0].innerHTML = '0 д - 0 ч - 0 мин';   
        });

        if(flag){
           time_head[0].innerHTML = 'Бессрочно!'; 
        }
    }

    // основная функция
    function selectToggle () {

        //console.log(arr_deadline);
       
        hideAll(tutorials,this.dataset.tab);
       
        let tutorial = document.getElementById(this.dataset.tab);
        tutorial.style.display = 'block';
        show_time(this,this.dataset.id);

        disableAll(buttons);
        this.classList.add('tab_active');
    }
}
tutorial('.tutor_btn','.tutorial');



