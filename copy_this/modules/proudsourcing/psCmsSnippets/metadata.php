<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @copyright (c) Proud Sourcing GmbH | 2015
 * @link www.proudcommerce.com
 * @package psCmsSnippets
 * @version 1.1.0
**/
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'psCmsSnippets',
    'title'        => 'psCmsSnippets',
    'description'  => array(
        'de' => 'Einstellung f&uuml;r CMS-Seiten, welche nicht &uuml;ber den Browser erreichbar sein d&uuml;rfen.',
        'en' => 'Setting for CMS pages, which may not be accessible via browser.',
    ),
    'thumbnail'    => 'logo_pc-os.jpg',
    'version'      => '1.1.0',
    'author'       => 'Proud Sourcing GmbH',
    'url'          => 'http://www.proudcommerce.com',
    'email'        => 'support@proudcommerce.com',
    'extend'       => array(
        'content'    =>      'proudsourcing/psCmsSnippets/application/controllers/pscmssnippets_content'
    ),
    'files' => array(
        'pscmssnippets_setup'  => 'proudsourcing/psCmsSnippets/core/pscmssnippets_setup.php',
    ),
   'templates' => array(
    ),
   'blocks' => array(
       array('template' => 'content_main.tpl', 'block'=>'admin_content_main_form', 'file'=>'views/blocks/admin_content_main_form.tpl'),
    ),
   'settings' => array(
    ),
    'events' => array(
        'onActivate' => 'pscmssnippets_setup::onActivate',
    ),
);