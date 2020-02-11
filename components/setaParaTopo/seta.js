window.addEventListener('DOMContentLoaded', (event) => {

    const seta = document.querySelector('#voltarTopo');
    window.addEventListener('scroll', (event) => {
        if (window.scrollY > 300) {
            seta.classList.remove('d-none')
        } else {
            seta.classList.add('d-none')
        }
    });

    seta.addEventListener('click', (event) => {
        window.scrollTo({ top: 0, behavior: 'smooth' })
    });

});


