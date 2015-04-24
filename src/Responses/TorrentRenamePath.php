<?php

namespace Transmission\Responses;

use Transmission\Response;

class TorrentRenamePath extends Response {
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $path;
    /**
     * @var string
     */
    public $name;
}