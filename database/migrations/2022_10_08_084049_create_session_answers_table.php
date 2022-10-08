<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('quiz_session_id')
                ->references('id')
                ->on('quiz_sessions')
                ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Quiz::class)
                ->references('id')
                ->on('quizzes')
                ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Question::class)
                ->references('id')
                ->on('questions')
                ->cascadeOnDelete();
            $table->string('answer', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_answers');
    }
};
