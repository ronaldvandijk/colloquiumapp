<?php

class MigrationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_all_tables_can_migrate()
    {
        $this->assertTrue(Schema::hasTable('colloquia'));
        $this->assertTrue(Schema::hasTable('theme_users'));
        $this->assertTrue(Schema::hasTable('themes'));
        $this->assertTrue(Schema::hasTable('colloquium_themes'));
        $this->assertTrue(Schema::hasTable('invitees'));
        $this->assertTrue(Schema::hasTable('colloquium_types'));
        $this->assertTrue(Schema::hasTable('languages'));
        $this->assertTrue(Schema::hasTable('colloquium_examinators'));
        $this->assertTrue(Schema::hasTable('colloquium_users'));
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasTable('roles'));
        $this->assertTrue(Schema::hasTable('rooms'));
        $this->assertTrue(Schema::hasTable('buildings'));
        $this->assertTrue(Schema::hasTable('locations'));
        $this->assertTrue(Schema::hasTable('cities'));
    }

    public function test_all_tables_are_deleted_on_rollback()
    {
        Artisan::call('migrate:rollback');
        $this->assertFalse(Schema::hasTable('colloquia'));
        $this->assertFalse(Schema::hasTable('theme_users'));
        $this->assertFalse(Schema::hasTable('themes'));
        $this->assertFalse(Schema::hasTable('colloquium_themes'));
        $this->assertFalse(Schema::hasTable('invitees'));
        $this->assertFalse(Schema::hasTable('colloquium_types'));
        $this->assertFalse(Schema::hasTable('languages'));
        $this->assertFalse(Schema::hasTable('colloquium_examinators'));
        $this->assertFalse(Schema::hasTable('colloquium_users'));
        $this->assertFalse(Schema::hasTable('users'));
        $this->assertFalse(Schema::hasTable('roles'));
        $this->assertFalse(Schema::hasTable('rooms'));
        $this->assertFalse(Schema::hasTable('buildings'));
        $this->assertFalse(Schema::hasTable('locations'));
        $this->assertFalse(Schema::hasTable('cities'));
    }
}
