<?php

namespace Transmission;

abstract class Response {
    private $error;
    protected $json;
    public function __construct($json, Request $request) {
        $this->json = $json;
        foreach($this->json['arguments'] as $property => $value) {
            $property = $request->map($property, true);
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