<?php
namespace Celo\GhostPDF\Compress\Factory;

use Celo\GhostPDF\Compress\AbstractCompress;
use Celo\GhostPDF\Compress\DefaultCompress;
use Celo\GhostPDF\Compress\MaxCompress;
use Celo\GhostPDF\FileManager\File;

/** Factory */
class ComrpessFactory {
    const STANDARD_COMPRESSION = 0;
    const MAX_COMPRESSION = 1;

    function __construct(){}
    /**
     * Creates new compress object based on $compression_type
     * @param int $compression_type Indicate the type of compression
     * @param File $file
     * @return AbstractCompress instance object
     */
    public function create(int $compression_type, File $file): AbstractCompress{
        switch($compression_type){
            case self::STANDARD_COMPRESSION:
                return new DefaultCompress($file);
            case self::MAX_COMPRESSION:
                return new MaxCompress($file);
        }
    }
}