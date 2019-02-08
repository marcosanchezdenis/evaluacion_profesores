<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Model_Departamento', 'doctrine');

/**
 * Model_Base_Departamento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $departamento_id
 * @property integer $facultad_id
 * @property string $nombre
 * @property string $codigo
 * @property Model_Facultad $Facultad
 * @property Doctrine_Collection $Carrera
 * @property Doctrine_Collection $DocenteDpto
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Model_Base_Departamento extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('departamento');
        $this->hasColumn('departamento_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'departamento_departamento_id',
             ));
        $this->hasColumn('facultad_id', 'integer', 4, array(
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Model_Facultad as Facultad', array(
             'local' => 'facultad_id',
             'foreign' => 'facultad_id'));

        $this->hasMany('Model_Carrera as Carrera', array(
             'local' => 'departamento_id',
             'foreign' => 'departamento_id'));

        $this->hasMany('Model_DocenteDpto as DocenteDpto', array(
             'local' => 'departamento_id',
             'foreign' => 'departamento_id'));
    }
}