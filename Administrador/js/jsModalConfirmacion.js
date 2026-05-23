// Función para mostrar el modal
function mostrarModalConfirmacion() {
    var modal = new bootstrap.Modal(document.getElementById('modalConfirmation'));
    modal.show();
}

// Ejemplo de función para guardar, eliminar o editar
function realizarOperacion(tipoOperacion) {
    // Aquí iría la lógica para guardar, eliminar o editar
    // ...

    // Si la operación fue exitosa, mostrar el modal de confirmación
    mostrarModalConfirmacion();
}

// Ejemplo de uso (puedes llamarla desde un evento, como un botón)
document.getElementById('miBotonOperacion').addEventListener('click', function() {
    realizarOperacion('guardar'); // Cambia 'guardar' por 'eliminar' o 'editar' según sea necesario
});