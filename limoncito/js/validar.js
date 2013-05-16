function validar_numeros(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[0-9\x]/;  // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 
function validar_hora(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[0-9:\x]/;  // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 
function validar_fecha(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[0-9-\x]/;  // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 
