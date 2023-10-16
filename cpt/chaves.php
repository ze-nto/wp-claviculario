<?php
    function cadastrar_chave() 
    {
        register_post_type( 'chave', array(
            'label' => 'Chaves',
            'descrição' => 'Chaves',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'rewrite' => array(
                'slug' => 'chave', 
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

    add_action( 'init', 'cadastrar_chave');

?>