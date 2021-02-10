<?php namespace iAmirNet\HesabFa\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class ProductAddHesabfaCodeField extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('azarinweb_minimall_products', 'hesabfa_code')) {
            return;
        }

        Schema::table('azarinweb_minimall_products', function($table)
        {
            $table->string('hesabfa_code', 191)->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasTable('azarinweb_minimall_products')) {
            Schema::table('azarinweb_minimall_products', function ($table) {
                $table->dropColumn(['hesabfa_code']);
            });
        }
    }
}
