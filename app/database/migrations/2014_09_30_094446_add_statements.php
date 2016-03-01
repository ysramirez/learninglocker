<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddStatements extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
    $indexOptions = ['background'=>1, 'socketTimeoutMS'=>-1];

		Schema::table('statements', function (Blueprint $table) use ($indexOptions) {
      $table->index('lrs._id', $indexOptions);
      $table->index(['lrs._id', 'statement.object.id'], $indexOptions);
      $table->index(['lrs._id', 'statement.verb.id'], $indexOptions);
      $table->index(['lrs._id', 'statement.actor.mbox'], $indexOptions);
      $table->index(['lrs._id', 'timestamp'], $indexOptions);
      $table->index(['statement.stored'], $indexOptions);
      $table->index(['statement.stored', 'lrs._id'], $indexOptions);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {    
		Schema::table('statements', function (Blueprint $table) use ($indexOptions) {
      $table->dropIndex('lrs._id');
			$table->dropIndex(['lrs._id', 'statement.object.id']);
      $table->dropIndex(['lrs._id', 'statement.verb.id']);
      $table->dropIndex(['lrs._id', 'statement.actor.mbox']);
      $table->dropIndex(['lrs._id', 'timestamp']);
      $table->dropIndex(['statement.stored']);
      $table->dropIndex(['statement.stored', 'lrs._id']);
		});
	}
}
