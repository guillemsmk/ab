document.addEventListener("DOMContentLoaded", () => {        
    const carrito = document.getElementById('carrito');
    const lista = document.querySelector('#lista-carrito tbody');
    const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
    const comprarCarritoBtn = document.getElementById('comprar-carrito');

    cargarEventListeners();

    function cargarEventListeners() {
        document.addEventListener('click', comprarElemento);
        carrito.addEventListener('click', eliminarElemento);
        vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
    }

    function comprarElemento(e) {
        if (e.target.classList.contains('agregar-carrito')) {
            const elemento = e.target.parentElement.parentElement;
            leerDatosElemento(elemento);
        }
    }

    function leerDatosElemento(elemento) {
        const infoElemento = {
            imagen: elemento.querySelector('img').src,
            titulo: elemento.querySelector('h3').textContent,
            precio: elemento.querySelector('.precio').textContent,
            id: elemento.querySelector('.agregar-carrito').getAttribute('data-id')
        }

        insertarCarrito(infoElemento);
    }

    function insertarCarrito(elemento) {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>
            <img src="${elemento.imagen}" width=100 >
        </td>

        <td>
        ${elemento.titulo}
        </td>

        <td>
        ${elemento.precio}
        </td>  
    `;

        lista.appendChild(row);
    }

    function eliminarElemento(e) {
        e.preventDefault();
        let elemento,
            elementoId;

        if (e.target.classlist.contains('borrar')) {
            const elemento = e.target.parentElement.parentElement;
            const elementoId = elemento.querySelector('a').getAttribute('data-id');
            elemento.remove();
        }
    }

    function vaciarCarrito() {
        while (lista.firstChild) {
            lista.removeChild(lista.firstChild);
        }
        return false;
    }
});