document.addEventListener("DOMContentLoaded", () => {
fetch('../src/Controllers/listar_evidencias.php')
        .then(res => res.json())
        .then(data => {
            console.log("Evidencias recibidas:", data);

            const tbody = document.getElementById('tbody-evidencias');
            tbody.innerHTML = ''; // Limpiar el "Cargando..."

            if (!data || data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5">No hay evidencias disponibles</td></tr>';
                return;
            }

            data.forEach(e => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${e.nombre_archivo}</td>
                    <td>${e.tipo}</td>
                    <td>${e.fecha_captura}</td>
                    <td>${e.tamano_bytes}</td>
                    <td>
                    <a href="../src/Controllers/descargar_evidencias.php?nombre_archivo=${encodeURIComponent(e.nombre_archivo)}
" 
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
