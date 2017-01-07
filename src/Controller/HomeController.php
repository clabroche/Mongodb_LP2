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
      <input type='text' name='address' id='adress_autocomplete' />
      <div id='map'></div>
      <div id='descriptionContainer'>
        <div>Informations:</div><br>
        <div id='latitude'></div>
        <div id='longitude'></div>
      </div>



      <input type='text' name='address' id='ville_autocomplete' />


      <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyBw-IlXTywvCsFcR3arfT_bWOuqPh93UqU&libraries=places&amp;'></script>

      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
      <script src='/js/ggmap.js'></script>
    ";
  }

  public function addCountry() {
    echo "
      <form action='country_list' method='POST'>
        <input type='text' value='Nom du pays' Name='country_name'>
        <input type='submit' value='Ajouter'>
      </form>
    ";
  }

}


 ?>
