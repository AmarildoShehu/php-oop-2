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

    public function __construct($name) {
        $this->name = $name;
    }

    public function displayCard() {
        echo "<div class='category-card'>
                <h2>{$this->name}</h2>
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

$dogCategory = new Category("Cane");

// Visualizzazione card della categoria Cane
$dogCategory->displayCard();
?>