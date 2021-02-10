<?php namespace iAmirNet\HesabFa\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UserAddHesabfaCodeField extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('users', 'hesabfa_code')) {
            return;
        }

        Schema::table('users', function($table)
        {
            $table->string('hesabfa_code', 191)->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function ($table) {
                $table->dropColumn(['hesabfa_code']);
            });
        }
    }
}
