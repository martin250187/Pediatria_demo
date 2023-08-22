var peso = 0;
var talla = 0;
var imc = 0;

document.getElementById('talla').addEventListener('change', function(){
    peso = document.getElementById('peso').value;
    talla = (document.getElementById('talla').value)/100;
    imc = peso/(talla*talla);
    
    //alert (imc)
    document.getElementById('imc').value = imc.toFixed(3);
    
});
hoy = new Date();
document.getElementById('motivo_consulta').addEventListener('focus', function(){
document.getElementById('fecha_consulta').value = hoy;
});