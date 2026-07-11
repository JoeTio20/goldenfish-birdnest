<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'stock')) $table->integer('stock')->default(10)->after('price');
        });
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'order_number')) $table->string('order_number')->nullable()->unique()->after('id');
            if (!Schema::hasColumn('orders', 'email')) $table->string('email')->nullable()->after('last_name');
        });
    }
    public function down(): void {
        Schema::table('products', function (Blueprint $table) { if (Schema::hasColumn('products','stock')) $table->dropColumn('stock'); });
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders','order_number')) $table->dropColumn('order_number');
            if (Schema::hasColumn('orders','email')) $table->dropColumn('email');
        });
    }
};
