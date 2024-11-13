<?php
//je créai une classe
class OrderRepository
{
//je sauvegarde dans le repository (pour la bdd)
    public function persistOrder($order) {
        session_start();
        $_SESSION['order'] = $order;
    }

    public function findOrder() {
        session_start();
        return $_SESSION['order'];
    }

}