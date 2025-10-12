<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->unique()->after('password');
            $table->date('birthday')->nullable()->after('phone');
            $table->string('address')->nullable()->after('birthday');
            $table->string('city')->nullable()->after('address');
            $table->string('district')->nullable()->after('city');
            $table->string('ward')->nullable()->after('district');
            $table->string('avatar')->nullable()->after('ward');
            $table->enum('role', ['customer', 'admin', 'staff'])->default('customer')->after('avatar');
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active')->after('role');
            $table->timestamp('last_login_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn([
                'phone', 'gender', 'birthday', 'address', 'city', 'district',
                'ward', 'avatar', 'role', 'status', 'last_login_at'
            ]);
        });
    }
};
