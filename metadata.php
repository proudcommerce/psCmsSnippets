<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @copyright (c) ProudCommerce
 * @link          proudcommerce.com
 * @package       pcCmsSnippets
 * @version       2.1.0
 **/
/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'pcCmsSnippets',
    'title'       => 'pcCmsSnippets',
    'description' => [
        'de' => 'Einstellung für CMS-Seiten, welche nicht &uuml;ber den Browser erreichbar sein dürfen.',
        'en' => 'Setting for CMS pages, which may not be accessible via browser.',
    ],
    'thumbnail'   => 'logo_pc-os.jpg',
    'version'     => '2.1.0',
    'author'      => 'ProudCommerce',
    'url'         => 'https://github.com/proudcommerce/psCmsSnippets',
    'email'       => '---',
    'extend'      => [
        \OxidEsales\Eshop\Application\Controller\ContentController::class => \ProudCommerce\CmsSnippets\Controllers\ContentController::class
    ],
    'controllers' => [
    ],
    'templates'   => [
    ],
    'blocks'      => [
        ['template' => 'content_main.tpl', 'block' => 'admin_content_main_form', 'file' => 'views/blocks/admin_content_main_form.tpl'],
        ['template' => 'ddoevisualcmsadmin.tpl', 'block' => 'visualcms_settings_form_cmssearch', 'file' => 'views/blocks/visualcms_settings_form_cmssearch.tpl'],
    ],
    'settings'    => [
    ],
    'events'      => [
        'onActivate'   => '\ProudCommerce\CmsSnippets\Core\Events\ModuleInit::onActivate',
        'onDeactivate' => '\ProudCommerce\CmsSnippets\Core\Events\ModuleInit::onDeactivate',
    ],
];
