<?php
class Ins_QueryObject_Departamento_Listado extends Base_QueryObject
{
    public function __construct()
    {
        $this->doctrineQuery = Doctrine_Query::create()
        	 ->addSelect("d.departamento_id")
             ->addSelect("d.nombre, d.codigo")
             ->addSelect("f.facultad_id, f.nombre as facultad")
             ->from("Model_Departamento d")
             ->leftJoin("d.Facultad f")
             ->orderBy("d.codigo");
    }
    
    public function addSearchById($id)
    {
        $this->doctrineQuery->addWhere("d.departamento_id = ?", $id);
    }
}