<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Model_Usuario', 'doctrine');

/**
 * Model_Base_Usuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $usuario_id
 * @property integer $persona_id
 * @property string $usuario
 * @property string $contrasena
 * @property string $activo
 * @property Model_Persona $Persona
 * @property Doctrine_Collection $UsuarioPerm
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Model_Base_Usuario extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario');
        $this->hasColumn('usuario_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'usuario_usuario_id',
             ));
        $this->hasColumn('persona_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('usuario', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             ));
        $this->hasColumn('contrasena', 'string', null, array(
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
        $this->hasOne('Model_Persona as Persona', array(
             'local' => 'persona_id',
             'foreign' => 'persona_id'));

        $this->hasMany('Model_UsuarioPerm as UsuarioPerm', array(
             'local' => 'usuario_id',
             'foreign' => 'usuario_id'));
    }
}