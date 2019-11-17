<?php

use yii\db\Migration;

/**
 * Class m191117_171356_author_book
 */
class m191117_171356_author_book extends Migration
{
    public function up()
    {
        $this->createTable('author_book', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);

        $this->batchInsert('author_book',
            ['author_id', 'book_id'],
        [
            [1, 1],
            [2, 2],
            [3, 3],
            [4, 4],
            [5, 5],
        ]);

        $this->addForeignKey(
            'fk-author_book-author',
            'author_book',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-author_book-book',
            'author_book',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('author_book');
    }
}
