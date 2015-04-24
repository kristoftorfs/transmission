<?php

namespace Transmission;

abstract class Response {
    protected $json;
    public function __construct($json, Request $request) {
        $this->json = $json;
        foreach($this->json['arguments'] as $property => $value) {
            if (property_exists($this, '_map')) {
                $src = array_flip($this->_map);
                if (array_key_exists($property, $src)) $property = $src[$property];
            } else {
                $property = $request->map($property, true);
            }
            if (!property_exists($this, $property)) continue;
            $this->$property = $value;
        }
    }
    final public function getError() {
        if (!$this->isError()) return '';
        return $this->json['result'];
    }
    final public function getTag() {
        return $this->json['tag'];
    }
    final public function isError() {
        return $this->json['result'] != 'success';
    }
}