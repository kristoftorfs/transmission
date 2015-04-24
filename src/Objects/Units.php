<?php

namespace Transmission\Objects;

use Transmission\Object;

class Units extends Object {
    protected $_map = array(
        'memoryBytes' => 'memory-bytes',
        'memoryUnits' => 'memory-units',
        'sizeBytes' => 'size-bytes',
        'sizeUnits' => 'size-units',
        'speedBytes' => 'speed-bytes',
        'speedUnits' => 'speed-units'
    );
    /**
     * @var int Number of bytes in a KB (1000 for kB; 1024 for KiB)
     */
    public $memoryBytes = 0;
    /**
     * @var string[] 4 strings: KB/s, MB/s, GB/s, TB/s
     */
    public $memoryUnits = array();
    /**
     * @var int Number of bytes in a KB (1000 for kB; 1024 for KiB)
     */
    public $sizeBytes = 0;
    /**
     * @var string[] 4 strings: KB/s, MB/s, GB/s, TB/s
     */
    public $sizeUnits = array();
    /**
     * @var int Number of bytes in a KB (1000 for kB; 1024 for KiB)
     */
    public $speedBytes = 0;
    /**
     * @var string[] 4 strings: KB/s, MB/s, GB/s, TB/s
     */
    public $speedUnits = array();
}