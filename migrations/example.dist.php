<?php
use Illuminate\Database\Schema\Blueprint;
use Egosun\Database\Migration;

/**
 * File should have name YYYYMMDDHHMMSS_CreateTestTable.php
 */
class Example extends Migration
{
	private string $table = 'test';

    public function up(): void
    {
        $this->schema->create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->timestamps();
            $table->index('tag');
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists($this->table);
    }
}
