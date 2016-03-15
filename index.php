<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies</title>
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
  </head>
  <body>
    <div class="container">
      <div class="panel-heading">
        <img src="images/pagina_actor.jpg" class="img-rounded img-responsive">
      </div>
      <div class="panel-heading" style="background-color: #6699ff;">
        <form method="post" id="frSearch" role="search" onsubmit="return false;">
            <div class="form-group">
              <input type="text" class="form-control" id="search" name="search" placeholder="Buscar Actor">
            </div>
            <button style="display: none" class="btn btn-default" onclick="addMessageProcess(); getActors('frSearch', 'divInfoActors', 'divInfoMovies')">Buscar</button>
        </form>
      </div>
      <div id="divInfoActors" class="panel-body"></div>
      <div id="divInfoMovies" class="panel-body"></div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/jquery.blockUI.js"></script>        
  </body>
</html>
