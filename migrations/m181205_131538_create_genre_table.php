<?php

use app\components\migration\KVMigration;
use yii\db\Schema;

/**
 * Handles the creation of table `genre`.
 */
class m181205_131538_create_genre_table extends KVMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable($this->db_prefix . 'genre', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Жанр'),
            'code' => $this->string()->notNull()->comment('Символьный код')
        ]);
        $this->createTable($this->db_prefix . 'film_genre', [
            'film_id' => $this->integer(),
            'genre_id' => $this->integer(),
            'PRIMARY KEY (film_id,genre_id)'
        ]);
        $this->createIndex(
            'idx-film_genre-film_id',
            $this->db_prefix . 'film_genre',
            'film_id'
        );
        $this->createIndex(
            'idx-film_genre-genre_id',
            $this->db_prefix . 'film_genre',
            'genre_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropIndex(
            'idx-film_genre-film_id',
            $this->db_prefix . 'film_genre'
        );
        $this->dropIndex(
            'idx-film_genre-genre_id',
            $this->db_prefix . 'film_genre'
        );        
        $this->dropTable($this->db_prefix . 'genre');
        $this->dropTable($this->db_prefix . 'film_genre');
    }
}
