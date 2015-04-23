<?php

namespace Transmission\Requests;

use Transmission\Request;

class FreeSpace extends Request {
    protected $_map = array('sizeBytes' => 'size-bytes');
    /**
     * @var string The directory to query
     */
    public $path;
}