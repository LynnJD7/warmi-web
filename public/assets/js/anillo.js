// Precio unitario
const PRECIO = 40;

document.addEventListener("DOMContentLoaded", () => {

    const cantidadInput = document.getElementById("cantidad");
    const totalSpan = document.getElementById("total");
    const qrOutput = document.getElementById("qr");
    const btnPlus = document.querySelector("[data-action='plus']");
    const btnMinus = document.querySelector("[data-action='minus']");
    const formPago = document.getElementById("form-pago");

    if (!cantidadInput || !totalSpan || !qrOutput || !formPago) {
        console.warn("⚠️ Elementos principales no encontrados en el DOM");
        return;
    }

    function actualizarCantidad(cambio) {
        let cantidad = parseInt(cantidadInput.value) + cambio;
        if (cantidad < 1) cantidad = 1;

        cantidadInput.value = cantidad;
        totalSpan.textContent = `S/. ${(cantidad * PRECIO).toFixed(2)}`;
    }

    if (btnPlus) btnPlus.addEventListener("click", () => actualizarCantidad(1));
    if (btnMinus) btnMinus.addEventListener("click", () => actualizarCantidad(-1));

    formPago.addEventListener("submit", (e) => {
        e.preventDefault();

        const nombre = document.getElementById("nombre").value;
        const direccion = document.getElementById("direccion").value;
        const metodo = document.getElementById("metodo-pago").value;
        const cantidad = cantidadInput.value;
        const total = (cantidad * PRECIO).toFixed(2);

        qrOutput.textContent = 
`--------------------------------------
ORDEN DE COMPRA WARMI360
--------------------------------------
Anillo Inteligente
Cantidad: ${cantidad}
Total: S/. ${total}
Método: ${metodo.toUpperCase()}

Cliente: ${nombre}
Entrega: ${direccion}
--------------------------------------
Simulación QR:
[Escanea para pagar S/. ${total}]
--------------------------------------`;
    });
});
