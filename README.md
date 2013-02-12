mercadolibre-frontend
=====================

Un frontend a tu cuenta de Mercadolibre PHP+HTML5 para tu sitio

Setup inicial
---

1. Clonar la repo en un directorio accesible. Ej /var/www/mercadolibre

        git clone git@github.com:oskosk/mercadolibre-frontend.git

 o descargar el archivo y extraerlo normalmente.

2. Renombrar config.inc.php.dist a config.inc.php

        mv config.inc.php.dist config.inc.php

3. Editar config.inc.php llenando las variables

 `$MERCADOLIBRE['seller_id']` ID de usuario de MercadoLibre.

 Si no sabes conseguir el ID de usuario, puedes usar la API y consultar por nombre de usuario:

          https://api.mercadolibre.com/sites/MLA/search?nickname=[NOMBRE DE USUARIO]

 `$MERCADOLIBRE['seller_geocoding']` Dirección postal, para ubicar en Gmaps

 `$SITE_SUBTITLE` Bajada del título, rubro.

 `$BACKGROUND_URL` URL de donde sacar la imagen de fondo
