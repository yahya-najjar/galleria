<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id(); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('category_id');
            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Actual fields we want to translate
            $table->string("name");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE category_translations ADD FULLTEXT idx_full_name(name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_translations');
        DB::statement('ALTER TABLE category_translations DROP INDEX idx_full_name;');
    }
}
