<?
Class MercadoLibre {
	static function productosBySeller($seller_id, $category = false)
	{
		$url = 'https://api.mercadolibre.com/sites/MLA/search?seller_id=%s';
		if ($category) {
			$url .= '&category=%s';
		}
		$url = sprintf($url, $seller_id, $category);
		$contents = file_get_contents( $url );
		$productos = json_decode($contents, true);
		return $productos;
	}

	static function productosDestacadosBySeller($seller_id, $max=5)
	{
		$url = 'https://api.mercadolibre.com/sites/MLA/search?seller_id=%s&condition=new&has_pictures=yes';
		$url = sprintf($url, $seller_id);
		$contents = file_get_contents( $url );
		$productos = json_decode($contents, true);
		$productos = $productos['results'];
		$ids = array();
		for ($i=0; $i<$max; $i++ ) {
			$p = $productos[$i];
				$ids[] = $productos[$i]['id'];
		}
		$ids = implode(',', $ids);
		$url = 'https://api.mercadolibre.com/items/?ids=%s';
		$url = sprintf($url, $ids);
		$contents = file_get_contents( $url );
		$productos = json_decode($contents, true);
		return $productos;
	}

	static function sellerData($seller_id)
	{
		$url = 'https://api.mercadolibre.com/users/%s';
		$url = sprintf($url, $seller_id);
		$contents = file_get_contents( $url );
		return json_decode($contents, true);
	}

	static function sellerAcceptedPaymentMethods($seller_id)
	{
		$url = 'https://api.mercadolibre.com/users/%s/accepted_payment_methods';
		$url = sprintf($url, $seller_id);
		$contents = file_get_contents( $url );
		return json_decode($contents, true);
	}
}

?>