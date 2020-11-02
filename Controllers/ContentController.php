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
 * @version       2.0.0
 **/

namespace ProudCommerce\CmsSnippets\Controllers;

use OxidEsales\Eshop\Core\Registry;

class ContentController extends ContentController_parent
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
        //proudcommerce
        if ($oContent->oxcontents__pccmssnippets_disable->value) {
            Registry::getUtils()->redirect(Registry::getConfig()->getShopUrl(), false, 410);
        }

        return $mReturn;
    }
}
