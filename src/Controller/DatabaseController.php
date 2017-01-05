<?php
namespace App\Controller;
use App\ModelBuilder\Departement;
use App\ModelBuilder\Pays;
/**
 *
 */
class DatabaseController extends Controller
{
  public function index()
  {
    $departementsInsert = array();
    $departementsInsert[] = array('code'=>'01','nom'=>'Ain');
    $departementsInsert[] = array('code'=>'02','nom'=>'Aisne');
    $departementsInsert[] = array('code'=>'03','nom'=>'Allier');
    $departementsInsert[] = array('code'=>'04','nom'=>'Alpes de Haute Provence');
    $departementsInsert[] = array('code'=>'05','nom'=>'Hautes Alpes');
    $departementsInsert[] = array('code'=>'06','nom'=>'Alpes Maritimes');
    $departementsInsert[] = array('code'=>'07','nom'=>'Ardèche');
    $departementsInsert[] = array('code'=>'08','nom'=>'Ardennes');
    $departementsInsert[] = array('code'=>'09','nom'=>'Ariège');
    $departementsInsert[] = array('code'=>'10','nom'=>'Aube');
    $departementsInsert[] = array('code'=>'11','nom'=>'Aude');
    $departementsInsert[] = array('code'=>'12','nom'=>'Aveyron');
    $departementsInsert[] = array('code'=>'13','nom'=>'Bouches du Rhône');
    $departementsInsert[] = array('code'=>'14','nom'=>'Calvados');
    $departementsInsert[] = array('code'=>'15','nom'=>'Cantal');
    $departementsInsert[] = array('code'=>'16','nom'=>'Charente');
    $departementsInsert[] = array('code'=>'17','nom'=>'Charente Maritime');
    $departementsInsert[] = array('code'=>'18','nom'=>'Cher');
    $departementsInsert[] = array('code'=>'19','nom'=>'Corrèze');
    $departementsInsert[] = array('code'=>'2A','nom'=>'Corse du Sud');
    $departementsInsert[] = array('code'=>'2B','nom'=>'Haute Corse');
    $departementsInsert[] = array('code'=>'21','nom'=>'Côte d\'Or');
    $departementsInsert[] = array('code'=>'22','nom'=>'Côtes d\'Armor');
    $departementsInsert[] = array('code'=>'23','nom'=>'Creuse');
    $departementsInsert[] = array('code'=>'24','nom'=>'Dordogne');
    $departementsInsert[] = array('code'=>'25','nom'=>'Doubs');
    $departementsInsert[] = array('code'=>'26','nom'=>'Drôme');
    $departementsInsert[] = array('code'=>'27','nom'=>'Eure');
    $departementsInsert[] = array('code'=>'28','nom'=>'Eure et Loir');
    $departementsInsert[] = array('code'=>'29','nom'=>'Finistère');
    $departementsInsert[] = array('code'=>'30','nom'=>'Gard');
    $departementsInsert[] = array('code'=>'31','nom'=>'Haute Garonne');
    $departementsInsert[] = array('code'=>'32','nom'=>'Gers');
    $departementsInsert[] = array('code'=>'33','nom'=>'Gironde');
    $departementsInsert[] = array('code'=>'34','nom'=>'Hérault');
    $departementsInsert[] = array('code'=>'35','nom'=>'Ille et Vilaine');
    $departementsInsert[] = array('code'=>'36','nom'=>'Indre');
    $departementsInsert[] = array('code'=>'37','nom'=>'Indre et Loire');
    $departementsInsert[] = array('code'=>'38','nom'=>'Isère');
    $departementsInsert[] = array('code'=>'39','nom'=>'Jura');
    $departementsInsert[] = array('code'=>'40','nom'=>'Landes');
    $departementsInsert[] = array('code'=>'41','nom'=>'Loir et Cher');
    $departementsInsert[] = array('code'=>'42','nom'=>'Loire');
    $departementsInsert[] = array('code'=>'43','nom'=>'Haute Loire');
    $departementsInsert[] = array('code'=>'44','nom'=>'Loire Atlantique');
    $departementsInsert[] = array('code'=>'45','nom'=>'Loiret');
    $departementsInsert[] = array('code'=>'46','nom'=>'Lot');
    $departementsInsert[] = array('code'=>'47','nom'=>'Lot et Garonne');
    $departementsInsert[] = array('code'=>'48','nom'=>'Lozère');
    $departementsInsert[] = array('code'=>'49','nom'=>'Maine et Loire');
    $departementsInsert[] = array('code'=>'50','nom'=>'Manche');
    $departementsInsert[] = array('code'=>'51','nom'=>'Marne');
    $departementsInsert[] = array('code'=>'52','nom'=>'Haute Marne');
    $departementsInsert[] = array('code'=>'53','nom'=>'Mayenne');
    $departementsInsert[] = array('code'=>'54','nom'=>'Meurthe et Moselle');
    $departementsInsert[] = array('code'=>'55','nom'=>'Meuse');
    $departementsInsert[] = array('code'=>'56','nom'=>'Morbihan');
    $departementsInsert[] = array('code'=>'57','nom'=>'Moselle');
    $departementsInsert[] = array('code'=>'58','nom'=>'Nièvre');
    $departementsInsert[] = array('code'=>'59','nom'=>'Nord');
    $departementsInsert[] = array('code'=>'60','nom'=>'Oise');
    $departementsInsert[] = array('code'=>'61','nom'=>'Orne');
    $departementsInsert[] = array('code'=>'62','nom'=>'Pas de Calais');
    $departementsInsert[] = array('code'=>'63','nom'=>'Puy de Dôme');
    $departementsInsert[] = array('code'=>'64','nom'=>'Pyrénées Atlantiques');
    $departementsInsert[] = array('code'=>'65','nom'=>'Hautes Pyrénées');
    $departementsInsert[] = array('code'=>'66','nom'=>'Pyrénées Orientales');
    $departementsInsert[] = array('code'=>'67','nom'=>'Bas Rhin');
    $departementsInsert[] = array('code'=>'68','nom'=>'Haut Rhin');
    $departementsInsert[] = array('code'=>'69','nom'=>'Rhône-Alpes');
    $departementsInsert[] = array('code'=>'70','nom'=>'Haute Saône');
    $departementsInsert[] = array('code'=>'71','nom'=>'Saône et Loire');
    $departementsInsert[] = array('code'=>'72','nom'=>'Sarthe');
    $departementsInsert[] = array('code'=>'73','nom'=>'Savoie');
    $departementsInsert[] = array('code'=>'74','nom'=>'Haute Savoie');
    $departementsInsert[] = array('code'=>'75','nom'=>'Paris');
    $departementsInsert[] = array('code'=>'76','nom'=>'Seine Maritime');
    $departementsInsert[] = array('code'=>'77','nom'=>'Seine et Marne');
    $departementsInsert[] = array('code'=>'78','nom'=>'Yvelines');
    $departementsInsert[] = array('code'=>'79','nom'=>'Deux Sèvres');
    $departementsInsert[] = array('code'=>'80','nom'=>'Somme');
    $departementsInsert[] = array('code'=>'81','nom'=>'Tarn');
    $departementsInsert[] = array('code'=>'82','nom'=>'Tarn et Garonne');
    $departementsInsert[] = array('code'=>'83','nom'=>'Var');
    $departementsInsert[] = array('code'=>'84','nom'=>'Vaucluse');
    $departementsInsert[] = array('code'=>'85','nom'=>'Vendée');
    $departementsInsert[] = array('code'=>'86','nom'=>'Vienne');
    $departementsInsert[] = array('code'=>'87','nom'=>'Haute Vienne');
    $departementsInsert[] = array('code'=>'88','nom'=>'Vosges');
    $departementsInsert[] = array('code'=>'89','nom'=>'Yonne');
    $departementsInsert[] = array('code'=>'90','nom'=>'Territoire de Belfort');
    $departementsInsert[] = array('code'=>'91','nom'=>'Essonne');
    $departementsInsert[] = array('code'=>'92','nom'=>'Hauts de Seine');
    $departementsInsert[] = array('code'=>'93','nom'=>'Seine St Denis');
    $departementsInsert[] = array('code'=>'94','nom'=>'Val de Marne');
    $departementsInsert[] = array('code'=>'95','nom'=>'Val d\'Oise');
    $departementsInsert[] = array('code'=>'97','nom'=>'DOM');
    $departementsInsert[] = array('code'=>'971','nom'=>'Guadeloupe');
    $departementsInsert[] = array('code'=>'972','nom'=>'Martinique');
    $departementsInsert[] = array('code'=>'973','nom'=>'Guyane');
    $departementsInsert[] = array('code'=>'974','nom'=>'Réunion');
    $departementsInsert[] = array('code'=>'975','nom'=>'Saint Pierre et Miquelon');
    $departementsInsert[] = array('code'=>'976','nom'=>'Mayotte');
    $pays = array('code'=>'FR','nom' => 'France');
    $departementsCollection = new Departement();
    $paysCollection = new Pays();
    $insertDepartements = $departementsCollection->insertDepartements($departementsInsert);
    $departement = $departementsCollection->getDepartement('Essonne');
    $departements = $departementsCollection->getDepartements();
    echo "<pre>";
    print_r($departements);
  }

}


 ?>
