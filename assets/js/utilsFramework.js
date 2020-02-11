
async function instanciarCarosuel(seletor) {
    jQuery(seletor).owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
}
async function dataMask(seletor = '.date', format = '00/00/0000') {
    jQuery(seletor).mask(format);
}
async function timeMask(seletor = '.date_time', format = '00/00/0000 00:00:00') {
    jQuery(seletor).mask(format);
}
async function cepMask(seletor = '.cep', format = '00000-000') {
    jQuery(seletor).mask(format);
}
async function phoneMask(seletor = '.phone', format = '(00) 0 0000-0000') {
    jQuery(seletor).mask(format);
}
async function cpfMask(seletor = '.cpf', format = '000.000.000-00') {
    jQuery(seletor).mask(format, { reverse: true });
}
async function cnpjMask(seletor = '.cnpj', format = '00.000.000/0000-00') {
    jQuery(seletor).mask(format, { reverse: true });
}
async function moneyMask(seletor = '.money', format = '#.##0,00') {
    jQuery(seletor).mask(format, { reverse: true });
}

