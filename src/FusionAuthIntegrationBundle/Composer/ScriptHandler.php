<?php

namespace FusionAuthIntegrationBundle\Composer;

use Symfony\Component\Filesystem\Filesystem;

class ScriptHandler
{
    public static function copyConfigFile(): void
    {
        $fs = new Filesystem();
        $bundleDir = dirname(__DIR__, 2);
        $configFile = $bundleDir.'/Resources/config/fusion_auth_integration.yaml';
        $targetDir = __DIR__.'/../../../../config/packages';

        if (!$fs->exists($targetDir)) {
            $fs->mkdir($targetDir);
        }

        $fs->copy($configFile, $targetDir.'/fusion_auth_integration.yaml');
    }
}