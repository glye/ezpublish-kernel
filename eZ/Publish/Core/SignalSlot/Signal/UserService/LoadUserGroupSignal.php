<?php
/**
 * LoadUserGroupSignal class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\SignalSlot\Signal\UserService;
use eZ\Publish\Core\SignalSlot\Signal;

/**
 * LoadUserGroupSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\UserService
 */
class LoadUserGroupSignal extends Signal
{
    /**
     * Id
     *
     * @var mixed
     */
    public $id;

    /**
     * Constructor
     *
     * Construct from signal values
     *
     * @param mixed $id
     */
    public function __construct( $id )
    {
        $this->id = $id;
    }
}
