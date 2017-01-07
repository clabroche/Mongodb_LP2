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
      <form action='country_add' method='POST'>
        <input type='submit' value='Ajouter un pays'>
      </form>
      <form action='countries' method='GET'>
        <input type='submit' value='Afficher les pays'>
      </form>
      <hr>
      <form action='city_add' method='POST'>
        <input type='submit' value='Ajouter une ville'>
      </form>


        <input type='text' name='address' id='adress_autocomplete' />
        <input type='text' name='point_name' id='point_name' placeholder=\"Nom du point d'interet\">
        <input type='text' name='point_description' id='point_description' placeholder=\"Description du point d'interet\">
        <button id='point_submit'>Ajouter Point d'interet</button>

        <div id='map' style='width:50vw;height:100vh;'></div>
        <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyBw-IlXTywvCsFcR3arfT_bWOuqPh93UqU&libraries=places&amp;'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script src='/js/ggmap.js'></script>
    ";
  }

}


 ?>
