<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'first_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'last_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
                'unique'         => TRUE,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
            ],
            'status'      => [
                'type'           => 'ENUM',
                'constraint'     => ['user', 'admin', 'editor'],
                'default'        => 'user',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('users');
	}
}
