<?php
require_once('chave_post.php');
require_once('chave_get.php');
require_once('chave_list_get.php');


function registrar_api_chave_get () {
  register_rest_route( 'api', '/chaves/(?P<slug>[-\w]+)', [
    [
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_chave_get' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_chave_get');

function registrar_api_chave_list_get () {
  register_rest_route( 'api', '/chaves', [
    [
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_chave_list_get' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_chave_list_get');

function registrar_api_chave_post () {
  register_rest_route( 'api', '/chaves', [
    [
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'api_chave_post' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_chave_post');
