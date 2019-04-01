<?php

namespace Quanly\Nhanvien\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '3.0.0', '<')) {
            if (!$installer->tableExists('manager_employee_post')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('manager_employee_post')
                )
                    ->addColumn(
                        'id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable'  => false,
                            'primary'   => true,
                            'unsigned'  => true,
                        ],
                        'id'
                    )
                    ->addColumn(
                        'name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'name emp'
                    )

                    ->addColumn(
                        'country',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Country'
                    )
                    ->addColumn(
                        'birthday',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        ['nullable' => false],
                        'Birth Day'
                    )
                    ->addColumn(
                        'created_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Post Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('manager_employee_post'),
                    $setup->getIdxName(
                        $installer->getTable('manager_employee_post'),
                        ['name', 'country', 'birthday' ],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name', 'country', 'birthday' ],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
    }
}