<?php

function chave_model ($slug) {
  $post_id = get_chave_id_by_slug($slug);
  if(!$post_id){
    $response = lancar_erro('no_chave');
  } else {
    $post = get_post($post_id);
    $post_meta = get_post_meta($post_id);
    $autor = get_user_by('ID', $post->post_author)->user_email;
    $response = [
      'id' => $post->ID,
      'laboratório' => $post->post_title,
      'tipo' => $post_meta['tipo'][0],
      'nome_usuario' => $autor,
      'emprestada' => false,
    ];
    }

  return $response;
}


?>