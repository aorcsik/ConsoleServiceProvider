<?php

namespace Knp\Command\Twig;

use Pimple\Container;
use Symfony\Bridge\Twig\Command\DebugCommand as BaseDebugCommand;

/**
 * Twig DebugCommand that can locate the twig environment in a Pimple container.
 */
class DebugCommand extends BaseDebugCommand
{
    protected static $defaultName = 'debug:twig';

    private $container;

    /**
     * DebugCommand constructor.
     *
     * @param Container $container A Pimple container instance
     */
    public function __construct(Container $container)
    {
        parent::__construct();

        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    protected function getTwigEnvironment()
    {
        if (null === $twig = parent::getTwigEnvironment()) {
            $this->setTwigEnvironment($twig = $this->container['twig']);
        }

        return $twig;
    }
}
