<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

   public function up(): void {
        Schema::table('users', function (Blueprint $t) {
            $t->boolean('is_premium')->default(false)->index();
            $t->timestamp('subscription_ends_at')->nullable()->index();
        });
    }
    public function down(): void {
        Schema::table('users', function (Blueprint $t) {
            $t->dropColumn(['is_premium','subscription_ends_at']);
        });
    }
};
