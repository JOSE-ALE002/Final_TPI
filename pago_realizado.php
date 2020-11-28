<?php 
  include_once("includes/templates/header.php"); 
  use PayPal\Api\Payment; 
  use PayPal\Api\PaymentExecution; 
  use PayPal\Rest\ApiContext; 
  require "includes/paypal.php";

?>

  <section class="seccion contenedor">

    <h2>Resumen registro</h2>

    <?php 

        // verificando el pago con el Api Rest de paypal

        $paymentId = $_GET["paymentId"]; 
        $idPago = (int) $_GET["id_pago"];

        $pago = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET["PayerID"]);

        // resultado tiene la informacion de la trasaccion
        $resultado = $pago->execute($execution, $apiContext);

        $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

        if($respuesta === "completed") {

          try {

            echo "<div class='resultado correcto'>";
            echo "El pago se realizo correctamente <br>";
            echo "El ID: {$paymentId}";
            echo "</div>";

            require_once("includes/funciones/conexion.php");
            $sql = "UPDATE registros SET pagado = ? WHERE ID_Registrado = ?";
            $pagado = 1;

            if($stmt = $conn->prepare($sql)) {
              $stmt->bind_param("ii", $pagado, $idPago);
              $stmt->execute();
            
              $stmt->close();
              $conn->close();

            } else {
              $error = $conn->errno." ".$conn->error;
              echo $error; 
            }

          } catch(\Exception $exception) {
            echo $exception->getMessage();
          }


        } 
        
        else {
          echo "<div class='resultado error'>";
          echo "No se ha realizado el pago";
          echo "</div>";
        }
    
    ?>

</section>

<?php include_once("includes/templates/footer.php"); ?>