<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DbTest extends CTestCase
{
    public function testConnection()
    {
        $this->assertNotEquals(NULL, Yii::app()->db);
    }
}

?>
