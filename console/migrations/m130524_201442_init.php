<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        /**
         *
         */
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'is_deleted' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
        
        /**
         *  property
         */
        $this->createTable('{{%property}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255)->notNull(),
            'value' => $this->string(255)->notNull(),
            'sort' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'is_deleted' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
        
        /**
         *  property
         */
//         $this->createTable('{{%property}}', [
//             'id' => $this->primaryKey(),
//             'type' => $this->string(255)->notNull(),
//             'value' => $this->string(255)->notNull(),
//             'sort' => $this->integer()->notNull()->defaultValue(0),
//             'created_at' => $this->integer()->notNull(),
//             'updated_at' => $this->integer()->notNull(),
//         ], $tableOptions);
        
        
        //添加初始管理员
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => '$2y$13$q65XnzBK3dvClQnLvGjywuCBMJF/LsnhkS9k52uJQ9qvCd2UDO32u',
            'password_reset_token' => '',
            'email' => 'admin@admin.com',
            'auth_key' => 'XH60fxD-BmjlHY2OaZTXS6k7nn1vR6xC',
            'status' => '10',
            'created_at' => '1460181562',
            'updated_at' => '1460181562',
            'is_deleted' => '0',
            'name' => '超级管理员',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
