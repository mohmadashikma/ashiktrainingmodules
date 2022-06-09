<?php

namespace DCKAP\Literature\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
		$installer = $setup;
		$installer->startSetup();

		/**
		 * Creating table dckap_literature
		 */
		$table = $installer->getConnection()->newTable(
			$installer->getTable('dckap_literature')
		)->addColumn(
			'literature_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
			'Literature Id'
		)->addColumn(
			'industry',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => false, 'default' => ''],
			'Industry'
		)->addColumn(
			'title',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true],
			'Title'
		)->addColumn(
			'sku',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true,'default' => null],
			'SKU'
		)->addColumn(
			'total_pages',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			15,
			['unsigned' => true, 'nullable' => true],
			'Total Page'
		)->addColumn(
			'image',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true,'default' => null],
			'Image'
		)->addColumn(
			'pdf',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			['nullable' => true,'default' => null],
			'PDF'
		)->addColumn(
			'created_at',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			null,
			['nullable' => false],
			'Created At'
		)->setComment(
            'Literature Automotive'
        );
		$installer->getConnection()->createTable($table);
		$installer->endSetup();
	}
}