<?php

use yii\db\Migration;

/**
 * Handles the creation of table `organization`.
 */
class m160902_081728_create_organization_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('organization', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('名称'),
            'province_id' => $this->integer()->comment('省份ID'),
            'province_cn' => $this->string()->comment('省份名称'),
            'city_id' => $this->integer()->comment('城市ID'),
            'city_cn' => $this->string()->comment('城市名称'),
            'district_id' => $this->integer()->comment('县区ID'),
            'district_cn' => $this->string()->comment('县区名称'),
            'better_address' => $this->string(255)->comment('详细地址'),
            'contact' => $this->string()->comment('联系人'),
            'created_by' => $this->integer()->comment('创建人ID'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('organization');
    }
}
