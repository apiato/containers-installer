<?php

namespace JohannesSchobel\ApiatoContainerInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * Class ContainerInstaller
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class ContainerInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $containername = $package->getPrettyName();
        $extras = json_decode(json_encode($package->getExtra()));
        if(isset($extras->apiato->container->name)) {
            $containername = $extras->apiato->container->name;
        }

        return "app" . DIRECTORY_SEPARATOR . "Containers" . DIRECTORY_SEPARATOR . $containername;
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return ('apiato-container' === $packageType);
    }
}

?>