<?php namespace CI4Xpander\Dashboard\Database\Migrations;

class CreateTableRole extends \CI4Xpander\Migration
{
	public function up()
	{
        $this->db->transStart();

        $this->forge->addField(array_merge(
            \CI4Xpander\Helpers\Database\Table\Field::ID(),
            \CI4Xpander\Helpers\Database\Table\Field::parentID(),
            \CI4Xpander\Helpers\Database\Table\Field::foreignID('status'),
            \CI4Xpander\Helpers\Database\Table\Field::string('code', [
                'null' => false
            ]),
            \CI4Xpander\Helpers\Database\Table\Field::string('name', [
                'null' => false
            ]),
            \CI4Xpander\Helpers\Database\Table\Field::text('description'),
            \CI4Xpander\Helpers\Database\Table\Field::orderingInteger('level'),
            \CI4Xpander\Helpers\Database\Table\Field::trackable()
        ))->addUniqueKey('code')->addPrimaryKey('id')->createTable('role');

        $this->db->transComplete();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->db->transStart();

        $this->forge->dropTable('role', true);

        $this->db->transComplete();
	}
}
