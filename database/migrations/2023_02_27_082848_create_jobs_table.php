<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('complexity');
            $table->unsignedBigInteger('work_time');
            $table->unsignedBigInteger('month');
            $table->timestamps();

            // тут вяжем таблицы услуг и нарядов
            $table->index('service_id', 'job_service_idx');
            $table->foreign('service_id', 'job_service_fk')
                ->on('services')
                ->references('id');

            // тут вяжем таблицы пользователей и нарядов
            $table->index('user_id', 'job_user_idx');
            $table->foreign('user_id', 'job_user_fk')
                ->on('users')
                ->references('id')->onDelete('cascade');

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
}
