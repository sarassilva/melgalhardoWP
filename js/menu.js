//menu collapsed
$(function () { 
    if($(window).width() <= 899){
    $("button.title, .footer h2").click(function() {        
        $(this).next().toggle();

        if($('.menu .hide-links:visible').length > 1) {
            $('.menu .hide-links:visible').hide();
            $(this).next().show();
        }
    }); 
}
});

//menu toggle btn
const menu = document.querySelector('.mobile-content');
function menuMobile() {
    menu.classList.toggle('show');
}

//help center btn
const help = document.querySelector('.help-center');
const helpLink = document.querySelectorAll('.help-link');

helpLink.forEach(hLink => {
    hLink.addEventListener('click', () => {
        help.classList.toggle('show');
    })
});
