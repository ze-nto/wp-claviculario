<?php

  function get_chave_id_by_slug($slug) {

    $query = new WP_Query([
      'name' => $slug,
      'post_type' => 'chave',
      'numberposts' => 1,
      'fields' => 'ids'
    ]);

    $posts = $query->get_posts();

    return array_shift($posts);
  }