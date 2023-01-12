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

upload('#open-file')