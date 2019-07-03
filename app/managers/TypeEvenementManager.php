<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 11:52
 */

class TypeEvenementManager extends DB {

    public function getAll(){
        $sql = "select * from types_événement";
        $eventsArr = $this->query($sql)->results();
        $events = [];
        foreach ($eventsArr as $eventArr)
            $events[] = new TypeEvenement($eventArr);

        return $events;
    }

}