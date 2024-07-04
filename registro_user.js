document.getElementById('Registo_usuario').addEventListener('submit', function(event) {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const correo = document.getElementById('correo').value;
    const password = document.getElementById('password').value;
    const nacimiento = document.getElementById('nacimiento').value;
    const pais = document.getElementById('pais').value;

    if (nombre === "" || apellido === "" || correo === "" || password === "" || nacimiento === "" || pais === "") {
        Swal.fire({
            title: 'Error',
            text: 'Por favor, completa todos los campos.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } else {
        Swal.fire({
            title: 'Éxito',
            text: 'El usuario ha sido registrado correctamente.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            document.getElementById('Registo_usuario').submit();
        });
    }
});
