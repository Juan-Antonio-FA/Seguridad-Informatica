//Utilizamos un try - catch para que nos informe si hay errores
try {
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("registroForm").addEventListener("submit", function(event) {
            event.preventDefault();
    
            // Capturar los datos del formulario en un objeto
            var formData = {
                nombre: document.getElementById("nombre").value,
                apellido: document.getElementById("apellido").value,
                email: document.getElementById("email").value,
                password: document.getElementById("password").value,
                fnac: document.getElementById("fnac").value,
                numtel: document.getElementById("numtel").value,
                lnac: document.getElementById("lnac").value,
                genero: document.getElementById("genero").value
            };
    
            //Imprimimos el objeto, por costumbre y validar si hay errores
            console.log(formData);
    
            // Envío los datos al servidor PHP usando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "guardar_datos.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Manejar la respuesta del servidor si es necesario
                        console.log(xhr.responseText);
                    } else {
                        console.error('Hubo un problema al enviar los datos al servidor.');
                    }
                }
            };
            xhr.send(JSON.stringify(formData));
        });
    });    
    
//Si existiera algun error se detiene la ejecución y nos muestra el error
} catch (error) {
    console.log(error);
}