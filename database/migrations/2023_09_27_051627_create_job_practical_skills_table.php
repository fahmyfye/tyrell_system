<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_practical_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->integer('practical_skill_id');
            $table->string('created_by');
            $table->dateTime('modified_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_practical_skills');
    }
};
