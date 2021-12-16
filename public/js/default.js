AOS.init();

$(document).ready(function () {

    $(window).scroll(function () {
        navigasi = document.querySelector(".navbar");
        var scroll = $(window).scrollTop();
        if (scroll > 100) {
            navigasi.classList.add("scroll");
        } else {
            navigasi.classList.remove("scroll");
        }
    });

    $(".nav-link").click(function (event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;
            $("html, body").animate({
                    scrollTop: $(hash).offset().top - 50,
                },
                800
            );
        }
    });

    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $(this).toggleClass("active");
    });
    $('[data-toggle="tooltip"]').tooltip();
    $(".btn-add").click(function () {
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click", ".btn-delete", function () {
        $(this).parents(".control-group").remove();
    });
    $('.xzoom, .xzoom-gallery').xzoom({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        Xoffset: 50,
        position: 'right'

    });
    $('#card-keterangan a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
});
