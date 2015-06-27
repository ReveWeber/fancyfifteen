jQuery(document).ready(function ($) {
    if ($('#sidebar').css('position') == 'fixed') {
        //$('#pretty-scroll').css('position', 'relative');
        $('#pretty-scroll').addClass('hide-scroll');
        $('#sidebar').addClass('hide-scroll');
        var windowHeight = $(window).height();
        $('#pretty-scroll').slimScroll({
            height: windowHeight + 'px',
            color: '#333',
        });
    }
});