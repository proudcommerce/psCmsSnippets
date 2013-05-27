<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @copyright (c) Proud Sourcing GmbH | 2013
 * @link www.proudcommerce.com
 * @package psCmsSnippets
 * @version 1.0.0
**/
class psCmsSnippets_content extends psCmsSnippets_content_parent
{
    /**
     * Executes parent::render(), passes template variables to
     * template engine and generates content. Returns the name
     * of template to render content::_sThisTemplate
     *
     * @return  string  $this->_sThisTemplate   current template file name
     */
    public function render()
    {
        $mReturn = parent::render();
        $oContent = $this->getContent();
        if($oContent->oxcontents__pscmssnippets_disable->value)
        {
            oxUtils::getInstance()->redirect( $this->getConfig()->getShopUrl(), false, 410 );
        }
        return $mReturn;
    }
}