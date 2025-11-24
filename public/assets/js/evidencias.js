document.addEventListener("DOMContentLoaded", () => {
fetch('api/evidencias_listar.php')
        .then(res => {
            if (!res.ok) {
                throw new Error("Error HTTP: " + res.status);
            }
            return res.json();
        })
        .then(data => {
            console.log("Evidencias:", data);

            const tbody = document.getElementById('tbody-evidencias');

            if (!tbody) {
                console.error("No existe el elemento tbody-evidencias en el DOM");
                return;
            }

            tbody.innerHTML = '';

            if (!Array.isArray(data) || data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5">No hay evidencias disponibles</td></tr>';
                return;
            }

            data.forEach(e => {
                tbody.innerHTML += `
                    <tr>
                        <td>${e.nombre_archivo}</td>
                        <td>${e.tipo}</td>
                        <td>${e.fecha_captura}</td>
                        <td>${e.tamano_bytes}</td>
                        <td class="text-center">
                            <a href="api/evidencias_descargar.php?nombre_archivo=${encodeURIComponent(e.nombre_archivo)}" 
                               class="btn btn-sm btn-primary">
                                Descargar
                            </a>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(error => {
            console.error("Error cargando evidencias:", error);
        });
});
