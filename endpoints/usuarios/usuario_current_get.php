<?php
 
  function api_usuario_current_get ($request) {
      $user = wp_get_current_user();
      
      if ($user) {
        $response = $user;
      }else{
        $response = new WP_Error('usuario', 'Nenhum usuário logado', [ 'status' => 401]);
      }
   
    return rest_ensure_response($response);
  }


?>