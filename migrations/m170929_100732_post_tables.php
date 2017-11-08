<?php
    
    use yii\db\Migration;
    
    class m170929_100732_post_tables extends Migration
    {
        use porcelanosa\components\traits\TextTypesTrait;
        
        public function safeUp()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
            }
            $this->createTable('{{%posts}}', [
                'id'           => $this->primaryKey(),
                'post_type_id' => $this->integer()->defaultValue(1),
                'post_cat_id'  => $this->integer()->defaultValue(null),
                'slug'         => $this->string(255),
                'name'         => $this->string(255),
                'title'        => $this->string(255),
                'meta_descr'   => $this->string(255),
                'short_text'   => $this->text(),
                'text'         => $this->longText(),
                'image'        => $this->string(255),
                'updated_at'   => $this->integer()->defaultValue(null),
                'created_at'   => $this->integer()->defaultValue(null),
                'sort'         => $this->integer()->defaultValue(null),
                'active'       => $this->integer()->defaultValue(1),
            
            ], $tableOptions);
            $this->createTable('{{%post_types}}', [
                'id'         => $this->primaryKey(),
                'slug'       => $this->string(255),
                'name'       => $this->string(255),
                'title'      => $this->string(255),
                'meta_descr' => $this->string(255),
                'sort'       => $this->integer()->defaultValue(null),
                'active'     => $this->integer()->defaultValue(1),
            
            ], $tableOptions);
            $this->createTable('{{%post_cats}}', [
                'id'         => $this->primaryKey(),
                'parent_id'  => $this->integer()->defaultValue(null),
                'slug'       => $this->string(255),
                'name'       => $this->string(255),
                'title'      => $this->string(255),
                'meta_descr' => $this->string(255),
                'short_text' => $this->text(),
                'text'       => $this->text(),
                'image'        => $this->string(255),
                'sort'       => $this->integer()->defaultValue(null),
                'active'     => $this->integer()->defaultValue(1),
            
            ], $tableOptions);
            $this->createTable('{{%post_meta}}', [
                'id'       => $this->primaryKey(),
                'post_id'  => $this->integer()->defaultValue(null),
                'meta_key' => $this->string(255),
                'meta_value'     => $this->longText(),
            
            ], $tableOptions);
        }
        
        public function safeDown()
        {
            
            $this->dropTable('{{%posts}}');
            $this->dropTable('{{%post_types}}');
            $this->dropTable('{{%post_meta}}');
            $this->dropTable('{{%post_cats}}');
        }
        
        /*
        // Use up()/down() to run migration code without a transaction.
        public function up()
        {
    
        }
    
        public function down()
        {
            echo "m170929_100732_post_tables cannot be reverted.\n";
    
            return false;
        }
        */
    }
