<?php
/**
 * UnAssignUserFromUserGroupSignal class
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\SignalSlot\Signal\UserService;

use eZ\Publish\Core\Repository\SignalSlot\Signal;

/**
 * UnAssignUserFromUserGroupSignal class
 * @package eZ\Publish\Core\Repository\SignalSlot\Signal\UserService
 */
class UnAssignUserFromUserGroupSignal extends Signal
{
    /**
     * UserId
     *
     * @var mixed
     */
    public $userId;

    /**
     * UserGroupId
     *
     * @var mixed
     */
    public $userGroupId;
}
