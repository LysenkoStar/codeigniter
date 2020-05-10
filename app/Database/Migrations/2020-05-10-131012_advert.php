<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Advert extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id'       => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'description' => [
                'type'           => 'TEXT',
                'null'           => TRUE,
            ],
            'thumbnail' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'author' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('adverts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('adverts');
	}
}
