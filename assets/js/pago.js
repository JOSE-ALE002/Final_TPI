const verificar = () => {

    let btnComprar = document.querySelector(".btn-comprar");
    let btnAlquilar = document.querySelector(".btn-alquilar");

    if(btnComprar && btnAlquilar) {
    
        btnComprar.addEventListener("click", comprar);
        btnAlquilar.addEventListener("click", alquilar);
    }
}

const comprar = async (event) => {
    event.preventDefault();

    let contenedor = event.target.parentElement.parentElement;
    let btnSender = event.target;
    let fecha = new Date();
    let fechaCompra = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;

    
    let datos = new FormData();
    datos.append("idUsuario", contenedor.getAttribute("data-idusuario"));
    datos.append("idPelicula", contenedor.getAttribute("data-idpelicula"));
    datos.append("nombrePelicula", contenedor.getAttribute("data-nombre"));
    datos.append("precio", btnSender.getAttribute("data-precio"));
    datos.append("tipoVenta", "comprar");
    datos.append("fechaCompra", fechaCompra);

    const options = {
        method: "POST",
        body: datos
    }

    const peticion = await fetch("/Final_TPI/pagar.php", options);

    const response = await peticion.text();

    console.log(response);

}

const alquilar = async (event) => {
    event.preventDefault();

    let contenedor = event.target.parentElement.parentElement;
    let btnSender = event.target;
    let fecha = new Date();
    const fechaEntrega = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;
    fecha.setDate(fecha.getDate() + 30);
    const fechaDevolucion = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;

    let datos = new FormData();
    datos.append("idUsuario", contenedor.getAttribute("data-idusuario"));
    datos.append("idPelicula", contenedor.getAttribute("data-idpelicula"));
    datos.append("nombrePelicula", contenedor.getAttribute("data-nombre"));
    datos.append("precio", btnSender.getAttribute("data-precio"));
    datos.append("tipoVenta", "alquilar");
    datos.append("fechaEntrega", fechaEntrega);
    datos.append("fechaDevolucion", fechaDevolucion);

    const options = {
        method: "POST",
        body: datos
    }

    const peticion = await fetch("/Final_TPI/pagar.php", options);

    const response = await peticion.json();

    console.log(response);
}

verificar();
