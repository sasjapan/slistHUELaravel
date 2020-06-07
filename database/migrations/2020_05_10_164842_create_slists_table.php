<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreateSlistsTable extends Migration
{

    public function up()
    {

        Schema::create('slists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('list_name');
            $table->date('duedate');
            $table->boolean('done');

            $table->bigInteger('creator_id')->unsigned();
            $table->foreign('creator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->bigInteger('helper_id')->nullable()->unsigned();
            $table->foreign('helper_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(Slist::class);
    }

   public function down()
    {
       Schema::dropIfExists('slists');
    }

}
