
$( document ).ready(function() {
    let newArr = {
        items: [{
            id: null,
            title: '',
            name1: 'Премиум',
            name2: 'AJAX SmartHome'
        },
            {
                id: null,
                title: 'Охранная компания',
                name1: '12 месяев обслуживания111',
                name2: 'ООО “Зубряков Охрана Компания Ва'
            }],
        sum: '10 000'
    };
    window.itd_basket.$set({items:newArr.items});
});