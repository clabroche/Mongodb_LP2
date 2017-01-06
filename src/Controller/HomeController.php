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
