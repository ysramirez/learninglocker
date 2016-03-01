<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatementIdIndex extends Migration {

	public function up() {
    $indexOptions = ['background'=>1, 'socketTimeoutMS'=>-1];

		Schema::table('statements', function (Blueprint $table) use ($indexOptions) {
      $table->index(['statement.id', 'lrs._id'], $indexOptions);
    });
	}

	public function down() {
		Schema::table('statements', function (Blueprint $table) {
      $table->dropIndex(['statement.id', 'lrs._id']);
    });
	}
}
