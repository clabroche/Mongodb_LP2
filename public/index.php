<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
$config = [
    'settings' => [
        'displayErrorDetails' => true,

        'logger' => [
            'name' => 'slim-app',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/../logs/app.log',
        ],
    ],
];
$app = new \Slim\App($config);
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$app->get('/','App\Controller\HomeController:index')->setName('home');
$app->post('/','App\Controller\HomeController:index')->setName('home.post');

//on gère les routes liées aux pays
$app->post('/country_add','App\Controller\PaysController:addCountry')->setName('country_add');
$app->post('/countries','App\Controller\PaysController:index')->setName('country_list_post');
$app->get('/countries','App\Controller\PaysController:index')->setName('country_list');
$app->get('/countries/{pays_id}','App\Controller\PaysController:detailledDisplay')->setName('country_display');
$app->post('/countries/{pays_id}','App\Controller\PaysController:detailledDisplay')->setName('country_display_post');

//on gère les routes liées aux villes
$app->post('/city_add','App\Controller\VilleController:addCity')->setName('city_add');
$app->post('/cities','App\Controller\VilleController:index')->setName('city_list');
$app->get('/cities','App\Controller\VilleController:index')->setName('city_list');

$app->get('/database','App\Controller\DatabaseController:index')->setName('database');
$app->post('/api/point','App\Controller\InteretController:addInteret')->setName('addInteret');
$app->get('/api/point','App\Controller\InteretController:getInterets')->setName('getInteret');
$app->get('/api/interet','App\Controller\InteretController:getInteret')->setName('getInteret');
$app->post('/api/ville','App\Controller\VilleController:getInterets')->setName('getInterets');

$app->get('/api/evenement','App\Controller\EvenementController:getEvenements')->setName('getEvent');
$app->post('/api/evenement','App\Controller\EvenementController:addEvenement')->setName('addEvent');


/*
Base de données relationelle :

evenement(id,nom,description,#pointInteret)
commentaires(id,#pointInteret,#commentaire)
commentaire(id, #user, texte)
user(id,nom,prenom)
pointInteret(id,nom,description,#groupeInteret,x,y,#categorieInteret)
groupeInteret(id,nom, #pointInteret, #pointInteret)
categorie(id,nom,description)
ville(id,nom,#departement)
departement(id,nom,#pays)
pays(id, nom)


Base de données non relationelle :

evenement : MODEL OK

{
	"id": nombre,$m = new MongMongoClient();

commentaire : MODEL OK

{
	"id": nombre,
	"texte": "texte",
	"user": <user>
}

user : MODEL OK

{
	"id": nombre,
	"nom": "texte",
	"prenom": "texte"
}

pointInteret : MODEL OK

{
	"id": nombre,
	"nom": "texte",
	"description": "texte",
	"x": nombre,
	"y": nombre,
	"evenement": [<evenement>],
	"commentaires": [<commentaire>],
	"categorie": [<categorie>]
}

groupeInteret : MODEL OK

{
	"id": nombre,
	"nom": "texte",
	"pointsInterets": [<pointInteret>]
}

categorie : MODEL OK

{
	"id": nombre,
	"nom": "texte",
	"description": "texte"
}

ville : MODEL OK

{
	"id": nombre,
	"nom" : "texte",
	"groupesInteret": [<groupeInteret>]
}

departement : MODEL OK

{
	"id": nombre,
	"nom": "texte",
	"villes": [<ville>]
}

pays : MODEL OK

{
	"id": nombre,
	"nom": "texte",
	"departements": [<departement>]
}


--- NON RELATIONNEL EN UN SEUL BLOC ---

{
	"id": 1,
	"nom": "pays",
	"departements": [
		{
			"id": 1,
			"nom": "dep1",
			"villes": [
				{
					"id": 1,
					"nom": "jej",
					"groupesInterets": [
						{
							"id":1,
							"nom": "theatre",
							"pointsInterets": {
								"id": 1,
								"nom": "Théatre grec",
								"description": "Before the light of the gods...",
								"x": 13.1278936,
								"y": 33.1021902,
								"evenement": {
									"id": 1,
									"nom": "Représentation de la quête du titan",
									"description": "Retrace l'épopée non écrite par Homère."
								},
								"commentaires": [
									{
										"id": 1,
										"texte": "woaw trop jej lool",
										"user": {
											"id": 1,
											"nom": Tourloupe,
											"prenom": Jean
										}
									},
									{
										"id": 2,
										"texte": "FIRST",
										"user": {
											"id": 2,
											"nom": Ladrigotte,
											"prenom": Bernard
										}
									}
								],
								"categorie": [
									{
										"id": 1,
										"nom": "musique",
										"description": "c'est quand ya du son mais que ça rend bien ouais."
									},
									{
										"id": 2,
										"nom": "Théâtre grec",
										"description": "NOM DE ZEUS !"
									}
								]
							}
						},
						{
							"id":2,
							"nom": "salle de concert",
							"pointsInterets": {
								"id": 2,
								"nom": "Soirée concert qui déchire",
								"description": "C'est MEMEMEMETAL !",
								"x": 23.1278936,
								"y": 31.1321902,
								"evenement": [
									{
										"id": 2,
										"nom": "Concert System of a Down",
										"description": "It's mesmerizing"
									},
									{
										"id": 3,
										"nom": "Concert Avenged Sevenfold",
										"description": "NIGHTMAAAAAAAAAAAARE !"
									}
								],
								"commentaires": [
									{
										"id": 3,
										"texte": "OMAGAD !",
										"user": {
											"id": 1,
											"nom": Tourloupe,
											"prenom": Jean
										}
									},
									{
										"id": 4,
										"texte": "Cyka Blyat rush B",
										"user": {
											"id": 3,
											"nom": Bojje,
											"prenom": Chapovitch
										}
									}
								],
								"categorie": [
									{
										"id": 1,
										"nom": "musique",
										"description": "c'est quand ya du son mais que ça rend bien ouais."
									},
									{
										"id": 3,
										"nom": "Metal",
										"description": "On parle pas de la matière, mais c'est tout aussi solide !"
									}
								]
							}
						}
					]
				},
				{
					"id": 2;
					"nom": "onche",
					"groupeInterets": {}
				}
			]
		}
	]
}*/

$app->run();
