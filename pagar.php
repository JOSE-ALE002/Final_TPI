<?php 


    if(!isset($_GET["idUsuario"]) || !isset($_GET["nombrePelicula"])  || !isset($_GET["idPelicula"]) || !isset($_GET["precio"]) || !isset($_GET["tipoVenta"])){
        exit("Hubo un error");
    } 

    require_once "config/configPaypal.php";
    require_once "models/Pelicula.php";

    $url = "";

    if($_GET["tipoVenta"] == "comprar") {
        $url = BASE_DIR."Pelicula/movie&id=".$_GET["idPelicula"]."&idUsuario=".$_GET["idUsuario"]."&fechaCompra=".$_GET["fechaCompra"];
    } 
    else if($_GET["tipoVenta"] == "alquilar") {
        $url = BASE_DIR."Pelicula/movie&id=".$_GET["idPelicula"]."&idUsuario=".$_GET["idUsuario"]."&fechaEntrega=".$_GET["fechaEntrega"]."&fechaDevolucion=".$_GET["fechaDevolucion"];
    }    


    // clases del sdk de paypal
    use PayPal\Api\Payer; 
    use PayPal\Api\Item; 
    use PayPal\Api\ItemList; 
    use PayPal\Api\Details; 
    use PayPal\Api\Amount; 
    use PayPal\Api\Transaction; 
    use PayPal\Api\RedirectUrls; 
    use PayPal\Api\Payment; 

    $numeroPeliculas = 1;

    $compra = new Payer();
    $compra->setPaymentMethod("paypal");

    $articulo = new Item();
    $articulo->setName($_GET["nombrePelicula"])
            ->setCurrency("USD")
            ->setQuantity($numeroPeliculas)
            ->setPrice($_GET["precio"]);

    $listaArticulos = new ItemList();
    $listaArticulos->setItems(array($articulo));

    $cantidad = new Amount();
    $cantidad->setCurrency("USD")
            ->setTotal($_GET["precio"]);

    $trasaccion = new Transaction();
    $trasaccion->setAmount($cantidad)
                ->setItemList($listaArticulos)
                ->setDescription("Pago de Pelicula")
                ->setInvoiceNumber($_GET["idPelicula"]);

    echo  $trasaccion->getInvoiceNumber();

    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl($url)
                ->setCancelUrl(BASE_DIR."Pelicula/movie&id=".$_GET["idPelicula"]);

    $pago = new Payment();
    $pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($trasaccion));

    try {
        $pago->create($apiContext); //se realiza el pago de la pelicula

    } catch(PayPal\Exception\PayPalConnectionException $paypalException) {
        echo "<pre>";
            print_r(json_decode($paypalException->getData));
        echo "</pre>";
    }

    $aprobado = $pago->getApprovalLink();

    header("location: {$aprobado}");
?>