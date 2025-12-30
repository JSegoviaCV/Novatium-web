(function ($) {
    "use strict";

    // ACTIVACIÓN DE MENÚS DESPLEGABLES (PC)
    const initMenus = () => {
        var dropdowns = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdowns.map(function (btn) {
            return new bootstrap.Dropdown(btn);
        });
    };

    $(document).ready(function() {
        initMenus(); // Activa el menú de Servicios en PC

        // Actualizar año del footer
        const year = new Date().getFullYear();
        if ($('#current-year').length) $('#current-year').text(year);
    });

    // EFECTO HOVER EN PC (Abre el menú al pasar el mouse)
    if (window.innerWidth > 992) {
        $('.dropdown').hover(
            function() { $(this).find('.dropdown-menu').addClass('show'); },
            function() { $(this).find('.dropdown-menu').removeClass('show'); }
        );
    }

    // NAVBAR STICKY AL HACER SCROLL
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });

})(jQuery);