<?php

namespace DCKAP\Literature\Model;

use Magento\Framework\Model\AbstractModel;

class Literature extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('DCKAP\Literature\Model\ResourceModel\Literature');
    }
    public function getLiterature() 
    {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        if(isset($uri_segments[1])){
            if($uri_segments[1] == 'automotive'){
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
                $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
                $connection = $resource->getConnection();
                $tableName = $resource->getTableName('dckap_literature');
                $sql = "Select * FROM ".$tableName." Where industry= '0'";
                $result = $connection->fetchAll($sql);
                return $result;
            }
            else {
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); 
                $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
                $connection = $resource->getConnection();
                $tableName = $resource->getTableName('dckap_literature');
                $sql = "Select * FROM ".$tableName." Where industry= '1'";
                $result = $connection->fetchAll($sql);
                return $result;
            }
        }
    }
}