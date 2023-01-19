$(window).ready(function() {
    setTimeout(function(){
      //  window.location.reload();
    },50000);
})
$(document).ready(function () {
    $('#table1').DataTable();
    $('#table2').DataTable();
    $('#tableNews').DataTable();
    $('#tableUser').DataTable();
    $('#tableNutrition').DataTable();
});
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}