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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('fullName');
            $table->set('gender', ['Laki-laki','Perempuan']);
            $table->date('birthDate');
            $table->string('placeBirth');
            $table->string('domicile');
            $table->string('address');
            $table->string("line_id");
            $table->string("whatsapp")->unique();

            $table->string('nim')->unique();
            $table->string('campus_region');
            $table->string('faculty');
            $table->string('major');
            $table->string('batch');

            $table->string('launching_schedule')->nullable();
            $table->string('lnt_course');

            $table->string('email')->unique();
            $table->string('password');

            $table->integer('role')->default(0);
            // 0 --> user
            // 1 --> superadmin
            // 2 dst --> admin

            // untuk mempermudah navbarnya?
            $table->integer('status')->default(0);
            // 0 --> sebelum launching
            // 1 --> sesudah launching
            // 2 --> sesudah payment
            // 3 --> sesudah member registration

            $table->set('payment_type',['individual','group'])->nullable();
            $table->boolean('has_group')->default(0);
            $table->string('payment_pic')->nullable();
            $table->integer('payment_status')->default(0);
            // 0 --> belum ada
            // 1 --> on progress
            // 2 --> reject
            // 3 --> approved

            $table->integer('reregister_status')->default(0);
            $table->string('reregister_schedule')->nullable();
            $table->integer('surat_status')->default(0);
            $table->string('bnccID')->unique()->nullable();
            $table->string('binus_email')->unique()->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
