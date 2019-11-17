<?php

use yii\db\Migration;

/**
 * Class m191117_165144_book
 */
class m191117_165144_book extends Migration
{
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'pages' => $this->integer()->notNull(),
            'genre' => $this->string()->notNull(),
        ]);

        $this->batchInsert('book',
            ['title', 'pages', 'genre'],
        [
            ['The Dragon Republic', 654, 'Fantasy'],
            ['Magic for Liars', 336, 'Fantasy'],
            ['The Starless Sea', 512, 'Fantasy'],
            ['Hope Rides Again', 288, 'Mystery'],
            ['The Field Guide to Dumb Birds of North America', 176, 'Mystery'],
        ]);
    }

    public function down()
    {
        $this->dropTable('book');
    }
}
