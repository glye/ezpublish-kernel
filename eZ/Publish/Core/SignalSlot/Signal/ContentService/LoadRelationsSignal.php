<?php
/**
 * LoadRelationsSignal class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\SignalSlot\Signal\ContentService;
use eZ\Publish\Core\SignalSlot\Signal;

/**
 * LoadRelationsSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\ContentService
 */
class LoadRelationsSignal extends Signal
{
    /**
     * VersionInfo
     *
     * @var eZ\Publish\API\Repository\Values\Content\VersionInfo
     */
    public $versionInfo;

    /**
     * Constructor
     *
     * Construct from signal values
     *
     * @param eZ\Publish\API\Repository\Values\Content\VersionInfo $versionInfo
     */
    public function __construct( $versionInfo )
    {
        $this->versionInfo = $versionInfo;
    }
}
