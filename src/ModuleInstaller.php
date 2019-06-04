<?php

namespace Tabula\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ModuleInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 14);
        if ('tabula/module-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install module, tabula modules '
                .'should always start their package name with '
                .'"tabula/module-"'
            );
        }

        return 'modules/'.substr($package->getPrettyName(), 14);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'tabula-module' === $packageType;
    }
}