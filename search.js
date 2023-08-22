$(document).ready(function(){
    
    $('#searchBtn1').click(function(e){
        e.preventDefault();
        location.href ='buscarpacientes.php?search=' + $('#inputSearch').val();
        //alert($('#inputSearch').val())
    })
    $('#searchBtn2').click(function(e){
        e.preventDefault();
        location.href ='buscarturnos.php?search=' + $('#inputSearch').val();
        //alert($('#inputSearch').val())
    })

}); //End Ready


function search(){
    //location.href ='buscar.php?search=' + $('#inputSearch').val();
    //alert($('#inputSearch').val())
}
/*
function getUrl(){
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - (loc.pathname + loc.search + loc.hash).length - pathName.length)
}*/