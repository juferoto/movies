<?php
  if(!empty($info)){
    $scan = get_headers('http://image.tmdb.org/t/p/w500'.$info['basic']['profile_path']);
    if ($scan[0] == 'HTTP/1.1 200 OK') {
      $pathImg = 'http://image.tmdb.org/t/p/w500'.$info['basic']['profile_path'];
    } else {
      $pathImg = 'images/unknownMovie.png';
    }

    $content = '<div class="container">'.
      '<div class="row">'.
          '<div class="col-sm-2 col-md-2">'.
              '<img src="'.$pathImg.'" alt="" class="img-rounded img-responsive" />'.
          '</div>'.
          '<div class="col-sm-4 col-md-4">'.
              '<h1> '.$info['basic']['name'].'</h1>'.
                  '<p>Fecha de Nacimiento: <i class="glyphicon glyphicon-gift"></i>'.$info['basic']['birthday'].'</p>'.
          '</div>'.
      '</div>'.
    '</div><br /><h3>Trayectoria del Artista:</h3>';
    echo $content;
    foreach($info['cast'] as $key=>$data){
      $scan = get_headers('http://image.tmdb.org/t/p/w500'.$data['poster_path']);
      if ($scan[0] == 'HTTP/1.1 200 OK') {
        $pathImg = 'http://image.tmdb.org/t/p/w500'.$data['poster_path'];
      } else {
        $pathImg = 'images/unknownMovie.png';
      }

      $table  = '<div class="media">'.
        '<a class="pull-left" href="#">'.
          '<img class="media-object img-rounded" style="width: 150px;" src="'.$pathImg.'">'.
        '</a>'.
        '<div class="media-body">'.
          '<h4 class="media-heading">'.$data['original_title'].'</h4>'.
          '<p>Fecha de lanzamiento: '.$data['release_date'].'<p/>'.
          '<p>'.$data['overview'].'<p/>'.
        '</div>'.
      '</div>';
      echo $table;
    }
  }
?>
