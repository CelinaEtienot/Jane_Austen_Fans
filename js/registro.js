
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('loginForm');
        if (form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar el envío por defecto del formulario

                const nombre = document.getElementById('nombre').value;
                const año = document.getElementById('año').value;
                const descripcion = document.getElementById('descripcion').value;
                const genero = document.getElementById('genero').value;
                const director = document.getElementById('director').value;
                const valoracion = document.getElementById('valoracion').value;

                // Validación básica (puedes agregar más validaciones según sea necesario)
                if (nombre && año && descripcion && genero && director && valoracion) {
                    // Envío del formulario
                    form.submit();
                } else {
                    // Mostrar SweetAlert si no se completan todos los campos
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Por favor, completa todos los campos del formulario.',
                    });
                }
            });
        }
    });

