// js/anillo.js

// Precio unitario del anillo (S/. 100.00)
const PRECIO_UNITARIO = 100.00;

/**
 * Función para actualizar la cantidad y el total.
 * @param {number} cambio - El valor a sumar (1 para aumentar, -1 para disminuir).
 */
function actualizarCantidad(cambio) {
    const cantidadInput = document.getElementById('cantidad');
    const totalSpan = document.getElementById('total');
    let cantidadActual = parseInt(cantidadInput.value);

    // Calcula la nueva cantidad
    let nuevaCantidad = cantidadActual + cambio;

    // Asegura que la cantidad no sea menor a 1
    if (nuevaCantidad < 1) {
        nuevaCantidad = 1;
    }

    // Actualiza el campo de cantidad
    cantidadInput.value = nuevaCantidad;

    // Calcula el nuevo total
    const nuevoTotal = nuevaCantidad * PRECIO_UNITARIO;

    // Actualiza el texto del total (formateado a soles peruanos)
    totalSpan.textContent = `S/. ${nuevoTotal.toFixed(2)}`;
}

// Funciones expuestas a los botones
function aumentar() {
    actualizarCantidad(1);
}

function disminuir() {
    actualizarCantidad(-1);
}


/**
 * Función para simular la generación de QR/link de pago
 * @param {Event} event - El evento de submit del formulario.
 */
function generarQR(event) {
    // Previene que el formulario se envíe realmente (ya que es solo una demo)
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const direccion = document.getElementById('direccion').value;
    const metodo = document.getElementById('metodo-pago').value;
    const cantidad = document.getElementById('cantidad').value;
    const total = document.getElementById('total').textContent.replace('S/. ', '');

    const qrOutput = document.getElementById('qr');

    if (!nombre || !direccion || !metodo) {
        qrOutput.textContent = 'ERROR: Por favor, completa todos los campos del formulario.';
        return;
    }

    // Generar la información de pago simulada
    const infoPago = `
--------------------------------------
ORDEN DE COMPRA WARMI360
--------------------------------------
Artículo: Anillo Inteligente
Cantidad: ${cantidad}
Total a Pagar: S/. ${total}
Método: ${metodo.toUpperCase()}

Cliente: ${nombre}
Entrega: ${direccion}
--------------------------------------
Instrucciones de Pago con ${metodo.toUpperCase()}:
[Simulación: Escanea este QR para pagar S/. ${total}]
[Link de Pago: https://pago.warmi360.pe/?order=${Date.now()}]
--------------------------------------
`;

    qrOutput.textContent = infoPago;
}