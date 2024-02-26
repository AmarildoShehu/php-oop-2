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
        echo "<div class='card'>
                <img src='{$this->image}' alt='{$this->title}' />
                <h2>{$this->title}</h2>
                <p>Prezzo: {$this->price} €</p>
                <p>Categoria: {$this->category}</p>
                <p>Tipo: Prodotto Generico</p>
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
        echo "<div class='category-card'>
                <h2>{$this->name}</h2>
                <p>{$this->privateValue}</p>
            </div>";
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
        $categoryDetails = $this->category->displayCard();
        echo parent::displayCard() . $foodDetails . $categoryDetails;
    }
}

class ToyProduct extends Product {
    public function displayCard() {
        $categoryDetails = $this->category->displayCard();
        echo parent::displayCard() . "<p>Tipo: Gioco</p>" . $categoryDetails;
    }
}

class AccessoryProduct extends Product {
    public function displayCard() {
        $categoryDetails = $this->category->displayCard();
        echo parent::displayCard() . "<p>Tipo: Accessorio</p>" . $categoryDetails;
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

// Visualizzazione delle card
$dogCategory->displayCard();
$royalCanin->displayCard();

$catCategory->displayCard();
$almoNatureCatDaily->displayCard();

$dogCategory->displayCard();
$kongClassic->displayCard();

$birdCategory->displayCard();
$volieraWilma->displayCard();
?>