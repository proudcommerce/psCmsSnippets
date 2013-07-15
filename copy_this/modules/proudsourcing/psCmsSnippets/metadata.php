<?php
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
    'thumbnail'    => '',
    'version'      => '1.0.1',
    'author'       => 'Proud Sourcing GmbH',
    'url'          => 'http://www.proudcommerce.com',
    'email'        => 'support@proudcommerce.com',
    'extend'       => array(
        'content'    =>      'proudsourcing/psCmsSnippets/application/controllers/pscmssnippets_content'
    ),
    'files' => array(
    ),
   'templates' => array(
    ),
   'blocks' => array(
    ),
   'settings' => array(
    )
);