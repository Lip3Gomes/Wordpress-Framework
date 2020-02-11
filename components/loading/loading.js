window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('loadingModal').classList.add('d-block');
});

window.addEventListener('load', (event) => {
    document.getElementById('loadingModal').classList.remove('d-block');
});