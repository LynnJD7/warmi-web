document.addEventListener("DOMContentLoaded", () => {
fetch('../src/Controllers/listar_evidencias.php')
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById('tbody-evidencias');
            tbody.innerHTML = ''; // Limpiar el "Cargando..."

            if (!data || data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5">No hay evidencias disponibles</td></tr>';
                return;
            }

            data.forEach(e => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${e.id}</td>
                    <td>${e.tipo}</td>
                    <td>${e.nombre_archivo}</td>
                    <td>${e.fecha_captura}</td>
                    <td>
                    <a href="../src/Controllers/descargar_evidencias.php?id=${e.id}" 
                    class="btn-descargar" 
                    target="_blank">
                    Descargar
                    </a>
                    </td>

                `;
                tbody.appendChild(tr);
            });
        })
        .catch(err => {
            console.error("Error al cargar evidencias:", err);
            const tbody = document.getElementById('tbody-evidencias');
            tbody.innerHTML = '<tr><td colspan="5">Error al cargar evidencias</td></tr>';
        });
});
