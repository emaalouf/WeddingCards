<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('cards_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invitee_name');
            $table->integer('persons_invited')->nullable();
            $table->boolean('sahra_included')->default(0);
            $table->string('invite_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
