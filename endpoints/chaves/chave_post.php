<?php
  require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");

  function api_chave_post ($request) {
    $user = wp_get_current_user();
    $user_id = $user->ID;
    $user_name = $user->first_name . ' ' . $user->last_name;
    $user_cap = current_user_can('publish_posts');

    if($user_id > 0 && $user_cap) {
      $laboratorio = sanitize_text_field($request['laboratorio']);
      $tipo = sanitize_text_field($request['tipo']);
      
      $response = [
        'post_author' => $user_id,
        'post_type' => 'chave',
        'post_title' => $laboratorio,
        'post_status' => 'publish',
        'meta_input' => [
          'tipo' => $tipo,
          'nome_usuario' => $user_name,
          'emprestada' => 'false',
        ]
      ];
      
      if($laboratorio && $tipo){
        $chave_id = wp_insert_post($response);
        $response['id'] = get_post_field('ID', $chave_id);
      }else {
        $response = lancar_erro('campo', ['laboratorio', 'tipo']);
      }
      
    }else {
      $response = lancar_erro('permissao');
    }

    return rest_ensure_response($response);
  }


  
?>