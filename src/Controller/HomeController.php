<?php
namespace App\Controller;
use App\ModelBuilder\Pays;
/**
*
*/
class HomeController extends Controller
{
  public function index()
  {

    echo "
    <link rel='stylesheet' href='/index.css'>
    <div class='mainContainer'>
      <div id='map'></div>
      <button class='addPointInteret'>Ajouter un point d'interet</button>
      <button class='searchPointInteret'>Rechercher un point d'interet par ville</button>
      <div id='descriptionContainer'>
        Selectionnez un marqueur sur la map ou recherchez une ville ci-dessous
      </div>

    </div>






    <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyBw-IlXTywvCsFcR3arfT_bWOuqPh93UqU&libraries=places&amp;'></script>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='/js/vue.js'></script>
    <script src='/js/commentaires.js'></script>
    <script src='/js/ggmap.js'></script>
    ";
  }


}


?>
