<?php

use Phinx\Migration\AbstractMigration;

class InitialCreate extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp')
            ->addColumn('modified', 'timestamp')
            ->create();

        $table = $this->table('bookmarks');
        $table->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp')
            ->addColumn('modified', 'timestamp')
            ->create();

        $table = $this->table('tags');
        $table->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'timestamp')
            ->addColumn('modified', 'timestamp')
            ->create();

        $table = $this->table('bookmarks_tags');
        $table->addColumn('bookmark_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tag_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp')
            ->addColumn('modified', 'timestamp')
            ->create();
    }

    public function down()
    {
        $this->dropTable('users');
        $this->dropTable('bookmarks');
        $this->dropTable('tags');
        $this->dropTable('bookmarks_tags');
    }
}
