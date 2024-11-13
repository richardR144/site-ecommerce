<?php

require_once('../model/Order.php');
require_once('../model/OrderRepository.php');
require_once('../view/partial/_header.php');


class OrderController
{


    public function createOrder()
    {
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('customerName', $_POST)) {

                try {

                    // je créer une instance de la classe Order
                    // avec ces propriétés par défaut (date de création, client, montant etc)
                    $order = new Order($_POST['customerName']);

                    // je stocke la commande créée (ici dans la session, mais pourrait être en BDD)
                    // en utilisant la classe OrderRepository
                    // pour ça je l'instancie et j'utilise la méthode persist
                    $orderRepository = new OrderRepository();
                    $orderRepository->persistOrder($order);

                    $message = 'Commande créée';
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }

            }
        }

        require_once('../view/create-order-view.php');
    }

    public function addProduct()
    {

        $message = null;

        // j'instancie l'OrderRepository
        // et j'appelle la méthode findOrder qui me
        // permet de récupérer la commande actuellement en session pour l'utilisateur
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();


        try {
            // j'ajoute un produit à la commande
            $order->addProduct();
            // et je la sauvegarde en BDD
            $orderRepository->persistOrder($order);
            $message = "produit ajouté";

        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }

        require_once('../view/add-product-view.php');
    }


    //Je créai la fonction envoi à l'adresse
    public function setShippingAddress()
    {
        //J'instancie nouveau OrderRepository
        //et j'appelle la méthode findOrder qui me permet de récupérer la commande setShippingAdress pour le user
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('shippingAddress', $_POST)) {

                try {
                    $order->setShippingAddress($_POST['shippingAddress']);

                    $message = "Adresse ajoutée";

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }
        require_once('../view/set-shipping-address-view.php');
    }


            public function updateProduct($id)
            {
                $message = null;
                $orderRepository = new OrderRepository();
                $order = $orderRepository->findOrder();
                try {
                    $order->updateProduct($id);
                    $orderRepository->persistOrder($order);
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }




    public function deleteProduct($id) {
        $message = null;
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();
        try {
            $order->removeProduct($id);
            $orderRepository->persistOrder($order);
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
    }
}

require_once('../view/add-product-view.php');
require_once('../view/partial/_footer.php');






