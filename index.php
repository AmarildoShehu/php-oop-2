<?php
class Product {
    protected $title;
    protected $price;
    protected $image;
    protected $category;

    public function __construct($title, $price, $image, $category) {
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
    }

    public function displayCard() {
        $categoryDetails = $this->category->displayCard();
        return "<div class='card'>
                <img src='{$this->image}' alt='{$this->title}' class='card-img-top' />
                <div class='card-body'>
                    <h2 class='card-title'>{$this->title}</h2>
                    <p class='card-text'>Prezzo: {$this->price} €</p>
                    <p class='card-text'>Categoria: {$categoryDetails}</p>
                </div>
            </div>";
    }
}

class Category {
    private $name;
    private $privateValue;

    public function __construct($name) {
        $this->name = $name;
        $this->privateValue = $this->privateMethod();
    }

    private function privateMethod() {
        return "Valore del metodo privato";
    }

    public function displayCard() {
        return "<h2>{$this->name}</h2>";
    }
}

class FoodProduct extends Product {
    private $foodType;

    public function __construct($title, $price, $image, $category, $foodType) {
        parent::__construct($title, $price, $image, $category);
        $this->foodType = $foodType;
    }

    public function displayCard() {
        $foodDetails = "<p>Tipo: Cibo - {$this->foodType}</p>";
        return parent::displayCard() . $foodDetails;
    }
}

class ToyProduct extends Product {
    public function displayCard() {
        return parent::displayCard() . "<p>Tipo: Gioco</p>";
    }
}

class AccessoryProduct extends Product {
    public function displayCard() {
        return parent::displayCard() . "<p>Tipo: Accessorio</p>";
    }
}

// Creazione delle categorie
$dogCategory = new Category("Cane");
$catCategory = new Category("Gatto");
$birdCategory = new Category("Uccelli");
$fishCategory = new Category("Pesci");

// Creazione di alcuni prodotti
$royalCanin = new FoodProduct("Royal Canin Mini Adult", 15.99, "https://arcaplanet.vtexassets.com/arquivos/ids/284621/Mini-Adult.jpg?v=638182891693570000", $dogCategory, "Adult");
$almoNatureCatDaily = new FoodProduct("Almo Nature Cat Daily Lattina", 3.99, "https://arcaplanet.vtexassets.com/arquivos/ids/245336/almo-daily-menu-cat-400-gr-vitello.jpg", $catCategory, "Lattina");
$kongClassic = new ToyProduct("Kong Classic", 8.49, "https://arcaplanet.vtexassets.com/arquivos/ids/256599/kong-classic1.jpg", $dogCategory);
$volieraWilma = new AccessoryProduct("Voliera Wilma in Legno", 79.99, "https://arcaplanet.vtexassets.com/arquivos/ids/258384/voliera-wilma1.jpg", $birdCategory);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
        <h1 class="mt-5 mb-4 text-center">Benvenuto al Negozio di Animali</h1>

        <div class="row">
            <div class="col-md-3 product-card">
                <?php echo $royalCanin->displayCard(); ?>
            </div>
            <div class="col-md-3 product-card">
                <?php echo $almoNatureCatDaily->displayCard(); ?>
            </div>
            <div class="col-md-3 product-card">
                <?php echo $kongClassic->displayCard(); ?>
            </div>
            <div class="col-md-3 product-card">
                <?php echo $volieraWilma->displayCard(); ?>
            </div>
        </div>
    </div>
</body>
</html>
