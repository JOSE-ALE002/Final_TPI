const verificar = () => {

    let btnComprar = document.querySelector(".btn-comprar");
    let btnAlquilar = document.querySelector(".btn-alquilar");

    if(btnComprar) {
    
        btnComprar.addEventListener("click", comprar);
    }
    if(btnAlquilar) {
        btnAlquilar.addEventListener("click", alquilar);
    }
}

const comprar = async (event) => {
    event.preventDefault();

    let contenedor = event.target.parentElement.parentElement;
    let btnSender = event.target;
    let fecha = new Date();
    let fechaCompra = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;

    const idUsuario = contenedor.getAttribute("data-idusuario");
    const idPelicula = contenedor.getAttribute("data-idpelicula");
    const nombrePelicula = contenedor.getAttribute("data-nombre");
    const precio = btnSender.getAttribute("data-precio");
    const tipoVenta = "comprar";

    const url =  `http://localhost/Final_TPI/Pelicula/pagar&idUsuario=${idUsuario}&idPelicula=${idPelicula}&nombrePelicula=${nombrePelicula}&precio=${precio}&tipoVenta=${tipoVenta}&fechaCompra=${fechaCompra}`;

    window.location.href = url;    

}

const alquilar = async (event) => {
    event.preventDefault();

    let contenedor = event.target.parentElement.parentElement;
    let btnSender = event.target;
    let fecha = new Date();
    const fechaEntrega = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;
    fecha.setDate(fecha.getDate() + 30);
    const fechaDevolucion = `${fecha.getFullYear()}-${fecha.getMonth()+1}-${fecha.getDate()}`;

    const idUsuario = contenedor.getAttribute("data-idusuario");
    const idPelicula = contenedor.getAttribute("data-idpelicula");
    const nombrePelicula = contenedor.getAttribute("data-nombre");
    const precio = btnSender.getAttribute("data-precio");
    const tipoVenta = "alquilar";

    const url =  `http://localhost/Final_TPI/Pelicula/pagar&idUsuario=${idUsuario}&idPelicula=${idPelicula}&nombrePelicula=${nombrePelicula}&precio=${precio}&tipoVenta=${tipoVenta}&fechaEntrega=${fechaEntrega}&fechaDevolucion=${fechaDevolucion}`;

    window.location.href = url;   
}

verificar();