<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHabitsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('habits_translations')) {
            Schema::create('habits_translations', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->bigInteger('habit')->comment('Habit')->unsigned();
                $table->char('locale', 2)->comment('Locale');
                $table->string('title', 256)->comment('Title');

                $table->foreign('habit')
                    ->references('id')
                    ->on('habits')
                    ->onDelete('cascade');
            });
        }

        // Generate few habits for few languages for tests
        DB::table('habits_translations')->insert([
            ['id' => 1, 'habit' => 1, 'locale' => 'ru', 'title' => 'Бег'],
            ['id' => 2, 'habit' => 2, 'locale' => 'ru', 'title' => 'Гидратировать'],
            ['id' => 3, 'habit' => 3, 'locale' => 'ru', 'title' => 'Чтение'],
            ['id' => 4, 'habit' => 1, 'locale' => 'de', 'title' => 'Laufen'],
            ['id' => 5, 'habit' => 2, 'locale' => 'de', 'title' => 'Hydrat'],
            ['id' => 6, 'habit' => 3, 'locale' => 'de', 'title' => 'lesen'],
            ['id' => 7, 'habit' => 1, 'locale' => 'es', 'title' => 'Corriendo'],
            ['id' => 8, 'habit' => 2, 'locale' => 'es', 'title' => 'Hidratar'],
            ['id' => 9, 'habit' => 3, 'locale' => 'es', 'title' => 'Leyendo'],
            ['id' => 10, 'habit' => 1, 'locale' => 'en', 'title' => 'Running'],
            ['id' => 11, 'habit' => 2, 'locale' => 'en', 'title' => 'Hydrate'],
            ['id' => 13, 'habit' => 3, 'locale' => 'en', 'title' => 'Reading'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habits_translations');
    }
}
