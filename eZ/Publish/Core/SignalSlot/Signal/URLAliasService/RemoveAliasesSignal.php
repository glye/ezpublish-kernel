<?php
/**
 * RemoveAliasesSignal class
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\SignalSlot\Signal\URLAliasService;

use eZ\Publish\Core\SignalSlot\Signal;

/**
 * RemoveAliasesSignal class
 * @package eZ\Publish\Core\SignalSlot\Signal\URLAliasService
 */
class RemoveAliasesSignal extends Signal
{
    /**
     * AliasList
     *
     * @var mixed
     */
    public $aliasList;
}
