$('.quod').hover(function(){
    $('.flyout').show();
},function(){
    $('.quod').hide();
});

 $('.col-md-4 event-grid').hover(
        function () {
            $('.quod').fadeIn();
        },
        function () {
            $('.quod').fadeOut();
        }
    );