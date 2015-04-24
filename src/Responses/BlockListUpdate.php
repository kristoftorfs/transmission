<?php

namespace Transmission\Responses;

use Transmission\Response;

class BlockListUpdate extends Response {
    protected $_map = array('blockListSize' => 'blocklist-size');
    /**
     * @var int
     */
    public $blockListSize;
}
