<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignKeyIndexes extends Migration {

	public function up() {
    $indexOptions = ['background'=>1, 'socketTimeoutMS'=>-1];

		Schema::table('statements', function (Blueprint $table) use ($indexOptions){
      $table->index('lrs_id', $indexOptions);
      $table->index(['lrs_id', 'statement.object.id'], $indexOptions );
      $table->index(['lrs_id', 'statement.verb.id'], $indexOptions );
      $table->index(['lrs_id', 'statement.actor.mbox'], $indexOptions );
      $table->index(['lrs_id', 'timestamp'], $indexOptions );
      $table->index(['statement.stored', 'lrs_id'], $indexOptions );
      $table->index(['statement.id', 'lrs_id'], $indexOptions );
      $table->dropIndex('lrs._id');
      $table->dropIndex(['lrs._id', 'statement.object.id']);
      $table->dropIndex(['lrs._id', 'statement.verb.id']);
      $table->dropIndex(['lrs._id', 'statement.actor.mbox']);
      $table->dropIndex(['lrs._id', 'timestamp']);
      $table->dropIndex(['statement.stored', 'lrs._id']);
      $table->dropIndex(['statement.id', 'lrs._id']);
    });
	}

	public function down() {
    $indexOptions = ['background'=>1, 'socketTimeoutMS'=>-1];

		Schema::table('statements', function (Blueprint $table) use ($indexOptions) {
      $table->index('lrs._id', $indexOptions);
      $table->index(['lrs._id', 'statement.object.id'], $indexOptions);
      $table->index(['lrs._id', 'statement.verb.id'], $indexOptions);
      $table->index(['lrs._id', 'statement.actor.mbox'], $indexOptions);
      $table->index(['lrs._id', 'timestamp'], $indexOptions);
      $table->index(['statement.stored', 'lrs._id'], $indexOptions);
      $table->index(['statement.id', 'lrs._id'], $indexOptions);
      $table->dropIndex('lrs_id');
      $table->dropIndex(['lrs_id', 'statement.object.id']);
      $table->dropIndex(['lrs_id', 'statement.verb.id']);
      $table->dropIndex(['lrs_id', 'statement.actor.mbox']);
      $table->dropIndex(['lrs_id', 'timestamp']);
      $table->dropIndex(['statement.stored', 'lrs_id']);
      $table->dropIndex(['statement.id', 'lrs_id']);
    });
	}

}
