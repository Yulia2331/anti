function upload(selector) {
  const input = document.querySelector(selector)
  const open = document.querySelector('.module-block__btn')

  const filesBlock = document.querySelector('.module-block__all-files ')


  const triggerInput = () => input.click()

  const changeHeadler = event => {
    if (!event.target.files.length) {
      return
    }

    const files = event.target.files[0].name

    filesBlock.innerHTML = ''

    filesBlock.insertAdjacentHTML('afterbegin', `

      <div class="module-block__file">
        <div class="module-block__link">
          <div class="module-block__doc container__icon--18"><i class="fa-solid fa-file"></i></div>
          <div class="module-block__name">${files}</div>
          <button class="module-block__file-remove" data-name="${files}">
            <div class="container__icon--18"><i class="fa-solid fa-xmark"></i></div>
          </button>
        </div>
      </div>

    `)

    input.value = null
  }

  const removeHeandler = event => {
    if (!event.target.dataset.name) {
      return
    }

    const {name} = event.target.dataset

    const block = filesBlock
    .querySelector(`[data-name="${name}"]`)
    .closest('.module-block__file')

    block.remove()
  }

  open.addEventListener('click', triggerInput)
  input.addEventListener('change', changeHeadler)
  filesBlock.addEventListener('click', removeHeandler)
}

//upload('#open-file')


function show_me(){

  let reader = new FileReader();

  let input = document.querySelector('#open-file');
  let filesBlock = document.querySelector('.module-block__all-files ');

  let arr = document.querySelector(
            '.comment-form-attachment__input'
          )

  function triggerInput(){
    //console.log('work');
    // let arr = document.querySelector(
    //         '.comment-form-attachment__input'
    //       ).files;
    console.log(arr.files);
    addfile(arr);
  }


  function addfile(arr){
    filesBlock.innerHTML = '';

    arr.files.forEach(item =>{

      console.log(item.name);

      filesBlock.insertAdjacentHTML('afterbegin', `

      <div class="module-block__file">
        <div class="module-block__link">
          <div class="module-block__doc container__icon--18"><i class="fa-solid fa-file"></i></div>
          <div class="module-block__name">${item.name}</div>
          <button class="module-block__file-remove" data-name="${item.name}">
            <div class="container__icon--18"><i class="fa-solid fa-xmark"></i></div>
          </button>
        </div>
      </div>

    `);
        
    });

  }

  const removeHeandler = event => {    

    if (!event.target.dataset.name) {
      return
    }
    let {name} = event.target.dataset;

    const block = filesBlock
    .querySelector(`[data-name="${name}"]`)
    .closest('.module-block__file');

    block.remove();

    const fileListArr = Array.from(arr.files);
    let index=0;

    Array.from(arr.files).forEach(item =>{  
      

      if(item.name == {name}.name){
        console.log(fileListArr);
        console.log({name}.name);
        console.log('delete| '+index);

        fileListArr.splice(index, 1);

        console.log(fileListArr);
        //document.querySelector('.comment-form-attachment__input').files = fileListArr;
        //console.log(document.querySelector('.comment-form-attachment__input').files);
      }
      index = index+1;
    });
  }

  arr.addEventListener('change', triggerInput);
  filesBlock.addEventListener('click', removeHeandler)


}

show_me();
