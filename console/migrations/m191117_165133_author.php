<?php

use yii\db\Migration;

/**
 * Class m191117_165133_author
 */
class m191117_165133_author extends Migration
{

    public function up()
    {
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'birth_date' => $this->date()->notNull(),
        ]);

        $this->batchInsert('author',
            ['name', 'surname', 'birth_date'],
        [
            ['Rebecca', 'Kuang', '1996-05-29'],
            ['Sarah', 'Gaile', '1985-02-15'],
            ['Erin', 'Morgenstern', '1978-07-08'],
            ['Andrew', 'Shaffer', '1976-04-05'],
            ['Matt', 'Kracht', '1980-11-26'],
        ]);

    }

    public function down()
    {
        $this->dropTable('author');
    }

}
