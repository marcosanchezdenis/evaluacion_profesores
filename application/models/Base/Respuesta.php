<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Model_Respuesta', 'doctrine');

/**
 * Model_Base_Respuesta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $respuesta_id
 * @property integer $enc_particular_id
 * @property date $fecha
 * @property Model_EncParticular $EncParticular
 * @property Doctrine_Collection $RespDetalle
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Model_Base_Respuesta extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('respuesta');
        $this->hasColumn('respuesta_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'respuesta_respuesta_id',
             ));
        $this->hasColumn('enc_particular_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('fecha', 'date', null, array(
             'type' => 'date',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Model_EncParticular as EncParticular', array(
             'local' => 'enc_particular_id',
             'foreign' => 'enc_particular_id'));

        $this->hasMany('Model_RespDetalle as RespDetalle', array(
             'local' => 'respuesta_id',
             'foreign' => 'respuesta_id'));
    }
}