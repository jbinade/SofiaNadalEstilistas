function cargarServicios(categoria) {
    if (categoria == "") {
        document.getElementById("servicio").innerHTML = '<option value="">Selecciona un servicio</option>';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "obtener_servicios.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("servicio").innerHTML = xhr.responseText;
        }
    };
    xhr.send("categoria=" + categoria);
}