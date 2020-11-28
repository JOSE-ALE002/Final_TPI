<?php 


    if(!isset($_POST["idUsuario"]) || !isset($_POST["nombrePelicula"])  || !isset($_POST["idPelicula"]) || !isset($_POST["precio"]) || !isset($_POST["tipoVenta"])){
        exit("Hubo un error");
    } 

    require_once "config/configPaypal.php";
    require_once "models/Pelicula.php";

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
    $articulo->setName($_POST["nombrePelicula"])
            ->setCurrency("USD")
            ->setQuantity($numeroPeliculas)
            ->setPrice($_POST["precio"]);

    $listaArticulos = new ItemList();
    $listaArticulos->setItems(array($articulo));

    $cantidad = new Amount();
    $cantidad->setCurrency("USD")
            ->setTotal($_POST["precio"]);

    $trasaccion = new Transaction();
    $trasaccion->setAmount($cantidad)
                ->setItemList($listaArticulos)
                ->setDescription("Pago de Pelicula")
                ->setInvoiceNumber($_POST["idPelicula"]);

    echo  $trasaccion->getInvoiceNumber();

    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl(BASE_DIR."Pelicula/movie&id=".$_POST["idPelicula"])
                ->setCancelUrl(BASE_DIR."Pelicula/movie&id=".$_POST["idPelicula"]);

    $pago = new Payment();
    $pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($trasaccion));

    try {
        $pago->create($apiContext); //se realiza el pago de la pelicula

        $pelicula = new Pelicula();
        $pelicula->set_Id_Pelicula($_POST["idPelicula"]);
        
        if($_POST["tipoVenta"] == "comprar") {
            $pelicula->comprar($_POST["idUsuario"], $_POST["fechaCompra"]);
        } 
        else if($_POST["tipoVenta"] == "alquilar") {
            $pelicula->alquilar($_POST["idUsuario"], $_POST["fechaEntrega"], $_POST["fechaDevolucion"]);
        }
        
        $pelicula->stockUpdate($_POST["idPelicula"]);

    } catch(PayPal\Exception\PayPalConnectionException $paypalException) {
        echo "<pre>";
            print_r(json_decode($paypalException->getData));
        echo "</pre>";
    }

    $aprobado = $pago->getApprovalLink();

    header("location: {$aprobado}");
?>