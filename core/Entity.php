<?php

class Entity {

    public function __construct($donnes){
        self::hydrate($donnes);
    }

    public function hydrate($donnes){
        foreach($donnes as $key => $value){
            $method = 'set' . dashesToCamelCase($key);
            $this->$method($value);
        }
    }

}