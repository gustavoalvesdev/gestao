$(function(){
    
    //$('[name=parcelas], [name=intervalo]').mask('99');

    $('[name=valor]').maskMoney({
        prefix: 'R$ ', 
        allowNegative: false, 
        thousands: '.',
        decimal: ',',
        affixesStay: false
    })

})