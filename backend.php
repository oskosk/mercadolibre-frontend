<?php

include_once('config.inc.php');
include_once('Mercadolibre.class.php');

$category = $_GET['c'];
$seller_id = $MERCADOLIBRE['seller_id'];
if (isset($_GET['seller_id']) ) {
	$seller_id=$_GET['seller_id'];
}
$productos = MercadoLibre::productosBySeller($seller_id, $category);

?>

<div class="Main_content">
<h1><?=$productos['filters'][0]['values'][0]['name']?></h1>
<?foreach($productos['results'] as $p) :?>
<div class="node">
<h2><a href="<?=$p['permalink']?>"><?=$p['title']?> - $<?=$p['price']?></a> </h2>
<img src="<?=$p['thumbnail']?>" />
<span class="precio"></span>
</div>
<?endforeach;?>
</div>

