<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 14:19
 */

class EvenementManager extends DB {

    public function insertEvent(Evenement $evenement){
        $rep = $this->insert('événements',array(
            "date_event" => $evenement->getDateEvent(),
            "id_bovin" => $evenement->getIdBovin(),
            "id_event" => $evenement->getIdEvent()
        ));

        return $rep;
    }

    public function getEventsBovin($idBovin){
        $eventsBovin = [];
        $sql = "select * from événements where id_bovin = ?";
        $eventsBovinArr = $this->query($sql,array($idBovin))->results();
        if (count($eventsBovinArr) > 0){
            foreach ($eventsBovinArr as $eventBovinArr){
                $eventsBovin[] = new Evenement($eventBovinArr);
            }
        }
        return $eventsBovin;
    }

}