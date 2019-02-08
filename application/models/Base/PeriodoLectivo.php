<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Model_PeriodoLectivo', 'doctrine');

/**
 * Model_Base_PeriodoLectivo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $periodo_lectivo_id
 * @property integer $periodo_id
 * @property string $anho_lectivo
 * @property string $activo
 * @property Model_Periodo $Periodo
 * @property Doctrine_Collection $EncParticular
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Model_Base_PeriodoLectivo extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('periodo_lectivo');
        $this->hasColumn('periodo_lectivo_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'periodo_lectivo_periodo_lectivo_id',
             ));
        $this->hasColumn('periodo_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('anho_lectivo', 'string', null, array(
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
		$this->hasColumn('visible_profesores', 'string', null, array(
			'type' => 'string',
			'fixed' => true,
			'unsigned' => false,
			'notnull' => true,
			'primary' => false,
			'default' => 'N'
		));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Model_Periodo as Periodo', array(
             'local' => 'periodo_id',
             'foreign' => 'periodo_id'));

        $this->hasMany('Model_EncParticular as EncParticular', array(
             'local' => 'periodo_lectivo_id',
             'foreign' => 'periodo_lectivo_id'));
    }
}