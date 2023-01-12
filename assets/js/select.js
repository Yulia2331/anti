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
            console.log(item.id);
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

    // основная функция
    function selectToggle () {
       
        hideAll(tutorials,this.dataset.tab);
       
        let tutorial = document.getElementById(this.dataset.tab);
        tutorial.style.display = 'block';

        disableAll(buttons);
        this.classList.add('tab_active');
    }
}
tutorial('.tutor_btn','.tutorial');



