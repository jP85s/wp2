<?php
//primero creamos la función que oculte los Tabs cuando se cree un nuevo post o page.
function hide_editor_tabs() {
    global $pagenow;

    // Esto solo imprimirá el css cuando se abra el editor de un post o page
    if ( ! ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) ) {
        return;
    }

?>
<!-- Css a imprimir -->
<style>
    .wp-editor-tabs {
        display: none;
    }
</style>
<?php
}
//Segunco creamos la función que devolverá el valor tinymce (osea el editor visual de WP)
function force_default_editor() {
    return 'tinymce';
}

//""preguntamos si quien mira el editor NO es un admin, y si no lo es, que ejecute nuestras acciones"".
if(is_admin()){
    add_action( 'admin_head', 'hide_editor_tabs' );
    add_filter( 'wp_default_editor', 'force_default_editor' );
}
?>
