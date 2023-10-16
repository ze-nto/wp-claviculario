<?php
  require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");
  require_once(ABSPATH . "wp-content/themes/api/utils/chaves_id.php");
  require_once(ABSPATH . "wp-content/themes/api/models/chave_model.php");

  function api_chave_get ($request) {

    $user = wp_get_current_user();
    $user_id = $user->ID;
    $slug = $request['slug'];
    
    if($user_id > 0) {
      $response = chave_model($slug);
    }else {
      $response = lancar_erro('permissao');
    }

    return rest_ensure_response($response);
  }


  
?>