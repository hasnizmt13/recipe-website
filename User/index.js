$(window).ready(function() {
    setTimeout(function(){
        //window.location.reload();
    },30000);
})
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

