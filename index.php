<?php
include_once('config.inc.php');
include_once('Mercadolibre.class.php');
error_reporting(E_ALL);
$seller_id = $MERCADOLIBRE['seller_id'];
if (isset($_GET['seller_id']) ) {
	$seller_id=$_GET['seller_id'];
}

$categoria = null;
$esCategoria = false;
if(isset($_GET['categoria']))
{
	$categoria = $_GET['categoria'];
	//en este caso tengo que listar los productos uno tras otro
	//tiene que ser una template distinta: categoria.html
	$esCategoria = true;
}else{
	$categoria = $CATEGORIA_BASE;
	//en este caso se muestra el home que agrupa los productos
	//por "sub" categorias
	$esCategoria = false;
}

$seller_geocoding = $MERCADOLIBRE['seller_geocoding'];
$seller_data = MercadoLibre::sellerData($seller_id);
$payment_methods = MercadoLibre::sellerAcceptedPaymentMethods($seller_id);
$seller_productos = MercadoLibre::productosBySeller($seller_id,$categoria);
$seller_destacados = MercadoLibre::productosDestacadosBySeller($seller_id);
//die(print_r($seller_destacados,true));
$seller_nickname =  $seller_data['nickname'];
$titulo = $seller_nickname . ' - ' . $SITE_SUBTITLE;
if(!$esCategoria) include_once('home.html'); else include_once('categoria.html');

?>
