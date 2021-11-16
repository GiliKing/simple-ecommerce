const openBtn = document.querySelector(".js-open");
const modalBg = document.getElementsByTagName("div")[0];
const modalBox = document.getElementsByTagName("div")[1];


openBtn.addEventListener('click', function(event) {
    event.preventDefault()
    modalBg.classList.add("active")
    modalBox.classList.add("active")
})

const closeBtns = document.querySelectorAll(".js-close");

closeBtns.forEach(node => {
    node.addEventListener('click', function(e) {
        e.preventDefault()
        modalBg.classList.remove("active")
        modalBox.classList.remove("active")
    })
})