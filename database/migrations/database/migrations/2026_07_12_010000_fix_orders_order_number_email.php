<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (!Schema::hasColumn('orders', 'order_number')) {
                    $table->string('order_number')->nullable()->unique();
                }

                if (!Schema::hasColumn('orders', 'email')) {
                    $table->string('email')->nullable();
                }
            });
        }

        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'stock')) {
                    $table->integer('stock')->default(10);
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (Schema::hasColumn('orders', 'order_number')) {
                    $table->dropColumn('order_number');
                }

                if (Schema::hasColumn('orders', 'email')) {
                    $table->dropColumn('email');
                }
            });
        }

        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (Schema::hasColumn('products', 'stock')) {
                    $table->dropColumn('stock');
                }
            });
        }
    }
};