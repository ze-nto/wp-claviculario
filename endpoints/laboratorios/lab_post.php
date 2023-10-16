<?php

  function api_laboratorio_post ($request) {
    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id > 0) {
      $nome = sanitize_text_field($request['nome']);
      $numero = sanitize_text_field($request['numero']);
      
      $response = [
        'post_author' => $user_id,
        'post_type' => 'laboratorio',
        'post_title' => $nome,
        'post_status' => 'publish',
        'meta_input' => [
          'numero' => $numero,
        ]
      ];
      
      $lab_id = wp_insert_post($response);
      $response['id'] = get_post_field('post_name', $lab_id);

      
    }else {
      $response = new WP_Error('permissao', 'Usuário não possui permissao', ['status' => 401] );
    }

    return rest_ensure_response($response);
  }


?>