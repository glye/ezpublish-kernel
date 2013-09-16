<?php
/**
 * File containing the EzPublishDataCollector class.
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Bundle\EzPublishCoreBundle\Collector;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
Use eZ\Bundle\EzPublishCoreBundle\Collector\TemplateDebugInfo;
use eZ\Publish\Core\Persistence\Cache\PersistenceLogger;

/**
 * Collects list of templates from eZ 5 stack or Legacy Stack
 * Collects number of calls made to SPI Persistence as logged by eZ\Publish\Core\Persistence\Cache\*.
 */
class EzPublishDataCollector extends DataCollector
{
    /**
     * @var \eZ\Publish\Core\Persistence\Cache\PersistenceLogger
     */
    protected $logger;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @param \eZ\Publish\Core\Persistence\Cache\PersistenceLogger $logger
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct( PersistenceLogger $logger, ContainerInterface $container )
    {
        $this->logger = $logger;
        $this->container = $container;
    }

    /**
     * Collects data for the given Request and Response.
     *
     * @param Request    $request   A Request instance
     * @param Response   $response  A Response instance
     * @param \Exception $exception An Exception instance
     *
     * @api
     */
    public function collect( Request $request, Response $response, \Exception $exception = null )
    {
        $legacyMode = $this->container->get( 'ezpublish.config.resolver' )->getParameter( 'legacy_mode' );
        $this->data = array(
            'count' => $this->logger->getCount(),
            'calls_logging_enabled' => $this->logger->isCallsLoggingEnabled(),
            'calls' => $this->logger->getCalls(),
            'handlers' => $this->logger->getLoadedUnCachedHandlers(),
            'templates' => $this->getTemplateList( $legacyMode ),
            'legacyMode' => $legacyMode
        );
    }

    /**
     * Returns the name of the collector.
     *
     * @return string The collector name
     *
     * @api
     */
    public function getName()
    {
        return 'ezpublish.debug.toolbar';
    }

    /**
     * Returns call count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->data['count'];
    }

    /**
     * Returns flag to indicate if logging of calls is enabled or not
     *
     * Typically not enabled in prod.
     *
     * @return bool
     */
    public function getCallsLoggingEnabled()
    {
        return $this->data['calls_logging_enabled'];
    }

    /**
     * Returns calls
     *
     * @return array
     */
    public function getCalls()
    {
        $calls = array();
        foreach ( $this->data['calls'] as $call )
        {
            list( $class, $method ) = explode( '::', $call['method'] );
            $namespace = explode( '\\', $class );
            $class = array_pop( $namespace );
            $calls[] = array(
                'namespace' => $namespace,
                'class' => $class,
                'method' => $method,
                'arguments' => empty( $call['arguments'] ) ?
                    '' :
                    preg_replace( array( '/^array\s\(\s/', '/,\s\)$/' ), '', var_export( $call['arguments'], true ) )
            );
        }
        return $calls;
    }

    /**
     * Returns un cached handlers being loaded
     *
     * @return array
     */
    public function getHandlers()
    {
        $handlers = array();
        foreach ( $this->data['handlers'] as $handler => $count )
        {
            list( $class, $method ) = explode( '::', $handler );
            $handlers[$method] = $method . '(' . $count . ')';
        }
        return $handlers;
    }

    /**
     * Returns un cached handlers being loaded
     *
     * @return array
     */
    public function getHandlersCount()
    {
        return array_sum( $this->data['handlers'] );
    }

    /**
     * Returns templates list
     *
     * @return array
     */
    public function getTemplates()
    {
        return $this->data['templates'];
    }

    /**
     * Returns legacy mode boolean
     *
     * @return boolean
     */
    public function getLegacyMode()
    {
        return $this->data['legacyMode'];
    }

    /**
     * Returns all templates loaded via eZ 5 stack or Legacy stack
     *
     * @param bool $legacyMode
     *
     * @return array
     */
    public function getTemplateList( $legacyMode )
    {
        if ( $legacyMode )
        {
            $templateList = TemplateDebugInfo::getLegacyTemplatesList( $this->container );
        }
        else
        {
            $templateList = TemplateDebugInfo::getTemplatesList();
        }
        return $templateList;
    }
}
