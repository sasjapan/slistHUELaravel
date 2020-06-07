<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->string('description');
            $table->bigIncrements('id');

            $table->bigInteger('list_id')->unsigned();
            $table->foreign('list_id')
                ->references('id')->on('slists')
                ->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->timestamps();

            /*
             * $table->foreignId('user_id')
      ->constrained()
      ->onDelete('cascade');
             */
        });
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(Feedback::class);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
