const myTimeout = setTimeout(time, 500);
const dias = [
  "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", 
];
const meses = [
  "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
  "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre",
];

                function time() {
                    hoy = new Date();
                    año = hoy.getFullYear();
                    mes = hoy.getMonth();
                    dia = hoy.getDate();
                    hora = hoy.getHours();         
                    min = hoy.getMinutes();        
                    sec = hoy.getSeconds();
                    
                    if (hora   < 10) {hora   = "0"+hora;}
                    if (min < 10) {min = "0"+min;}
                    if (sec < 10) {sec = "0"+sec;}
                    document.getElementById('hoy').innerHTML= 'Actualización: '+dias[hoy.getDay()]+' '+dia+' de '+meses[hoy.getMonth()]+' de '+año+', '+hora+':'+min+':'+sec+' hs.';
                }