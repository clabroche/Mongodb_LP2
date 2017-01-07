<?php
namespace App\ModelBuilder;
class Model
{
  public function getCollection($collection)
  {
    $collection = (new \MongoDB\Client)->app->$collection;
    return  $collection->find();
  }
  public function all($collection)
  {
      $collection = (new \MongoDB\Client)->app->$collection;
      $departementsCollection = $collection->find();
      $arrayDepartements = array();
      foreach ($departementsCollection as $departmentsInfos) {
        $arrayDepartements[] = $departmentsInfos;
      }
      return $arrayDepartements;
  }

  public function findOne($collection, $element)
  {
    $collection = (new \MongoDB\Client)->app->$collection;
    $departementsCollection = $collection->find($element);
    foreach ($departementsCollection as $key => $value) {
      return $value;
    }
  }

  public function addItemToOne($collection, $element)
  {
    $collection = (new \MongoDB\Client)->app->$collection;
    $updatedItem = $collection->update($element);
  }


  public function insert($collection, $elements)
  {
    $collection = (new \MongoDB\Client)->app->$collection;
    $insertManyResult = null;
    foreach ($elements as $key => $value) {
      $insertManyResult = $collection->insertOne($value);
    }
    return "";
  }

}


 ?>
