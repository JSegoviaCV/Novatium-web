<style>

    /* ================================================= */

    /* === ESTILOS PARA CENTRAR TODO EL BLOQUE PHP/SCRAPER === */

    /* ================================================= */

    #scraper-wrapper {

        /* Define un ancho máximo para el contenido en PC */

        max-width: 1500px;

        /* Centra el contenedor horizontalmente */

        margin: 40px auto;

        /* Padding lateral para que no toque los bordes en móvil (opcional) */

        padding: 0 15px;

    }

    /* ================================================= */



    /* === MODIFICADO: ESTILO PARA EL ENCABEZADO Y TÍTULO ALINEADO A LA IZQUIERDA === */

    .scraper-header {

        display: flex; /* Permite alinear el contenido interno */

        justify-content: flex-start; /* CAMBIO CLAVE: Alinea los ítems al inicio (izquierda) */

        border-bottom: 2px solid #f0f0f0;

        padding-bottom: 10px;

        margin-bottom: 20px;

    }



    .scraper-header h2 {

        margin: 0; /* Eliminar márgenes por defecto */

        /* === CAMBIO CLAVE AQUÍ: Aumentamos el tamaño de la fuente de 1.5em a 2em === */

        font-size: 2em;

        color: #1a73e8;

    }

    /* ====================================================================== */



    /* ********************************************************** */

    /* === CAMBIO CLAVE: ESTILO PARA EL LAYOUT DE CUADRÍCULA (GRID) EN ESCRITORIO === */

    /* ********************************************************** */

    .scraper-list {

        list-style: none;

        padding: 0;



        /* Contenedor Grid: crea las columnas */

        display: grid;

        /* Define 3 columnas de min 300px, llenando el espacio disponible */

        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));

        gap: 20px; /* Espacio entre los mosaicos */

    }



    /* === SOLUCIÓN PARA OCULTAR VIÑETA EXTERNA === */

    .scraper-list li::before {

        content: none !important; /* Elimina la viñeta de estilos externos */

        display: none !important;

    }

    /* =========================================== */



    .scraper-list li {

        border: 1px solid #ddd;

        padding: 15px;

        /* margin-bottom: 15px; <- ELIMINADO: El 'gap' del grid maneja el espaciado */

        border-radius: 8px;



        /* Item Flex: asegura que el contenido interno (descripción/acciones) se apile verticalmente */

        display: flex;

        flex-direction: column; /* Apila los elementos: título, descripción, detalles, acciones */

        align-items: stretch;



        transition: box-shadow 0.3s ease;

        margin-bottom: 0; /* Aseguramos que no haya margen vertical extra */

        height: 100%; /* Ayuda a la visualización de la cuadrícula si los contenidos varían */

    }

    .scraper-list li:hover {

        box-shadow: 0 4px 8px rgba(0,0,0,0.1);

    }

    .scraper-list li:last-child { margin-bottom: 0; }



    /* === AJUSTE: Contenedor flexible para Fecha y Título/Empresa === */

    .info-header {

        display: flex;

        flex-direction: column;

        width: 100%;

    }

    .info-date {

        margin-bottom: 5px;

        order: -2;

        color: #666;

        font-size: 0.85em;

    }



    .logo-and-title {

        display: block;

        order: -1;

    }



    /* Contenido del puesto */

    .contenido {

        flex-grow: 1;

    }

    .titulo {

        display: flex;

        align-items: center;

        margin-bottom: 5px;

        flex-wrap: wrap;

        margin-top: 0;

    }

    .titulo a {

        color: #1a73e8;

        text-decoration: none;

        font-weight: bold;

        font-size: 1.1em;

        display: inline;

    }

    .titulo a:hover { text-decoration: underline; }



    /* Descripción y detalles */

    .descripcion {

        font-size: 0.9em;

        color: #333;

        margin-top: 5px;

        /* Asegurar que la descripción no consuma demasiado espacio */

        flex-grow: 1;

        margin-bottom: 10px; /* Espacio antes de detalles */

    }

    .detalles {

        display: flex;

        flex-wrap: wrap;

        font-size: 0.85em;

        color: #666;

        margin-top: 10px;

        gap: 15px;

        /* Asegurar que los detalles permanezcan juntos */

        flex-shrink: 0;

    }

    .detalle-item {

        display: flex;

        align-items: center;

    }



    /* Botones de acción (Ajustados para el Grid Layout) */

    .acciones {

        margin-left: 0;

        margin-top: 15px;

        padding-top: 15px;

        border-top: 1px solid #f0f0f0;



        display: flex;

        /* **IMPORTANTE: Si solo queda un botón, cambiamos a fila para que ocupe el ancho completo** */

        flex-direction: row;

        gap: 8px;

        flex-shrink: 0;

        justify-content: center;

        min-width: 100%;

    }

    .btn {

        padding: 8px 12px;

        border: none;

        border-radius: 4px;

        text-align: center;

        text-decoration: none;

        font-weight: bold;

        font-size: 0.9em;

        cursor: pointer;

        transition: background-color 0.2s;

        white-space: nowrap;

        /* Para que el único botón ocupe todo el ancho */

        flex-grow: 1;

    }

    /* Estilos del btn-ver eliminados */

    .btn-aplicar {

        background-color: #4285f4;

        color: white;

        border: 1px solid #4285f4;

    }

    .btn-aplicar:hover {

        background-color: #357ae8;

    }

    .error { color: #dc3545; font-weight: bold; }



    /* == RESPONSIVE DESIGN (Móvil) == */

    @media (max-width: 768px) {

        #scraper-wrapper {

            max-width: 100%;

            margin: 0;

            padding: 0;

        }

        .scraper-container {

            padding: 10px;

        }



        /* ********************************************************** */

        /* === AJUSTE CLAVE: Volver a lista de ancho completo en móvil === */

        /* ********************************************************** */

        .scraper-list {

            grid-template-columns: 1fr; /* Una sola columna en móvil */

            gap: 10px;

        }



        .scraper-header {

             justify-content: center; /* Centrar el título en móvil */

        }



        .scraper-list li {

            align-items: stretch;

            margin-bottom: 5px;

        }



        .info-header {

            flex-direction: column;

        }

        .contenido { margin-left: 0; }



        .detalles {

            flex-direction: column;

            gap: 5px;

        }



        .acciones {

            margin-left: 0;

            margin-top: 15px;

            padding-top: 10px;

            flex-direction: row; /* Botones en fila en móvil (Ya está arriba, pero se mantiene la precaución) */

            width: 100%;

        }

        .btn {

            flex-grow: 1;

            padding: 10px;

        }

    }

</style>



<div id="scraper-wrapper">

<div class="scraper-container">

    <div class="scraper-header">

        <h2>NOVATIUM Jobs</h2>

    </div>



    <?php

    /**

     * ----------------------------------------------------

     * WEB SCRAPING - EMPEOS IT (NOVATIUM)

     * NOTA: Este script ha sido simplificado para ser

     * incluido dentro del cuerpo (body) de una página PHP principal.

     * ----------------------------------------------------

     */



    // 1. CONFIGURACIÓN INICIAL Y CONEXIÓN

    $url = 'https://www.empleosit.com.ar/company/5217/NOVATIUM/?searchId=1763222646.0508&action=search&page=1&listings_per_page=40&view=list';

    $ch = curl_init();



    // Configurar cURL

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Se mantiene el User-Agent para evitar bloqueos

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36');

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);



    $html_content = curl_exec($ch);

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);



    if ($http_code !== 200 || $html_content === false || empty($html_content)) {

        $html_content = false;

    }



   /**

 * Función para calcular la diferencia de tiempo y formatearla.

 * **Lógica Implementada:** 0-1 día = '¡Nuevo!', 2-30 días = 'Publicado hace X días', >30 días = 'Más de 30 días'.

 * @param string $datetime_str La cadena de fecha extraída (ej: "Publicado: 23/10/2025").

 * @return string El formato de fecha amigable.

 */

function format_time_ago($datetime_str) {

    // 1. Extraer la fecha (ej: "23/10/2025") de la cadena original (ej: "Publicado: 23/10/2025")

    if (preg_match('/(\d{2}\/\d{2}\/\d{4})/', $datetime_str, $matches)) {

        $date_part = $matches[1];



        // Convertir el formato DD/MM/YYYY a un objeto DateTime

        $date_obj = DateTime::createFromFormat('d/m/Y', $date_part);



        if ($date_obj) {

            // Usar la fecha y hora actuales del servidor

            $now = new DateTime();

           

            // Si la fecha extraída es posterior a la de referencia

            if ($date_obj > $now) {

                return 'Published';

            }

           

            $interval = $now->diff($date_obj);

            $days = $interval->days;



            // === LÓGICA DE FECHAS SOLICITADA ===



            // 1. Publicación Nueva (0 a 1 día de diferencia)

            if ($days <= 1) {

                return 'New!'; // <<== Nombre final implementado

            }

           

            // 2. Publicado hace X días (Entre 2 y 30 días)

            elseif ($days > 1 && $days <= 30) {

                return '
Posted ago ' . $days . ' days';

            }

           

            // 3. Más de 30 días

            else {

                return 'More than 30 days';

            }

        }

    }

    // Retorno de seguridad si el formato es desconocido

    return 'Fecha no disponible';

}





?>



<?php

// Se inicializa la variable de conteo para que esté disponible en el alcance principal

$puestos_encontrados_count = 0;



    // ----------------------------------------------------

    // 2. PROCESAR Y EXTRAER LOS DATOS - SELECTORES FINALES (Sin modificar)

    // ----------------------------------------------------



    if ($html_content === false) {

        echo '<p class="error">❌ **Error de Conexión.** No se pudo acceder al contenido de la página para el scraping. Código HTTP: ' . htmlspecialchars($http_code) . '</p>';

    } else {

        $dom = new DOMDocument();

        // El error suppression (@) se usa para ignorar advertencias de HTML mal formado

        @$dom->loadHTML('<?xml encoding="utf-8">' . $html_content); // Añadir encoding para manejar caracteres especiales

        $xpath = new DOMXPath($dom);



        // SELECTOR PRINCIPAL ROBUSTO: busca los bloques de ofertas (evenrow/oddrow)

        $xpath_query = '//div[@id="listingsResults"]//div[contains(concat(" ", normalize-space(@class), " "), " evenrow ") or contains(concat(" ", normalize-space(@class), " "), " oddrow ")]';



        $puestos_encontrados = $xpath->query($xpath_query);



        // Asignamos el valor dinámico ANTES de procesar la lista

        $puestos_encontrados_count = $puestos_encontrados->length;



        // Imprimimos el conteo dinámico AQUÍ, antes de mostrar la lista de resultados

       $color_y_negrita = 'style="color: #1a73e8; font-weight: bold; font-size: 1.1em;"';



        // ******************************************************************

        // *** CAMBIO REALIZADO AQUÍ: REEMPLAZO DEL MENSAJE ANTERIOR ***

        // ******************************************************************

        echo '<p><span ' . $color_y_negrita . '>' . $puestos_encontrados_count . '</span> New job opportunities are waiting for you:</p>';

        // ******************************************************************



        if ($puestos_encontrados_count > 0) {

            echo '<ul class="scraper-list">';



            foreach ($puestos_encontrados as $puesto) {



                // Extracción de datos

                $titulo_node = $xpath->query('.//div[@class="listing-title"]/a[2]', $puesto)->item(0);

                $ubicacion_node = $xpath->query('.//span[@class="captions-field location-ico"]', $puesto)->item(0);

                $fecha_node = $xpath->query('.//span[contains(concat(" ", normalize-space(@class), " "), " posted-ico ")]', $puesto)->item(0);

                $descripcion_node = $xpath->query('.//div[@class="show-brief"]', $puesto)->item(0);

                $tag_nuevo_node = $xpath->query('.//span[contains(concat(" ", normalize-space(@class), " "), " New-post ")]', $puesto)->item(0);



                // Limpieza y Formato de datos

                $titulo = $titulo_node ? trim($titulo_node->textContent) : 'Título no disponible';

                $enlace = $titulo_node ? $titulo_node->getAttribute('href') : '#';

                $ubicacion = $ubicacion_node ? trim($ubicacion_node->textContent) : 'Ubicación no disponible';

                $fecha_raw = $fecha_node ? trim($fecha_node->textContent) : 'Fecha no disponible';

                // *** Aplicar la función de formato a la fecha ***

                $fecha = format_time_ago($fecha_raw);

                // *****************************************************************

                $es_nuevo = $tag_nuevo_node ? true : false;



                $descripcion_raw = $descripcion_node ? $descripcion_node->textContent : 'Descripción no disponible';

                // Eliminar el prefijo "Descripción del empleo: " (ya no es necesario eliminarlo aquí)

                $descripcion = str_replace('Descripción del empleo: ', '', $descripcion_raw);

                $descripcion = html_entity_decode(trim($descripcion));

                $empresa = 'NOVATIUM';



                if ($titulo === 'Título no disponible') { continue; } // Saltar si no hay título



                // IMPRIMIR EL RESULTADO EN EL NUEVO FORMATO

                echo '<li>';



                echo '<div class="contenido">';



                // === Contenedor para la fecha, y título ===

                echo '<div class="info-header">';



                // 1. FECHA (POSICIÓN SUPERIOR) - ÍCONO ELIMINADO

                echo '<div class="info-date"><span>' . htmlspecialchars($fecha) . '</span></div>';



                // 2. SOLO TITULO/EMPRESA

                echo '<div class="logo-and-title">';

                echo '<div>'; // Contenedor para Título y Empresa si se quisiera agregar



                // El div.titulo contiene el <a> y el <span>. Su propiedad flex-wrap: wrap; permitirá el ajuste.

                echo '<div class="titulo">';

                echo '<a href="' . htmlspecialchars($enlace) . '" target="_blank">' . htmlspecialchars($titulo) . '</a>';

                if ($es_nuevo) {

                    // Nota: 'tag-nuevo' necesitaría estilos CSS adicionales para ser visible.

                    echo '<span class="tag-nuevo"></span>';

                }

                echo '</div>'; // Cierre de div.titulo



                // Empresa justo debajo del título. Se ha eliminado el span.icono. Se añade un emoji simple.

                echo '<div class="detalle-item"><span> ' . htmlspecialchars($empresa) . '</span></div>';



                echo '</div>'; // Cierre del div para Título/Empresa

                echo '</div>'; // Cierre de .logo-and-title



                echo '</div>'; // Cierre de .info-header

                // ======================================================



                // DESCRIPCIÓN

                echo '<div class="descripcion"><strong>Descripción del empleo:</strong> ' . htmlspecialchars($descripcion) . '</div>';



                // DETALLES ADICIONALES (Solo Ubicación)

                echo '<div class="detalles">';



                // UBICACIÓN. Se ha eliminado el span.icono. Se añade un emoji simple.

                echo '<div class="detalle-item"><span> ' . htmlspecialchars($ubicacion) . '</span></div>';



                echo '</div>';

                echo '</div>';



                // ACCIONES (Botones al final)

                echo '<div class="acciones">';

                // El botón "Ver Oferta" ha sido eliminado

                // Solo se mantiene el botón "Aplicar"

                echo '<a href="' . htmlspecialchars($enlace) . '" target="_blank" class="btn btn-aplicar">Aplicar oferta</a>';

                echo '</div>';



                echo '</li>';

            }

            echo '</ul>';

        } else {

            // Mensaje alternativo si no hay puestos, pero solo si la conexión fue exitosa

            if ($html_content !== false) {

                    echo '<p>✨ **NOVATIUM** no tiene puestos de trabajo publicados en este momento en Empleos IT.</p>';

            }

        }

    }

    ?>

</div>