function imprimirOrden() {
    var cantidad = $('#cantidadOrdenes').val();
    var nroOrden= $('#ultimoNro').val();

    console.log(cantidad, nroOrden);


}

function crearOrden() {
    var cantidad = $('#cantidadOrdenes').val();
    var nroOrden= $('#ultimoNro').val();

    console.log(cantidad, nroOrden);
    //$('#btnOrden').hide();
    $('#btnImprimir').toggle(300);

    $('#formOrdenes').form('submit', {
        url: 'backend/cargarOrden.php?nroOrden='+$('#ultimoNro').val()+'&'+'cantidad'+$('#cantidadOrdenes').val(),
        onsubmit: function (){
            return $(this).form('validate');
        },
        success: function (result){
            var result = eval('('+result+')');

            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
        } else {
                ultimoNumero();
            }
        }
    })
}

function ultimoNumero() {
    $.ajax({
        method: "GET",
        url: "backend/ultimoNro.php",
    }).done(function (datos) {

        $('#ultimoNro').val(datos);

        console.log(datos);
    });
}

$(function () {

    $('#btnImprimir').hide();
    ultimoNumero();

    //Boton Expedientes
    $(".open-dropdown").click(function(){
        document.getElementById('icono').addEventListener('click', function () {
            var icono = document.getElementById('icono');
            icono.classList.toggle('fa-folder-open-o');
            icono.classList.toggle('fa-folder-o');
        });
        $(this).next( "ul.dropdown" ).toggleClass('d-none');

    });

    //JS Template
    /////////////////
    /////////////////
    // init feather icons
    feather.replace();

    // init tooltip & popovers
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    //page scroll
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 20
        }, 1000);
        event.preventDefault();
    });

    // slick slider
    $('.slick-about').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false
    });

    //toggle scroll menu
    var scrollTop = 0;
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        //adjust menu background
        if (scroll > 80) {
            if (scroll > scrollTop) {
                $('.smart-scroll').addClass('scrolling').removeClass('up');
            } else {
                $('.smart-scroll').addClass('up');
            }
        } else {
            // remove if scroll = scrollTop
            $('.smart-scroll').removeClass('scrolling').removeClass('up');
        }

        scrollTop = scroll;

        // adjust scroll to top
        if (scroll >= 600) {
            $('.scroll-top').addClass('active');
        } else {
            $('.scroll-top').removeClass('active');
        }
        return false;
    });

    // scroll top top
    $('.scroll-top').click(function () {
        $('html, body').stop().animate({
            scrollTop: 0
        }, 1000);
    });

    /**Theme switcher - DEMO PURPOSE ONLY */
    $('.switcher-trigger').click(function () {
        $('.switcher-wrap').toggleClass('active');
    });
    $('.color-switcher ul li').click(function () {
        var color = $(this).attr('data-color');
        $('#theme-color').attr("href", "css/" + color + ".css");
        $('.color-switcher ul li').removeClass('active');
        $(this).addClass('active');
    });
});



function consultarNumero () {

}