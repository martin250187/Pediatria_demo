var edadCalculada;
var m;
hoy = new Date();
var nacimiento;

document.getElementById('fecha_nac').addEventListener('change', function(){
    nacimiento = new Date(document.getElementById('fecha_nac').value);
    edadCalculada = hoy.getFullYear() - nacimiento.getFullYear();
    m = hoy.getMonth() - nacimiento.getMonth();

    if (edadCalculada > 0 ) {
        document.getElementById('edad').value = `${edadCalculada}`;
        document.getElementById('uni_edad').value = 'Años';
    }
    else if(edadCalculada === 0){
        document.getElementById('edad').value = `${m}`;
        document.getElementById('uni_edad').value = 'Meses';
    }
})
document.getElementById('nombre').addEventListener('focus', function(){
document.getElementById('fecha_reg').value = hoy;
});