<?php
class Order
{
    private $id;
    private $customerName;
    private $status;
    private $totalPrice;
    private $products = [];
    private $shippingAddress;

    public function __construct($customerName)
    {

        if (mb_strlen($customerName) < 3) {
            throw new Exception('Merci de remplir un nom correct');
        }

        $this->status = 'cart';
        $this->totalPrice = 0;
        $this->customerName = $customerName;
        $this->id = uniqid();
    }

    public function addProduct($addProduct)
    {
        if ($this->status === "cart") {
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        } else {
            throw new Exception('La commande ne peut pas être modifiée');
        }
    }

    public function removeProduct($removeProduct)
    {
        if ($this->status === "cart" && !empty($this->products)) {
            array_pop($this->products);
            $this->totalPrice -= 3;
        }
    }

    public function setShippingAddress($shippingAddress)
    {
        if ($this->status === "cart") {
            $this->shippingAddress = $shippingAddress;
            $this->status = "shippingAddressSet";
        } else {
            throw new Exception('Adresse non modifiable');
        }
    }



    public function pay($pay)
    {
        if ($this->status === "shippingAddressSet" && !empty($this->products)) {
            $this->status = "paid";
        } else {
            throw new Exception('Vous ne pouvez pas payer, merci de remplir votre adresse d\'abord');
        }

    }


    public function ship($ship)
    {
        if ($this->status === 'paid') {
            $this->status = "shipped";
        } else {
            throw new Exception("La commande ne peux pas être expédiée. elle n'est pas encore payée");
        }
    }

    // si je veux lire la valeur des propriétés de mon
    // objet sans les rendre modifiables
    // au lieu de mettre la propriété en public
    // je peux créer une méthode public qui retourne
    // la valeur de la propriété, sans me permettre de la modifier

    public function getId($getId) {
        return $this->id;
    }

    public function getProducts($getProducts) {
        return $this->products;
    }

    public function getAddress($getAddress) {
        return $this->shippingAddress;
    }
}