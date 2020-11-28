let btnComprar = document.querySelector(".btn-comprar");
let btnAlquilar = document.querySelector(".btn-alquilar");

const verificar = () => {

    if(btnComprar && btnAlquilar) {
    
        btnComprar.addEventListener("click", comprar);
        btnAlquilar.addEventListener("click", alquilar);
    }
}

const comprar = async(event) => {
    event.preventDefault();

    let contenedor = event.target.parentElement.parentElement;
    let btnSender = event.target;

    let datos = new FormData();
    datos.append("idUsuario", contenedor.getAttribute("data-idusuario"));
    datos.append("idPelicula", contenedor.getAttribute("data-idpelicula"));
    datos.append("idPelicula", btnSender.getAttribute("data-precio"));
    datos.append("tipoVenta", "comprar");

    console.log(...datos);

}

const alquilar = async(event) => {
    event.preventDefault();

    let contenedor = event.target.parentElement.parentElement;
    let btnSender = event.target;

    let datos = new FormData();
    datos.append("idUsuario", contenedor.getAttribute("data-idusuario"));
    datos.append("idPelicula", contenedor.getAttribute("data-idpelicula"));
    datos.append("precio", btnSender.getAttribute("data-precio"));
    datos.append("tipoVenta", "alquilar");

    console.log(...datos);
}

verificar();
