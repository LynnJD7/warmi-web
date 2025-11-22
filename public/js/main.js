// Función para cerrar sesión
function confirmarLogout() {
    if(confirm("¿Deseas cerrar sesión?")) {
        window.location.href = "php/logout.php";
    }
}