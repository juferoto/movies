<?php

  class ActionMovies
  {

    /*******************************************
    Descripción: Funcion encargada de buscar un Actor segun lo escrito por el usuario
    Autor:			 Juan Felipe Rodriguez Torres
    *******************************************/
    function searchActor()
    {
      $output = "";
      if (!empty($_REQUEST['search'])){
        $search = $_REQUEST['search'];
        $maps_url = 'https://'.
        'api.themoviedb.org/'.
        '3/search/person'.
        '?query='.urlencode($search).
        '&api_key=70f066278d1591f2303ef0fe73e5998d';
        $maps_json  = file_get_contents($maps_url);
        $maps_array = json_decode($maps_json, true);
        $info       = $maps_array['results'];
        $output     = include_once('../views/viewResult.php');
      }
      echo $output;
      // return true;
    }

    /*******************************************
    Descripción: Funcion encargada de buscar el Actor y su cronologia respectiva, de las peliculas en las cuales a participado
    Autor:			 Juan Felipe Rodriguez Torres
    *******************************************/
    function searchBySelected()
    {
      $output = "";
      if (!empty($_REQUEST['select'])){
          $search = $_REQUEST['select'];
          $maps_url = 'https://'.
          'api.themoviedb.org/'.
          '3/person'.
          '/'.urlencode($search).
          '?api_key=70f066278d1591f2303ef0fe73e5998d';
          $maps_json  = file_get_contents($maps_url);
          $maps_basic = json_decode($maps_json, true);

          $maps_url = 'https://'.
          'api.themoviedb.org/'.
          '3/discover/movie'.
          '?api_key=70f066278d1591f2303ef0fe73e5998d'.
          '&sort_by=release_date.asc&with_cast='.urlencode($search);
          $maps_json  = file_get_contents($maps_url);
          $maps_array = json_decode($maps_json, true);

          $info['basic']      = $maps_basic;
          $info['cast']       = $maps_array['results'];
          $output     = include_once('../views/viewSelect.php');
      }
      echo $output;
      // return true;
    }

  }

  /*
  * Apartir de la accion seleccionada se realiza la funcion correspondiente
  */
  $action  = $_REQUEST['action'];
  $objCl   = new ActionMovies();
  switch ($action) {
    case 1:
      $objCl->searchActor();
      $action = "";
      break;
    case 2:
      $objCl->searchBySelected();
      $action = "";
      break;
  }

?>
