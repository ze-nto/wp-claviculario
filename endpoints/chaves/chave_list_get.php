<?php
  require_once(ABSPATH . "wp-content/themes/api/utils/erros.php");
  require_once(ABSPATH . "wp-content/themes/api/utils/chaves_id.php");

  function api_chave_list_get ($request) {

    $user = wp_get_current_user();
    $user_id = $user->ID;
    $slug = $request['slug'];
    $post_id = get_chave_id_by_slug($slug);

    if($user_id > 0) {
      if(!$post_id){
        $response = lancar_erro('no_chave');
      } else {
        $q = sanitize_text_field($request['q'])?: '';
        $_page = sanitize_text_field($request['_page'])?: 0;
        $_limit = sanitize_text_field($request['_limit'])?: 10;
        $laboratorio = sanitize_text_field($request['laboratorio']);
        $query = [
          'post_type' => 'chave',
          'posts_per_page' => $_limit,
          'paged' => $_page,
          's' => $q
        ];

        $loop = new WP_Query($query);
        $chaves = $loop->posts;
        $response = $chaves;
      }

      
    }else {
      $response = lancar_erro('permissao');
    }

    return rest_ensure_response($response);
  }


  
?>