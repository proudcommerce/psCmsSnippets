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

namespace ProudCommerce\CmsSnippets\Core\Events;

use Exception;
use OxidEsales\Eshop\Core\Base;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\DbMetaDataHandler;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Registry;

class ModuleInit extends Base
{

    /**
     * @return bool
     */
    public static function onActivate()
    {
        # setup/sql/install.sql
        return self::_dbEvent('install.sql', 'onActivate()', 'oxcategories;PC_HEADLINE');
    }

    /**
     * @return bool
     */
    public static function onDeactivate()
    {
        # setup/sql/uninstall.sql
        return self::_dbEvent('', 'onDeactivate()');
    }

    /**
     * @param string $sSqlFile
     * @param string $sAction
     * @param string $sDbCheck
     *
     * @return bool
     */
    protected static function _dbEvent($sSqlFile = "", $sAction = "", $sDbCheck = "")
    {
        if ($sSqlFile != "") {
            try {
                $oDb = DatabaseProvider::getDb();

                if (!empty($sDbCheck)) {
                    $aDbCheck = explode(";", $sDbCheck);
                    if (count($aDbCheck) > 0 && self::dbColumnExist($aDbCheck[0], $aDbCheck[1])) {
                        return true;
                    }
                }

                $sSql = file_get_contents(dirname(__FILE__) . '/../../setup/sql/' . (string) $sSqlFile);
                $aSql = (array) explode(';', $sSql);
                foreach ($aSql as $sQuery) {
                    if (!empty($sQuery)) {
                        $oDb->execute($sQuery);
                    }
                }
            } catch (Exception $ex) {
                error_log($sAction . " failed: " . $ex->getMessage());
            }

            /** @var DbMetaDataHandler $oDbHandler */
            $oDbHandler = oxNew(DbMetaDataHandler::class);
            $oDbHandler->updateViews();

            self::clearTmp();
        }

        return true;
    }

    /**
     * @param $sTable
     * @param $sColumn
     *
     * @return bool|false|string
     * @throws DatabaseConnectionException
     */
    public static function dbColumnExist($sTable, $sColumn)
    {
        $oDb = DatabaseProvider::getDb();
        $sDbName = Registry::getConfig()->getConfigParam('dbName');
        try {
            $sSql = "SELECT 1 FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND COLUMN_NAME = ?";
            $blRet = $oDb->getOne($sSql, [$sDbName, $sTable, $sColumn]);
        } catch (Exception $oEx) {
            $blRet = false;
        }

        return $blRet;
    }

    /**
     * @param string $sClearFolderPath
     *
     * @return bool
     */
    public static function clearTmp($sClearFolderPath = '')
    {
        $sFolderPath = self::_getFolderToClear($sClearFolderPath);
        $hDirHandler = opendir($sFolderPath);

        if (!empty($hDirHandler)) {
            while (false !== ($sFileName = readdir($hDirHandler))) {
                $sFilePath = $sFolderPath . DIRECTORY_SEPARATOR . $sFileName;
                self::_clear($sFileName, $sFilePath);
            }
            closedir($hDirHandler);
        }

        return true;
    }

    /**
     * @param string $sClearFolderPath
     *
     * @return string
     */
    protected static function _getFolderToClear($sClearFolderPath = '')
    {
        $sTempFolderPath = (string) Registry::getConfig()->getConfigParam('sCompileDir');
        if (!empty($sClearFolderPath) and (strpos($sClearFolderPath, $sTempFolderPath) !== false)) {
            $sFolderPath = $sClearFolderPath;
        } else {
            $sFolderPath = $sTempFolderPath;
        }

        return $sFolderPath;
    }

    /**
     * @param $sFileName
     * @param $sFilePath
     */
    protected static function _clear($sFileName, $sFilePath)
    {
        if (!in_array($sFileName, ['.', '..', '.gitkeep', '.htaccess'])) {
            if (is_file($sFilePath)) {
                @unlink($sFilePath);
            } else {
                self::clearTmp($sFilePath);
            }
        }
    }
}
