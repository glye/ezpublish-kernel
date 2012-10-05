<?php
/**
 * NewContentTypeGroupCreateStructSignal class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\SignalSlot\Signal\ContentTypeService;
use eZ\Publish\Core\SignalSlot\Signal;

/**
 * NewContentTypeGroupCreateStructSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\ContentTypeService
 */
class NewContentTypeGroupCreateStructSignal extends Signal
{
    /**
     * Identifier
     *
     * @var mixed
     */
    public $identifier;

    /**
     * Constructor
     *
     * Construct from signal values
     *
     * @param mixed $identifier
     */
    public function __construct( $identifier )
    {
        $this->identifier = $identifier;
    }
}
