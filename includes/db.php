<?php
/*
CATEGORIAS
cat_1=Tecnología
cat_2=Medio ambiente
cat_3=Movilidad y transporte
cat_4=Planificación urbana
cat_5=Gobernanza
cat_6=Participación ciudadana
cat_7=Gestion publica
cat_8=Economía
cat_9=Habitantes
cat_10=>Cohesión social
cat_11=>Proyección internacional
cat_12=>Salud
cat_13=>Tu app

Cuando se agrega una cat, se la debe agregar minimo al elemento tu app, ultimo en la lista Apps()
*/

function drawApps()
{
    $arr  = Apps();
    //point to end of the array
    end($arr);
    //fetch key of the last element of the array.
    $lastElementKey = key($arr);
    
    if (is_array($arr) || is_object($arr))    {
        foreach ($arr as $i => $row)
        {            
            echo '<li class="' . $row['cssCats'] . '">';    
            echo '<a class="normal" href="#popUp">';
            
            echo '<input type="hidden" class="appUrl" value="' . $row['url'] . '">';
            echo '<input type="hidden" class="appUrlAndroid" value="' . $row['urlAndroid'] . '">';
            echo '<input type="hidden" class="appUrlIos" value="' . $row['urlIos'] . '">';
            echo '<input type="hidden" class="appUrlWindows" value="' . $row['urlWindows'] . '">';
            
            if($i == $lastElementKey) {
                echo '<input type="hidden" class="appUrlPostular" value="' . $row['urlArticulo'] . '">';
                echo '<input type="hidden" class="appUrlArticulo" value="">';
            }else{
                echo '<input type="hidden" class="appUrlPostular" value="">';
                echo '<input type="hidden" class="appUrlArticulo" value="' . $row['urlArticulo'] . '">';
            }
            
            
                    echo '<div class="appContent">';
                    echo '<img src="' . plugin_dir_url( __FILE__ ) . $row['imgUrl'] .'" alt="">';
                  echo '</div>';
                  echo '<div class="appInfo">';
                    echo '<div class="info">';
                      echo '<h4>' . $row['name'] . '</h4>';
                      echo '<p>' . $row['desc'] . '</p>';
                    echo '</div>';
                  echo '</div>';
            echo '</a>';
            echo '</li>';  
        } 
    }else{echo 'Error en array de apps!';}
}

function drawCats()
{
    $arr  = Cats();            
    if (is_array($arr) || is_object($arr))    {
        foreach ($arr as $i => $row)
        {            
            if ($row['idCat'] == 'cat_1'){
                echo '<button class="boton activo" title="'. $row['name'] . '" id="' . $row['idCat'] .'"><i class="' . $row['css'] . '"></i></button>';
            }else{
                echo '<button class="boton" title="'. $row['name'] . '" id="' . $row['idCat'] .'"><i class="' . $row['css'] . '"></i></button>';
            }
            echo '<input type="hidden" value="' . $row['name'] . '">';
            echo '<input type="hidden" value="' . $row['desc'] . '">';
        } 
    }else{echo 'Error en array de cats!';}
}

//Base de datos de aplicaciones, es un array por el momento
function Apps(){
    //Montevideo sonoro
$arr_apps = array(
    
    //Montevideo sonoro
    array( "cssCats" => "app cat_1 cat_9", 
        "url" => "http://montevideosonoro.uy", 
        "urlArticulo" => "", 
        "urlAndroid" => "", 
        "urlIos" => "", 
        "urlWindows" => "", 
        "imgUrl" => "img/mvdSonoro.png", 
        "name" => "Montevideo sonoro",
        "desc" => "Proyecto interactivo de georreferenciación, puesta en valor y divulgación del patrimonio musical de la ciudad."),
    
    //Como ir
    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
        "urlArticulo" => "", 
        "url" => "http://comoir.montevideo.gub.uy/", 
        "urlAndroid" => "", 
        "urlIos" => "https://itunes.apple.com/us/app/como-ir/id933271921?mt=8", 
        "urlWindows" => "", 
          
        "imgUrl" => "img/comoIr.png", 
        "name" => "Como ir", 
        "desc" => "Aplicación para conocer los horarios y recorridos de los autobuses de montevideo, permite ingresar origen y destino devolviendo las opciones para llegar."),
    
    //Donde esta el cajero
    array( "cssCats" => "app cat_1 cat_8 cat_9", 
          "urlArticulo" => "", 
          "url" => "http://www.dondeestaelcajero.com/", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.dlya.smartdevices.cajeros.cajerosinicial_android&hl=es", 
          "urlIos" => "https://itunes.apple.com/uy/app/donde-esta-el-cajero/id562294581?mt=8", 
          "urlWindows" => "", 
          
          "imgUrl" => "img/dondeEstaElCajero.png", 
          "name" => "Donde esta el cajero", "desc" => "La información necesaria sobre los cajeros más cercanos a tí, a un solo toque 
¡Encontrar un cajero con dinero, nunca fue tan fácil!"),
    
    //Donde reciclo
    array( "cssCats" => "app cat_1 cat_2 cat_6 cat_7 cat_9", 
          "urlArticulo" => "", 
          "url" => "http://www.dondereciclo.com.uy/", 
          "urlAndroid" => "", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/dondeReciclo.png", 
       "name" => "Donde reciclo", "desc" => "Aplicación para encontrar el lugar más cercano para reciclar."),
    //Donde estacionar
    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
        "url" => "http://www.estacionamientotarifado.antel.com.uy/", 
        "urlArticulo" => "", 
        "urlAndroid" => "", 
        "urlIos" => "", 
        "urlWindows" => "", 
        "imgUrl" => "img/enLinea.png", 
        "name" => "Donde estacionar", 
        "desc" => "Con ANTEL móvil podés enviar un SMS desde cualquier lugar del país y pagar el estacionamiento tarifado de la IMM en forma instantánea."),
    
    //Movete
    array( "cssCats" => "app cat_1 cat_2 cat_3 cat_4 cat_7 cat_9", 
        "url" => "http://movete.montevideo.gub.uy/", 
        "urlArticulo" => "", 
        "urlAndroid" => "https://play.google.com/store/apps/details?id=com.usualbike.movete", 
        "urlIos" => "https://play.google.com/store/apps/details?id=com.usualbike.movete", 
        "urlWindows" => "", 
        "imgUrl" => "img/movete.png", 
        "name" => "Movete", "desc" => "Sistema de bicicletas publicas para la ciudad de Montevideo."),
    
    //OttoKar
    array( "cssCats" => "app cat_1 cat_10", 
        "url" => "http://ottokar-app.com", 
        "urlArticulo" => "", 
        "urlAndroid" => "https://play.google.com/store/apps/details?id=com.ingsw.ottokar", 
        "urlIos" => "https://itunes.apple.com/us/app/ottokar/id947981612?mt=8", 
        "urlWindows" => "", 
        "imgUrl" => "img/ottoKar.png", 
        "name" => "OttoKar", "desc" => "A través de un mapa podrás explorar y descubrir dónde está la movida en tiempo real! 100% anónima, divertida, gratis y útil."),
    
    //Por mi barrio
    array( "cssCats" => "app cat_1 cat_6 cat_7 cat_9 cat_10", 
          "url" => "http://www.pormibarrio.uy", 
          "urlArticulo" => "http://beta.montevideointeligente.uy/reportarle-a-la-imm-ahora-es-mas-sencillo-con-pormibarrio/", 
          "urlAndroid" => "", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/porMiBarrio.png", 
          "name" => "Por mi barrio",  
          "desc" => "Esta es una plataforma para hacer reclamos por roturas y problemas que veas en la ciudad junto a vecinos y vecinas, manteniéndote al tanto del proceso de reparación."),
    
    //Aqualert
    array( "cssCats" => "app cat_1 cat_2 cat_9", 
          "url" => "http://aqualertapp.com/", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.overseasolutions.waterapp.app", 
          "urlIos" => "https://itunes.apple.com/us/app/aqualert-drinking-water-tracker/id952835359", 
          "urlWindows" => "", 
          "imgUrl" => "img/aqualert.png", 
          "name" => "Aqualert",
          "desc" => "App que ayuda a tener un buen balance de agua en tu cuerpo mediante recordatorios para tomar agua y registrando la cantidad de agua que debes beber."),
    //GpsGay
    array( "cssCats" => "app cat_1 cat_10", 
          "url" => "http://www.gpsgay.com", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.gpsgay", 
          "urlIos" => "https://itunes.apple.com/app/id938119751", 
          "urlWindows" => "", 
          "imgUrl" => "img/gpsGay.png", 
          "name" => "GpsGay",
          "desc" => "Red Social, Chat para Gays y para Lesbianas, Mapa Gay, Películas y Series para ver online, Lugares y Eventos Gay, Hoteles, Noticias y artículos del ambiente."),
    //GxBus
/*    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
          "url" => "http://showcase.genexus.com/app.aspx?gxbus,es",
          "urlArticulo" => "", 
          "urlAndroid" => "", 
          "urlIos" => "https://itunes.apple.com/uy/app/gxbus-montevideo/id535368721", 
          "urlWindows" => "", 
          "imgUrl" => "img/gxbus.png", 
          "name" => "GxBus",
          "desc" => "Con 'GXBus Montevideo' podrás saber que ómnibus tomar para ir desde un punto a otro y a qué hora pasará el siguiente en tu parada."),*/
    //Boliches UY
    array( "cssCats" => "app cat_1 cat_10", 
          "url" => "http://www.bolichesuy.com.uy/", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.artech.bolichesuyv4.bolichesuy", 
          "urlIos" => "https://itunes.apple.com/us/app/boliches-uy/id981952597?mt=8", 
          "urlWindows" => "",   
          "imgUrl" => "img/bolichesuy.png", 
          "name" => "Boliches Uy",
          "desc" => "Con Boliches Uy, entérate de todo y no te quedes afuera! Todos los boliches, eventos diarios, promociones, regalos especiales y muchas sorpresas más."),
    //GuiderMVD
    array( "cssCats" => "app cat_1 cat_3 cat_9 cat_11", 
          "url" => "http://showcase.genexus.com/app.aspx?guidermvd,es", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.simplifica.guidermvd", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/guidermvd.png", 
          "name" => "GuiderMVD", 
          "desc" => "Guía interactiva de entretenimientos, servicios y comercios de Montevideo."),
    //Correo Uruguayo
    array( "cssCats" => "app cat_1 cat_5 cat_7 cat_9", 
          "url" => "http://showcase.genexus.com/app.aspx?correouruguayo,es", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.devxtend.correouruguayo.sdcorreo", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/correoUruguayo.png", 
          "name" => "Correo Uruguayo", 
          "desc" => "App para gestionar paquetes, documentos y cartas, gestionando transacciones financieras y gestiones en la Red Nacional Postal."),
    //PesoBook
    array( "cssCats" => "app cat_1 cat_9", 
          "url" => "https://labs.genexusx.com/Pesobook/pesobookhome.html", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.artech.pesobook.PesobookSD", 
          "urlIos" => "https://itunes.apple.com/us/app/pesobook/id458717860?mt=8#", 
          "urlWindows" => "", 
          "imgUrl" => "img/pesobook.png", 
          "name" => "PesoBook", 
          "desc" => "Con solo registrar su peso de forma periódica obtenga un análisis de su Índice de Masa Corporal, gráfica de evolución de su peso, tendencias, etc."),
    //ArTur
    array( "cssCats" => "app cat_1 cat_3 cat_9 cat_11", 
          "url" => "http://www.arturmobile.com/", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.devxtend.ArTurMVD", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/arTurMvd.png", 
          "name" => "ArTur Mobile", 
          "desc" => "Guía turística de la ciudad de Montevideo y la unica con reconocimiento de sitios de interes. Solo con sacarle una foto obtendras toda la información relacionada al instante."),
    //Animales sin hogar
    array( "cssCats" => "app cat_1 cat_2 cat_9 cat_10", 
          "url" => "http://showcase.genexus.com/app.aspx?animalessinhogar,es", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.simplifica.ash.dashboardash", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/animalesSinHogar.png", 
          "name" => "Animales sin hogar", 
          "desc" => "Es el lugar perfecto para comenzar si estás pensando en adoptar un perro o gato. También para publicar el extravío de tus mascotas."),
    //UTE
    array( "cssCats" => "app cat_1 cat_5 cat_7 cat_9", 
          "url" => "http://showcase.genexus.com/app.aspx?ute,es",         
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.puntoexe.ute", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/ute.png", 
          "name" => "Ute", 
          "desc" => "Permite realizar reclamos por falta de energía, aportar la lectura del medidor, solicitar el detalle de las facturas y conocer el importe total de tu deuda."),
    
    
    //Paganza
    array( "cssCats" => "app cat_1 cat_7 cat_8 cat_9", 
          "urlArticulo" => "", 
          "url" => "https://www.paganza.com/ComoFunciona/", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=paganza.android&amp;hl=es", 
          "urlIos" => "https://itunes.apple.com/us/app/paganza/id566320731", 
          "urlWindows" => "http://www.windowsphone.com/en-us/store/app/paganza/c58e0f0b-bd9f-4412-b0c6-885687e9dc0e", 
          "imgUrl" => "img/paganza.png", 
          "name" => "Paganza", 
          "desc" => "Escaneás el código de barras de tu factura, confirmás los datos y agendás el pago. En la fecha agendada el sistema realiza un débito controlado en tu cuenta."),
    
    
    //Voy en taxi
    array( 
        "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
        "name" => "Voy en taxi", 
        "desc" => "Voy en Taxi es la aplicación de smartphone uruguaya con la que podrás pedir taxi en todo el territorio nacional.",
        "urlArticulo" => "", 
        "url" => "http://www.voyentaxi.com/", 
        "urlAndroid" => "https://play.google.com/store/apps/details?id=info.voyentaxi", 
        "urlIos" => "https://itunes.apple.com/us/app/voy-en-taxi/id939470696?l=es&ls=1&mt=8", 
        "urlWindows" => "", 
        "imgUrl" => "img/voyEnTaxi.png"), 
    
    //Montevideo Parking
    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
          "url" => "",
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.fmazzoli.android.mvdparking", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/montevideoParking.png", 
          "name" => "Montevideo Parking", 
          "desc" => "Olvidate de ir al kiosco o escribir el SMS para pagar por el estacionamiento tarifado de Montevideo (Uruguay)."),
    //Montevideo Mobile Parking
    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
          "url" => "", 
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=com.avannza", 
          "urlIos" => "", 
          "urlWindows" => "", 
          "imgUrl" => "img/montevideoMobileParking.png", 
          "name" => "Montevideo Mobile Parking", 
          "desc" => "Aplicación que permite la compra de estacionamiento tarifado en la ciudad de Montevideo, a través del servicio SMS brindado por la Intendencia Municipal."),

    
        //Teatro solis
    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
          "url" => "",
          "urlArticulo" => "", 
          "urlAndroid" => "https://play.google.com/store/apps/details?id=uy.com.montevideo.teatrosolis", 
          "urlIos" => "http://itunes.apple.com/es/app/id536557782?mt=8", 
          "urlWindows" => "", 
          "imgUrl" => "img/teatroSolis.png", 
          "name" => "Teatro solis", 
          "desc" => "Aplicación oficial del Teatro Solís de Montevideo. Programación, localidades y galería de imágenes"),
    
        //MAM
    array( "cssCats" => "app cat_1 cat_3 cat_4 cat_7 cat_9", 
          "url" => "", 
          "imgUrl" => "img/mam.png", 
          "urlArticulo" => "", 
        "urlAndroid" => "https://play.google.com/store/apps/details?id=com.mamapp", 
        "urlIos" => "", 
        "urlWindows" => "", 
          "name" => "MAM", 
          "desc" => "Te invitamos a disfrutar de un recorrido histórico con Audioguías en las que descubrirás detalles y curiosidades del MAM, Mercado Agrícola de Montevideo."),
    
    

    //**********************************************************
    //Esta seccion nunca se debe borrar y si se agrega una nueva cat, hay que agregarsela
    //Tu app!
    array( "cssCats" => "app cat_1 cat_2 cat_3 cat_4 cat_5 cat_6 cat_7 cat_8 cat_9 cat_10 cat_11", 
        "url" => "",
          
        "urlArticulo" => "http://www.montevideointeligente.uy/postular-app/", 
        "urlAndroid" => "", 
        "urlIos" => "", 
        "urlWindows" => "", 
        "imgUrl" => "img/tuApp.png", 
        "name" => "Sugerir app",
        "desc" => "Si eres usuario de alguna aplicación que no está en el catálogo o sos un desarrollador que quiere promocionar tu app no dudes en hacerlo aquí!  "),
    );

    return $arr_apps;
}


function Cats(){
    
    $arr_cats = array(
    //Cat 1
    array( "idCat" => "cat_1", 
           "css" => "fa fa-tablet", 
           "name" => "Tecnología", 
           "desc" => "Aunque no solo de la tecnología viven las ciudades, las TIC (tecnologías de la información y la comunicación) son parte de la espina dorsal de cualquier sociedad que quiera llamarse 'inteligente'." ),
    //Cat 2
    array( "idCat" => "cat_2", 
           "css" => "fa fa-tint", 
           "name" => "Medio ambiente", 
           "desc" => "En esta dimensión, los siguientes factores son imprescindibles para la ciudad: la mejora de la sostenibilidad medioambiental a través de planes anticontaminación; el apoyo a los edificios verdes y las energías alternativas; una gestión eficiente del agua, y políticas que ayuden a contrarrestar los efectos del cambio climático." ),
    //Cat 3
    array( "idCat" => "cat_3", 
           "css" => "fa fa-road", 
           "name" => "Movilidad y transporte", 
           "desc" => "En este ámbito, dos de los grandes retos para el futuro son facilitar el movimiento por las ciudades, muchas veces de grandes dimensiones, y facilitar el acceso a los servicios públicos." ),
    //Cat 4
    array( "idCat" => "cat_4", 
           "css" => "fa fa-cogs", 
           "name" => "Planificación urbana", 
           "desc" => "Para mejorar la habitabilidad de cualquier territorio, es necesario tener en cuenta los planes maestros locales y el diseño de zonas verdes y espacios de uso público, así como apostar por un crecimiento inteligente. Los nuevos métodos de urbanismo deben centrarse en crear ciudades compactas, bien conectadas y con servicios públicos accesibles." ),
    //Cat 5
    array( "idCat" => "cat_5", 
           "css" => "fa fa-institution", 
           "name" => "Gobernanza", 
           "desc" => "El ciudadano es el punto de encuentro para solucionar todos los retos que afrontan las ciudades. Por ello, deben tenerse en cuenta factores como el nivel de participación ciudadana; la capacidad de las autoridades para involucrar a los líderes empresariales y agentes locales, y la aplicación de planes de e Gobierno." ),
    //Cat 6
    array( "idCat" => "cat_6", 
           "css" => "fa fa-street-view", 
           "name" => "Participación ciudadana", 
           "desc" => "La participación ciudadana comprende al conjunto de acciones o iniciativas que pretenden impulsar el desarrollo local y la democracia participativa, otorgándole al ciudadano la posibilidad de gestionar su entorno." ),
    //Cat 7
    array( "idCat" => "cat_7", 
           "css" => "fa fa-line-chart", 
           "name" => "Gestión pública", 
           "desc" => "Se trata de las acciones destinadas a mejorar la eficiencia de la Administración, incluyendo el diseño de nuevos modelos organizativos y de gestión. En este apartado se abren grandes
oportunidades para la iniciativa privada, la cual puede aportar una mayor eficiencia." ),
    //Cat 8
    array( "idCat" => "cat_8", 
           "css" => "fa fa-money", 
           "name" => "Economía", 
           "desc" => "Esta dimensión incluye todos aquellos aspectos que promueven el desarrollo económico de un territorio: planes de promoción económica local, planes de transición, planes industriales estratégicos, y generación de clústeres, innovación e iniciativas emprendedoras." ),
    //Cat 9
    array( "idCat" => "cat_9", 
           "css" => "fa fa-home", 
           "name" => "Habitantes", 
           "desc" => "El principal objetivo de toda ciudad debería ser mejorar su capital humano. Por tanto, debe ser capaz de atraer y retener talento; crear planes para mejorar la educación, e impulsar la creatividad y la investigación." ),
    //Cat 10
    array( "idCat" => "cat_10", 
           "css" => "fa fa-group", 
           "name" => "Cohesión social", 
           "desc" => "La preocupación por el entorno social de la ciudad requiere el análisis de factores como la inmigración, el desarrollo de las comunidades, el cuidado de los mayores, la eficacia del sistema de salud, y la seguridad ciudadana." ),
    //Cat 11
    array( "idCat" => "cat_11", 
           "css" => "fa fa-bullhorn", 
           "name" => "Proyección internacional", 
           "desc" => "Apunta a la internacionalización de las actividades, servicios o prácticas locales, promoviendo éstas en un contexto global que se nutre y destaca las buenas prácticas." ),
    //Cat 12
    /*array( "idCat" => "cat_12", 
           "css" => "fa fa-user-md", 
           "name" => "Salud", 
           "desc" => "Texto descriptivo PENDIENTE!" ),        */
    );
    
    
    return $arr_cats;
}

?>