<?php

use app\components\migration\KVMigration;

/**
 * Handles the creation of table `occupation`.
 */
class m181205_104903_create_occupation_table extends KVMigration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable($this->db_prefix.'occupation', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Род деятельности')
        ]);
        
        $this->createTable($this->db_prefix . 'person_occupation', [
            'person_id' => $this->integer(),
            'occupation_id' => $this->integer(),
            'PRIMARY KEY (person_id,occupation_id)'
        ]);
        $this->createIndex(
            'idx-person_occupation-person_id',
            $this->db_prefix .'person_occupation',
            'person_id'
        );
        $this->createIndex(
            'idx-person_occupation-occupation_id',
            $this->db_prefix .'person_occupation',
            'occupation_id'
        );
        
        $this->createTable($this->db_prefix . 'film_person_occupation', [
            'film_id' => $this->integer(),
            'person_id' => $this->integer(),
            'occupation_id' => $this->integer(),
            'PRIMARY KEY (film_id,person_id,occupation_id)'
        ]);
        $this->createIndex(
            'idx-film_person_occupation-film_id',
            $this->db_prefix . 'film_person_occupation',
            'film_id'
        );
        $this->createIndex(
            'idx-film_person_occupation-person_id',
            $this->db_prefix . 'film_person_occupation',
            'person_id'
        );
        $this->createIndex(
            'idx-film_person_occupation-occupation_id',
            $this->db_prefix . 'film_person_occupation',
            'occupation_id'
        );
        
        
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropIndex(
            'idx-person_occupation-person_id',
            $this->db_prefix . 'person_occupation'
        );
        $this->dropIndex(
            'idx-person_occupation-occupation_id',
            $this->db_prefix . 'person_occupation'
        );
        
        $this->dropIndex(
            'idx-film_person_occupation-film_id',
            $this->db_prefix .'film_person_occupation'
        ); 
        $this->dropIndex(
            'idx-film_person_occupation-person_id',
           $this->db_prefix . 'film_person_occupation'
        );
        $this->dropIndex(
            'idx-film_person_occupation-occupation_id',
            'film_person_occupation'
        );
        
        $this->dropTable($this->db_prefix.'occupation');
        $this->dropTable($this->db_prefix.'person_occupation');
        $this->dropTable($this->db_prefix.'film_person_occupation');
    }
}
