function guardar_encuesta() {
    if (isset($_POST['satisfaccion']) && isset($_POST['mejora'])) {
        global $wpdb;
        $tabla = $wpdb->prefix . "encuestas";
        
        $wpdb->insert(
            $tabla,
            array(
                'satisfaccion' => sanitize_text_field($_POST['satisfaccion']),
                'mejora' => sanitize_textarea_field($_POST['mejora']),
                'fecha' => current_time('mysql'),
            )
        );
    }
    
    wp_redirect(home_url('/gracias')); 
    exit();
}

add_action('admin_post_nopriv_guardar_encuesta', 'guardar_encuesta'); 
add_action('admin_post_guardar_encuesta', 'guardar_encuesta');
