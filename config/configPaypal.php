<?php 

    require_once "configControllers.php";
    require_once "paypal-sdk/autoload.php";

    // define("URL_SITIO", "http://localhost/GDLWebCamp/");

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'Ac9D813CQyXe0i7r4bwsLmBxtPpd4sNWv4OyWq__0DFpexEhdN1uifSXcKpg2qPFwIGcbJOXOfiOIKjt', // ClienteID
            'EBBNFAYOLm2URk1qtxzRElfJdq5Am9LdkGmD4rK2k9hEP0aEsZkvGL1IjCJZjJ98nRglGrRpTneIeY43' // Secret
        )
    );
    
?>