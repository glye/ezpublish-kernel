<?php
/**
 * File contains: eZ\Publish\Core\Repository\DomainLogic\Tests\Service\Integration\Legacy\RoleTest class
 *
 * @copyright Copyright (C) 1999-2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\Repository\DomainLogic\Tests\Service\Integration\Legacy;

use eZ\Publish\Core\Repository\DomainLogic\Tests\Service\Integration\RoleBase as BaseRoleServiceTest;
use Exception;

/**
 * Test case for Role Service using Legacy storage class
 */
class RoleTest extends BaseRoleServiceTest
{
    protected function getRepository()
    {
        try
        {
            return Utils::getRepository();
        }
        catch ( Exception $e )
        {
            $this->markTestIncomplete(  $e->getMessage() );
        }
    }
}
