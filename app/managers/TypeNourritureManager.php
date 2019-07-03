<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/03/2019
 * Time: 12:06
 */

class TypeNourritureManager extends DB {

    public function getAll(){
        $sql = "select * from types_nourriture";
        $nourrituresArr = $this->query($sql)->results();
        $typesNourriture = [];
        foreach ($nourrituresArr as $nourritureArr)
            $typesNourriture[] = new TypeNourriture($nourritureArr);

        return $typesNourriture;
    }

}