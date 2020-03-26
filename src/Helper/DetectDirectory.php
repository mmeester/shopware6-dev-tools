<?php
/**
 * DetectDirectory
 *
 * @copyright Copyright © 2020 e-mmer. All rights reserved.
 * @author    maurits@e-mmer.nl
 */

namespace DevTools\Helper;

class DetectDirectory
{
    /**
     * @return array|bool
     */
    public static function detectInstallDirectory()
    {
        if (file_exists('./vendor/shopware/platform/src/Storefront/composer.json')) {
            return [
                'core' => './vendor/shopware/platform/src/Core',
                'administration' => './vendor/shopware/platform/src/Administration',
                'elasticsearch' => './vendor/shopware/platform/src/Elasticsearch',
                'recovery' => './vendor/shopware/platform/src/Recovery',
                'storefront' => './vendor/shopware/platform/src/Storefront'
            ];
        } elseif (file_exists('./vendor/shopware/storefront/composer.json')) {
            return [
                'core' => './vendor/shopware/core',
                'administration' => './vendor/shopware/administration',
                'elasticsearch' => './vendor/shopware/elasticsearch',
                'recovery' => './vendor/shopware/recovery',
                'storefront' => './vendor/shopware/storefront'
            ];
            return ['storefront' => './vendor/shopware/storefront'];
        } elseif (file_exists('./platform/src/Storefront/composer.json')) {
            return [
                'core' => './platform/src/Core',
                'administration' => './platform/src/Administration',
                'elasticsearch' => './platform/src/Elasticsearch',
                'recovery' => './platform/src/Recovery',
                'storefront' => './platform/src/Storefront'
            ];
        } else {
            return false;
        }

    }

}
