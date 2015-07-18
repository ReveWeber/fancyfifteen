jQuery(document).ready(function($) {
        $( '#album-selector' ).addClass( 'album-with-js' );
        $( '#mla-parent-categories' ).hide();
        $( '#album-button' ).click( function() {
                $( '#mla-parent-categories' ).slideToggle();
        });

        $( '#mla-parent-categories a' ).click( function( e ) {
                e.preventDefault();
                var albumUrl = '?album=' + $(this).attr( 'data-slug' );
                var albumSource = albumUrl + ' #current-album';
                $( '#current-album-wrapper' ).load( albumSource );
                $( '#mla-parent-categories' ).hide();
                window.history.pushState( '', '', albumUrl );
        });
});
