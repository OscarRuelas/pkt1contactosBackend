<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class ContactoController extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("ContactoModel");
    }
    public function save(){
        $nombre = $this->input->post("nombre");
        $app = $this->input->post("app");
        $apm = $this->input->post("apm");
        $calle = $this->input->post("calle");
        $num_ext = $this->input->post("num_ext");
        $num_int = $this->input->post("num_int");
        $colonia= $this->input->post("colonia");
        $codigo_postal = $this->input->post("cp");
        $telefono = $this->input->post("telefono");
        $correo = $this->input->post("correo");

        
        $data = array(
            "nombre"=>$nombre,
            "app"=>$app,
            "apm"=>$apm,
            "calle"=>$calle,
            "num_ext"=>$num_ext,
            "num_int"=>$num_int,
            "colonia"=>$colonia,
            "cp"=>$codigo_postal,
            "telefono"=>$telefono,
            "correo"=>$correo
        );
        
        $this->ContactoModel->save($data);
        echo "Contacto Registrado";
    
    }
    public function FullContactos(){
        $data = $this->ContactoModel->getContacto();
        echo json_encode($data);
        // print_r($data);
    }
    
    public function ObtenerUnContacto($id){
        $data = $this->ContactoModel->getOneContacto($id);
        echo json_encode($data);
        // print_r($data);
    }
    
    public function UpdateContacto($id){
        $nombre = $this->input->post("nombre");
        $app = $this->input->post("app");
        $apm = $this->input->post("apm");
        $calle = $this->input->post("calle");
        $num_ext = $this->input->post("num_ext");
        $num_int = $this->input->post("num_int");
        $colonia = $this->input->post("colonia");
        $codigo_postal = $this->input->post("cp");
        $telefono = $this->input->post("telefono");
        $correo = $this->input->post("correo");

        
        $data = array(
            "nombre"=>$nombre,
            "app"=>$app,
            "apm"=>$apm,
            "calle"=>$calle,
            "num_ext"=>$num_ext,
            "num_int"=>$num_int,
            "colonia"=>$colonia,
            "cp"=>$codigo_postal,
            "telefono"=>$telefono,
            "correo"=>$correo
        );
        
        $this->ContactoModel->update($data,$id);
        echo "Contacto Actulizado";

    }
    public function deleteContacto($id){
        $this->ContactoModel->delete($id);
        echo "Contacto Eliminado";
    }
}
