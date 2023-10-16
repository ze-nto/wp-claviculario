<?php
    function registrar_saidas() 
    {
        register_post_type( 'registros', array(
            'label' => 'Registros',
            'descrição' => 'Registros de Entradas e Saídas',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'rewrite' => array(
                'slug' => 'registros', 
                'with_front' => true
            ),
            'query_var' => true,
            'supports' => array(
                'custom-fields',
                'author',
                'title'
            ),
            'publicly_queryable' => true
        ));
    }

    add_action( 'init', 'registrar_saidas');

?>