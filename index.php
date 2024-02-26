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

$dogCategory = new Category("Cane");
// Creazione di alcuni prodotti canini
$royalCanin = new FoodProduct("Royal Canin Mini Adult", 15.99, "https://arcaplanet.vtexassets.com/arquivos/ids/284621/Mini-Adult.jpg?v=638182891693570000", $dogCategory, "Adult");
$kongClassic = new ToyProduct("Kong Classic", 8.49, "https://arcaplanet.vtexassets.com/arquivos/ids/256599/kong-classic1.jpg", $dogCategory);

//prodotto accessorio
$volieraWilma = new AccessoryProduct("Voliera Wilma in Legno", 79.99, "https://arcaplanet.vtexassets.com/arquivos/ids/258384/voliera-wilma1.jpg", $birdCategory);


// Visualizzazione card della categoria Cane
$dogCategory->displayCard();
// Visualizzazione delle card
echo $royalCanin->displayCard();
$kongClassic->displayCard();


// Visualizzazione della card accessorio
$volieraWilma->displayCard();
?>