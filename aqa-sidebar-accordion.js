jQuery(document).ready(function ($) {
    // autoclose all titled widgets.
    $('#widget-area h2').siblings().hide();

    // uncomment the following command to have the first widget open by default
    // (this has no effect if the first widget has no title):
    // $( '#widget-area aside:first-child h2' ).toggleClass( 'tab-opened' ).siblings().show();

    // open/close titled widgets on click
    $('#widget-area h2').click(function () {
        $(this).siblings().slideToggle();
        $(this).toggleClass('tab-opened');
    });
});