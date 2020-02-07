<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class VendorMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('vendor', ['id' => false, 'primary_key' => 'id']);

        $table->addColumn('id', 'uuid');

        $table->addColumn('name', 'string', [
            'limit' => 60,
            'default' => null,
            'null' => false
        ]);

        $table->addTimestamps('created_at', 'modified_at');
        $table->create();
    }
}
