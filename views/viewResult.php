<?php
  if(!empty($info)){
    $count = 1;
    // $table = '';
    foreach($info as $key=>$data){
      $table = '';
      $scan = get_headers('http://image.tmdb.org/t/p/w500'.$data['profile_path']);
      if ($scan[0] == 'HTTP/1.1 200 OK') {
        $pathImg = 'http://image.tmdb.org/t/p/w500'.$data['profile_path'];
      } else {
        $pathImg = 'images/unknown.png';
      }
      if ($count == 1) {
        $table  .= '<div class="row">';
      }
      $table  .= '<div class="col-sm-6 col-md-4">'.
          '<div class="thumbnail">'.
            '<img src="'.$pathImg.'">'.
            '<div class="caption">'.
              '<h3>'.$data['name'].'</h3>'.
              '<p style="font-style:italic;">Popularidad: '.$data['popularity'].'<p/>'.
              '<p><a onClick="addMessageProcess(); getMoviesByActor(\''.$data['id'].'\', \'divInfoMovies\', \'divInfoActors\')" class="btn btn-primary" role="button">Ver info <i class="glyphicon glyphicon-eye-open"></i></a></p>'.
            '</div>'.
          '</div>'.
        '</div>';
      if ($count == 3) {
        $table .= '</div>';
        $count = 0;
      }
      $count++;
      echo $table;
    }
  }
?>
