<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAttendanceTable extends Migration
{
    public function up()
    {
        Schema::create('course_attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('customer_id')->constrained('users');
            $table->integer('session_number');
            $table->boolean('attended');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_attendance');
    }
}
