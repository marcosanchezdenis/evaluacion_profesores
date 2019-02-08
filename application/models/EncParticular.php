<?php

/**
 * Model_EncParticular
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Model_EncParticular extends Model_Base_EncParticular
{
    public function getRespuestas($departamento, $dpto)
    {
        $respuestas = array();
        
        foreach ($this->Respuesta as $respuesta) {
            $respuestas[] = $respuesta->respuesta_id;
        }
        
        return $this->Encuesta->getPuntajes($respuestas, $departamento, $dpto);
    }
}