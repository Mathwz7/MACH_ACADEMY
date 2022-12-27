const cursosContainer = [...document.querySelectorAll('.container-cursos')];
const proxBtn = [...document.querySelectorAll('.prox-btn')];
const antBtn = [...document.querySelectorAll('.ant-btn')];

cursosContainer.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    proxBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    antBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})