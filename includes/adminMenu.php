<?php
// create custom plugin settings menu
add_action('admin_menu', 'mvdTransp_plugin_create_menu');

function mvdTransp_plugin_create_menu() {
	//Top menu level mvdTransp Settings
	add_menu_page('MvdTransparency Plugin Settings', 'MvdTransparency Settings', 'administrator', 
	'mvdTransp_plugin_settings', 'mvdTransp_plugin_settings_page' , 'dashicons-admin-generic' );

	//call register settings function
	add_action( 'admin_init', 'mvdTransparencyRegisterSettings' );
}


function mvdTransparencyRegisterSettings() {
	//para registrar variables
    //Datos de la campaña
    //Activa
    register_setting( 'mvdTransparency-settings-group', 'camp_isActive' );
    //Nombre
	register_setting( 'mvdTransparency-settings-group', 'camp_name' );
    register_setting( 'mvdTransparency-settings-group', 'camp_showName' );
    //Sub titulo
    register_setting( 'mvdTransparency-settings-group', 'camp_subTitle' );
    register_setting( 'mvdTransparency-settings-group', 'camp_showSubTitle' );
    //Descripcion
    register_setting( 'mvdTransparency-settings-group', 'camp_description' );
    register_setting( 'mvdTransparency-settings-group', 'camp_showDescription' );
    //Imagen
	register_setting( 'mvdTransparency-settings-group', 'camp_imgUrl' );
    //fechas
    register_setting( 'mvdTransparency-settings-group', 'camp_desde' );
    register_setting( 'mvdTransparency-settings-group', 'camp_hasta' );
    //porcentaje de donacion
    register_setting( 'mvdTransparency-settings-group', 'camp_porc_charity' );
    
    if( is_admin() && ! empty ( $_SERVER['PHP_SELF'] ) && 'upload.php' !== basename( $_SERVER['PHP_SELF'] ) ) {
        add_action( 'admin_enqueue_scripts', 'mvdTransparencyAdmin_load_media' );
    }
}

function mvdTransparencyAdmin_load_media() {
    wp_enqueue_media();
}
    
function mvdTransp_plugin_settings_page() {
?>
<div class="wrap">
<header>
    <img src=" <?php echo plugins_url() .  '/MvdTransparency/img/logocerebrum.png' ?>"/>
    <h2>MvdTransparency Plugin</h2>
    <h4>Plugin para ser transparente con los numeros.</h4>
</header>
<form method="post" action="options.php">
    <?php settings_fields( 'mvdTransparency-settings-group' ); ?>
    <?php do_settings_sections( 'mvdTransparency-settings-group' ); ?>
    <h3>Ingrese los datos para la campaña del momento</h3>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Mostrar Transparencia:</th>
            <td>
                <input type="checkbox" name="camp_isActive" value="IS_ACTIVE" <?php if( esc_attr( get_option('camp_isActive','IS_ACTIVE') )=== "IS_ACTIVE" ){
                                                                                       echo "CHECKED"; 
                                                                                    }else{
                                                                                        echo ""; 
                                                                                    } ?> />
            </td>
        </tr>
        
        <tr valign="top">
            <th scope="row">Título:</th>
            <td>
                <input type="text" name="camp_name" value="<?php echo esc_attr( get_option('camp_name',"Campaña del momento") ); ?>" REQUIRED/>
                <input type="checkbox" title="Mostrar título de campaña" name="camp_showName" value="SHOW" <?php if( esc_attr( get_option('camp_showName') )=== "SHOW" ){
                                                                                       echo "CHECKED"; 
                                                                                    }else{
                                                                                        echo ""; 
                                                                                    } ?>/>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Sub-título:</th>
            <td>
                <input type="text" name="camp_subTitle" value="<?php echo esc_attr( get_option('camp_subTitle',"INNOVA, AYUDA Y VESTITE BIEN.") ); ?>" REQUIRED/>
                <input type="checkbox" title="Mostrar sub-título de campaña" name="camp_showSubTitle" value="SHOW" <?php if( esc_attr( get_option('camp_showSubTitle') )=== "SHOW" ){
                                                                                       echo "CHECKED"; 
                                                                                    }else{
                                                                                        echo ""; 
                                                                                    } ?>/>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Descripción:</th>
            <td>
                <input type="text" name="camp_description" value="<?php echo esc_attr( get_option('camp_description',"PARA CONSTRUIR UN MONTEVIDEO MÁS INTELIGENTE, TENEMOS QUE PONERNOS LA CAMISETA!") ); ?>" REQUIRED/>
                <input type="checkbox" title="Mostrar descripción de campaña" name="camp_showDescription" value="SHOW" <?php if( esc_attr( get_option('camp_showDescription') )=== "SHOW" ){
                                                                                       echo "CHECKED"; 
                                                                                    }else{
                                                                                        echo ""; 
                                                                                    } ?>/>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Url imagen:</th>
            <td>
                <input type="url" name="camp_imgUrl" placeholder="http://" class="mvdMediaInput" value="<?php 
               echo esc_attr( get_option('camp_imgUrl',plugins_url() .  '/MvdTransparency/img/logoGenericCampaign.png')); 
            ?>" REQUIRED/>
            <button class="mvdMediaButton">Desde biblioteca de medios</button>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Fecha desde:</th>
            <td>
                <input type="date" maxlength="10" name="camp_desde" placeholder="mm-dd-yyyy" value="<?php echo esc_attr( get_option('camp_desde','07-08-2015') ); ?>" title="Date must be in 'mm/dd/yyyy format.'" REQUIRED/>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Fecha hasta:</th>
            <td>
                <input type="date"  maxlength="10"  name="camp_hasta" placeholder="mm-dd-yyyy" value="<?php echo esc_attr( get_option('camp_hasta','08-08-2015') ); ?>" title="Date must be in 'mm/dd/yyyy format.'" REQUIRED/>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Porcentaje donación:</th>
            <td>
                <input type="text" name="camp_porc_charity" placeholder="30%" value="<?php echo esc_attr( get_option('camp_porc_charity',"35") ); ?>" pattern="^(?!(?:0|0\.0|0\.00)$)[+]?\d+(\.\d|\.\d[0-9])?$" title="Porcentaje must be zero or positive and may contain decimals.'" REQUIRED/>
            </td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
<script type="text/javascript">
    
    // Uploading files
    var file_frame;

    jQuery('.mvdMediaButton').live('click', function( event ){

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
          file_frame.open();
          return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
          title: "Seleccionar imagen",
          library: { type: 'image' },
          button: { text: 'Use selected image'},
          multiple: false  // Set to true to allow multiple files to be selected
        });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();

      // Do something with attachment.id and/or attachment.url here
        jQuery('.mvdMediaInput').val(attachment.url);
    });

    // Finally, open the modal
    file_frame.open();
  });
</script>
</div>
<?php } ?>