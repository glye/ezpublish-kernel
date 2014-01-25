<?php
/**
 * File contains: eZ\Publish\Core\Repository\DomainLogic\Tests\Service\Integration\Legacy\FieldTypeTest class
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\DomainLogic\Tests\Service\Integration\Legacy;

use eZ\Publish\Core\Repository\DomainLogic\Tests\Service\Integration\FieldTypeBase as BaseFieldTypeTest;

/**
 * Test case for FieldType Service using Legacy storage class
 */
class FieldTypeTest extends BaseFieldTypeTest
{
    protected function getRepository()
    {
        return Utils::getRepository();
    }
}
