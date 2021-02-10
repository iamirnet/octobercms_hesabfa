<?php namespace iAmirNet\HesabFa\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class OrderAddHesabfaCodeField extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('azarinweb_minimall_orders', 'hesabfa_code')) {
            return;
        }

        Schema::table('azarinweb_minimall_orders', function($table)
        {
            $table->string('hesabfa_code', 191)->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasTable('azarinweb_minimall_orders')) {
            Schema::table('azarinweb_minimall_orders', function ($table) {
                $table->dropColumn(['hesabfa_code']);
            });
        }
    }
}
