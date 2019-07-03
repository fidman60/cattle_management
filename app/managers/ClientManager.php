<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/03/2019
 * Time: 19:24
 */

class ClientManager extends DB {

    public function getList(){
        $clients = [];
        $sql = "select * from clients";
        $clientsArr = $this->query($sql)->results();
        foreach ($clientsArr as $clientArr){
            $clients[] = new Client($clientArr);
        }
        return $clients;
    }

    public function get($id){
        $id = (int)$id;
        if ($this->exists($id)){
            $sql = "select * from clients where id=?";
            return new Client($this->query($sql,[$id])->first());
        }
        return false;
    }

    public function exists($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(*) nbr FROM clients WHERE id = ?";
        return (bool)$this->query($sql,array($id))->first()['nbr'];
    }

    public function insertClient(Client $client){
        if ($client === null) return false;
        $rep = $this->insert('clients',array(
            "cin" => $client->getCin(),
            "nom" => $client->getNom(),
            "prenom" => $client->getPrenom(),
            "email" => $client->getEmail(),
            "tele" => $client->getTele(),
        ));
        return $rep;
    }

}