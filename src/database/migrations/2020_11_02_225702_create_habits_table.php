<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('habits')) {
            Schema::create('habits', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('photo1x', 256)->comment('URL photo x1');
                $table->string('photo2x', 256)->comment('URL photo x2')->nullable();
                $table->string('photo3x', 256)->comment('URL photo x3')->nullable();
                $table->boolean('active')->comment('Active')->default(false);
            });
        }

        //Generate few habits for few languages for tests
        DB::table('habits')->insert([
            [
                'id' => 1,
                'photo1x' => 'ultiself.com/storage/habits/image-square1x-id-122.jpeg',
                'photo2x' => 'ultiself.com/storage/habits/image-square2x-id-122.jpeg',
                'photo3x' => 'ultiself.com/storage/habits/image-square3x-id-122.jpeg',
                'active' => true,
            ],
            [
                'id' => 2,
                'photo1x' => 'ultiself.com/storage/habits/image-square1x-id-13.jpeg',
                'photo2x' => 'ultiself.com/storage/habits/image-square2x-id-13.jpeg',
                'photo3x' => 'ultiself.com/storage/habits/image-square3x-id-13.jpeg',
                'active' => true,
            ],
            [
                'id' => 3,
                'photo1x' => 'ultiself.com/storage/habits/image-square1x-id-54.jpeg',
                'photo2x' => 'ultiself.com/storage/habits/image-square2x-id-54.jpeg',
                'photo3x' => 'ultiself.com/storage/habits/image-square3x-id-54.jpeg',
                'active' => false,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habits');
    }
}
