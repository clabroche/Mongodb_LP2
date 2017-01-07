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
    ";
  }

}


 ?>
