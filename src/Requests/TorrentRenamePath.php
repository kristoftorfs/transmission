<?php

namespace Transmission\Requests;

use Transmission\Request;

class TorrentRenamePath extends TorrentAction {
    /**
     * @var string The path to the file or folder that will be renamed
     */
    public $path;
    /**
     * @var string The file or folder's new name
     */
    public $name;
}