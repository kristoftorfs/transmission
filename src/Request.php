<?php

namespace Transmission;

abstract class Request {
    protected $_map = array();
    private $_tag;
    public function __construct() {}
    final public function __set($property, $value) { return; }
    final public function json($method) {
        $ret = array('method' => $method, 'arguments' => array());
        if (!empty($this->_tag)) $ret['tag'] = (string)$this->_tag;
        foreach($this as $property => $value) {
            if (in_array($property, array('_map', '_tag'))) continue;
            if (is_null($value)) continue;
            $ret['arguments'][$this->map($property)] = $value;
        }
        return json_encode($ret);
    }
    final public function setTag($_tag = null) {
        $this->_tag = $_tag;
        return $this;
    }
    final public function map($property, $reverse = false) {
        $src = ($reverse === true ? array_flip($this->_map) : $this->_map);
        if (!array_key_exists($property, $this->_map)) return $property;
        return $this->_map[$property];
    }
}