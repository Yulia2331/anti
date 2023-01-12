const tabs = document.querySelector(".content-materials-block__tabs");
const reviewBtn = document.querySelector(".review-btn");
const curriculumBtn = document.querySelector(".curriculum-btn");

const curriculum = document.querySelector(".curriculum");
const review = document.querySelector(".review");

try{
curriculumBtn.addEventListener('click', () => {
  review.classList.add("content-none")
  review.classList.remove("content-block")
  reviewBtn.classList.remove("active-tab")

  curriculum.classList.remove("content-none")
  curriculum.classList.add("content-block")
  curriculumBtn.classList.add("active-tab")
})

reviewBtn.addEventListener('click', () => {
  review.classList.remove("content-none")
  review.classList.add("content-block")
  reviewBtn.classList.add("active-tab")

  curriculum.classList.add("content-none")
  curriculum.classList.remove("content-block")
  curriculumBtn.classList.remove("active-tab")
})
}catch{}