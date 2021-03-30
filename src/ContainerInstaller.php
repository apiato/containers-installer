<?php

namespace apiato\installer;

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
		$containerName = $package->getPrettyName();
		$extras = json_decode(json_encode($package->getExtra()));
		if (isset($extras->apiato->container->name)) {
			$containerName = $extras->apiato->container->name;
		}
		$separator = '\\';
		return "app" . $separator . "Modules" . $separator . $containerName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return ('apiato-container' === $packageType);
	}
}
