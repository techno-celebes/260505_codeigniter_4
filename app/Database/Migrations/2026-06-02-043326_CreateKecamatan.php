<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKecamatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true,  // INI SUDAH MEMBUAT INDEX
            ],
            'nama_kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kode_kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kode_provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default' => 'aktif',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        // HAPUS BARIS INI -> $this->forge->addKey('kode_kecamatan');
        $this->forge->addKey('kode_kabupaten');
        $this->forge->addKey('kode_provinsi');
        
        $this->forge->createTable('kecamatan');
    }

    public function down()
    {
        $this->forge->dropTable('kecamatan', true);
    }
}