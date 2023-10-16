<?php

require_once('lab_post.php');

function registrar_api_laboratorio_post () {
    register_rest_route( 'api', '/laboratorio', [
      [
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'api_laboratorio_post' 
      ]
    ]);
  }

  add_action('rest_api_init', 'registrar_api_laboratorio_post');


  ?>