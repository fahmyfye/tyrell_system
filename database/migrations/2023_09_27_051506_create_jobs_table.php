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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('media_id');
            $table->integer('job_category_id');
            $table->integer('job_type_id');
            $table->text('description');
            $table->text('detail');
            $table->text('business_skill');
            $table->text('knowledge');
            $table->string('location');
            $table->text('activity');
            $table->text('academic_degree_doctor');
            $table->text('academic_degree_master');
            $table->text('academic_degree_professional');
            $table->text('academic_degree_bachelor');
            $table->string('salary_statistic_group');
            $table->double('salary_range_first_year', 8, 2);
            $table->double('salary_range_average', 8, 2);
            $table->text('salary_range_remarks');
            $table->text('restriction');
            $table->string('estimated_total_workers');
            $table->text('remarks');
            $table->string('url');
            $table->text('seo_description');
            $table->text('seo_keywords');
            $table->integer('sort_order');
            $table->bool('publish_status');
            $table->string('version');
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
        Schema::dropIfExists('jobs');
    }
};
