document.addEventListener('DOMContentLoaded', function() {
    const productForm = document.getElementById('productForm');
    const editForm = document.getElementById('editForm');
    const deleteForm = document.getElementById('deleteForm');

    // Manejar el envío del formulario de agregar producto
    productForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(productForm);
        formData.append('action', 'add'); // Agregar acción

        fetch('productoController.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Muestra el modal de confirmación
                const confirmationModal = new bootstrap.Modal(document.getElementById('modalConfirmation'));
                confirmationModal.show();
                productForm.reset(); // Limpiar el formulario
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Manejar el envío del formulario de editar producto
    editForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(editForm);
        formData.append('action', 'edit'); // Agregar acción

        fetch('productoController.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Muestra el modal de confirmación
                const confirmationModal = new bootstrap.Modal(document.getElementById('modalConfirmation'));
                confirmationModal.show();
                editForm.reset(); // Limpiar el formulario
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Manejar el envío del formulario de eliminar producto
    deleteForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(deleteForm);
        formData.append('action', 'delete'); // Agregar acción

        fetch('productoController.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Muestra el modal de confirmación
                const confirmationModal = new bootstrap.Modal(document.getElementById('modalConfirmation'));
                confirmationModal.show();
                deleteForm.reset(); // Limpiar el formulario
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
