<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Model_Asignatura', 'doctrine');

/**
 * Model_Base_Asignatura
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asignatura_id
 * @property integer $carrera_id
 * @property string $nombre
 * @property string $codigo
 * @property string $activo
 * @property Model_Carrera $Carrera
 * @property Doctrine_Collection $EncParticular
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Model_Base_Asignatura extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('asignatura');
        $this->hasColumn('asignatura_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'asignatura_asignatura_id',
             ));
        $this->hasColumn('carrera_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('nombre', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('codigo', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('activo', 'string', null, array(
             'type' => 'string',
             'fixed' => true,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Model_Carrera as Carrera', array(
             'local' => 'carrera_id',
             'foreign' => 'carrera_id'));

        $this->hasMany('Model_EncParticular as EncParticular', array(
             'local' => 'asignatura_id',
             'foreign' => 'asignatura_id'));
    }
}