<?php
    function cadastrar_laboratorio() 
    {
        register_post_type( 'laboratorio', array(
            'label' => 'Laboratórios',
            'descrição' => 'Laboratórios',
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'rewrite' => [
                'slug' => 'laboratorio', 
                'with_front' => true
            ],
            'query_var' => true,
            'supports' => [
                'custom-fields',
                'author',
                'title'
            ],
            'publicly_queryable' => true
        ));
    }

    add_action( 'init', 'cadastrar_laboratorio');

?>