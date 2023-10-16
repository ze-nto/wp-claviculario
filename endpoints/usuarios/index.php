<?php

require_once('usuario_get.php');
require_once('usuario_post.php');
require_once('usuario_put.php');
require_once('usuario_delete.php');
require_once('usuario_current_get.php');
require_once('usuario_list_users.php');

function registrar_api_usuario_get () {
  register_rest_route( 'api', '/usuario', [
    [
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_usuario_get' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_usuario_get');
  

function registrar_api_usuario_list_get () {
  register_rest_route( 'api', '/usuarios', [
    [
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_usuario_list_get' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_usuario_list_get');
  
function registrar_api_current_user_get () {
  register_rest_route( 'api', '/usuario/current', [
    [
      'methods' => WP_REST_Server::READABLE,
      'callback' => 'api_usuario_current_get' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_current_user_get');
  
function registrar_api_usuario_post () {
  register_rest_route( 'api', '/usuario', [
    [
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'api_usuario_post' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_usuario_post');

function registrar_api_usuario_put () {
  register_rest_route( 'api', '/usuario', [
    [
      'methods' => WP_REST_Server::EDITABLE,
      'callback' => 'api_usuario_put' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_usuario_put');

function registrar_api_usuario_delete () {
  register_rest_route( 'api', '/usuario', [
    [
      'methods' => WP_REST_Server::DELETABLE,
      'callback' => 'api_usuario_delete' 
    ]
  ]);
}

add_action('rest_api_init', 'registrar_api_usuario_delete');


