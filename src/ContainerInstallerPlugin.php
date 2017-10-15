<?php

namespace apiato\installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Class ContainerInstallerPlugin
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class ContainerInstallerPlugin implements PluginInterface
{
    /**
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new ContainerInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
