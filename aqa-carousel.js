jQuery(document).ready(function ($) {
    $('#carousel-gallery').removeClass('carousel-no-js');
    $('#carousel-gallery').addClass('carousel-js-on');
    $('#carousel-gallery').flickity({
        wrapAround: true,
        freeScroll: true,
        pageDots: false,
        imagesLoaded: true,
        setGallerySize: false,
    });
});