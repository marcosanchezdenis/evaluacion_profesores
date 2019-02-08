<?php
class Ins_AsignaturaController extends Base_Controller
{
    const CODIGO_OPERACION = 'ins-asi';
    
    public function init()
    {
        parent::init();
    
        if (!$this->tienePermisos(self::CODIGO_OPERACION)) {
            $this->goHomePage();
        }
    }
    
	public function indexAction()
	{
		$this->view->mainTitle = "Listado de Asignaturas";
		$this->view->errors    = $this->_helper->flashMessenger->getMessages();
		
		$asignaturas = $this->getRepository()->find();
		$this->view->asignaturas = $asignaturas;
	}
	
	public function getCarreras()
	{
	    $carreras = $this->getRepository()->getCarreras();
	    return $carreras;
	}
	
	public function crearAction()
	{
	    $this->view->mainTitle = "Agregar Asignatura";
	    $this->view->carreras  = $this->getCarreras();
	    
	    if ($this->getRequest()->isPost()) {
	        $data = $this->getRequest()->getPost();
	        
	        $builder = new Ins_Builder_Asignatura_DatosPrincipales($data, $this->getRepository());
	        $results = $builder->generateModels();
	        
	        if ($results["status"]) {
	            $id = $builder->save();
	            $this->_redirect('/ins/asignatura/index');
	        }
	        
	        $this->view->departamento = $data;
	        $this->view->errors = $results["errors"];
	    }
	}
	
	public function editarAction()
	{
	    $this->view->mainTitle = "Edici&oacute;n de Asignatura";
	    $this->view->carreras  = $this->getCarreras();
	    
	    if ($this->getRequest()->isPost()) {
	        $data = $this->getRequest()->getPost();
	        $id = $data["asignatura_id"];
	        	
	        $builder = new Ins_Builder_Asignatura_DatosPrincipales($data, $this->getRepository());
	        $results = $builder->generateModels();
	        	
	        if ($results["status"]) {
	            $id = $builder->save();
	            $this->_redirect('/ins/asignatura/index');
	        }
	        	
	        $this->view->asignatura = $data;
	        $this->view->errors = $results["errors"];
	        $this->_redirect('/ins/asignatura/editar?id=' . $id);
	    } else {
	        $id = $this->getParam("id");
	        
	        $asignatura = $this->getRepository()->findModelById($id);
	        if (count($asignatura->EncParticular)) {
	            $this->_helper->flashMessenger->addMessage("La asignatura no se puede editar <em><b>(Ya se utiliza en una encuesta)</b></em>");
	            $this->_redirect('/ins/asignatura/index');
	        }
	        
	        $results = $this->getRepository()->findById($id);
	        $this->view->asignatura = $results;
	    }
	}
	
	public function borrarAction()
	{
	    $id = $this->getParam("id");
	    $asignatura = $this->getRepository()->findModelById($id);
	    
	    if (count($asignatura->EncParticular)) {
	        $this->_helper->flashMessenger->addMessage("La asignatura no se puede borrar <em><b>(Ya se utiliza en una encuesta)</b></em>");
	        $this->_redirect('/ins/asignatura/index');
	    } else {
	        $asignatura->delete();
	        $this->_redirect('/ins/asignatura/index');
	    }
	}
	
	public function activarAction()
	{
	    $id = $this->getParam("id");
	    $asignatura = $this->getRepository()->findModelById($id);
	    
	    $asignatura->activo = ($asignatura->activo == "S") ? ("N") : ("S");
	    $asignatura->save();
	    
	    $this->_redirect('/ins/asignatura/index');
	}
	
	public function getRepository()
	{
	    return new Ins_Repository_Asignatura();
	}
}
