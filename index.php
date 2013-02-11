<?php
include_once('config.inc.php');
include_once('Mercadolibre.class.php');

$seller_id = $MERCADOLIBRE['seller_id'];
if (isset($_GET['seller_id']) ) {
	$seller_id=$_GET['seller_id'];
}
$seller_geocoding = $MERCADOLIBRE['seller_geocoding'];
$seller_data = MercadoLibre::sellerData($seller_id);
$payment_methods = MercadoLibre::sellerAcceptedPaymentMethods($seller_id);
$seller_productos = MercadoLibre::productosBySeller($seller_id);
$seller_destacados = MercadoLibre::productosDestacadosBySeller($seller_id);
//die(print_r($seller_destacados,true));
$seller_nickname =  $seller_data['nickname'];

$titulo = $seller_nickname . ' - ' . $SITE_SUBTITLE;
include_once('home.html');

?>