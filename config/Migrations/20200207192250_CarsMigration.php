<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CarsMigration extends AbstractMigration
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
        $table = $this->table('cars', ['id' => false, 'primary_key' => 'id']);

        $table->addColumn('id', 'uuid');

        $table->addColumn('name', 'string', [
            'limit' => 60,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('year', 'integer', [
            'limit' => 4,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('year_model', 'integer', [
            'limit' => 4,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('description', 'text', [
            'limit' => 4,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('chassi', 'string', [
            'limit' => 50,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('identifier', 'string', [
            'limit' => 10,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('model', 'string', [
            'limit' => 100,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('color', 'string', [
            'limit' => 10,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('client_id', 'string', [
            'limit' => 100,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('company_id', 'string', [
            'limit' => 100,
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('vendor_id', 'string', [
            'limit' => 100,
            'default' => null,
            'null' => false
        ]);

        $table->addTimestamps('created_at', 'modified_at');
        $table->create();

    }
}
