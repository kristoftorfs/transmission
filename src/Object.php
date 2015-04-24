<?php

namespace Transmission;

abstract class Object {
    protected $_map = array();
    public function __construct($json) {
        foreach($json as $property => $value) {
            $property = $this->map($property);
            if (!property_exists($this, $property)) continue;
            $this->$property = $value;
        }
    }
    final public function __set($property, $value) { return; }
    final public function map($property) {
        $src = array_flip($this->_map);
        if (!array_key_exists($property, $src)) return $property;
        return $src[$property];
    }
}