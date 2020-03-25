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
     * @return bool|string
     */
    public static function detectInstallDirectory() {

        if(file_exists('./vendor/shopware/platform/src/Storefront/composer.json')) {
            return './vendor/shopware/platform/src/';
        }else if(file_exists('./vendor/shopware/storefront/composer.json')) {
            return './vendor/shopware/';
        }else if(file_exists('./platform/src/storefront/composer.json')) {
            return './platform/src/';
        }else {
            return false;
        }

    }

}
