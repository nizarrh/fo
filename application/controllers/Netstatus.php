<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Netstatus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function cluster()
    {
        $data['title'] = 'NETSTATUS / CLUSTER';
        $data['icon'] = '<i class="fas fa-fw fa-wrench"></i>';
        $data['desc'] = $this->db->get_where('desc')->row_array();
        $data['cluster']   = $this->Home_model->cluster();  
        $data['active_view']    = "home/cluster";
        $this->load->view('templates/frontend/index', $data);
    }

     public function jointing()
    {
        $data['title'] = 'NETSTATUS / JOINTING';
        $data['icon'] = '<i class="fas fa-fw fa-layer-group"></i>';
        $data['desc'] = $this->db->get_where('desc')->row_array();
        $data['jointing']   = $this->Home_model->jointing();  
        $data['active_view']    = "home/jointing";
        $this->load->view('templates/frontend/index', $data);
    }

     public function location()
    {
        $data['title'] = 'NETSTATUS / LOCATION POINT';
        $data['icon'] = '<i class="fas fa-location-arrow"></i>';
        $data['desc'] = $this->db->get_where('desc')->row_array();
        $data['location']   = $this->Home_model->location();  
        $data['active_view']    = "home/location";
        $this->load->view('templates/frontend/index', $data);
    }

    public function edit_cluster(){
        $id=$this->input->post('id');
        $cluster=$this->input->post('cluster');
        $this->Home_model->edit_cluster($id, $cluster);
        redirect('netstatus');
    }

    public function delete_cluster($id)
    {
        $this->Home_model->delete_cluster($id);
        $this->session->set_flashdata('success', 'Data Cluster Berhasil dihapus');
        redirect('netstatus'); //redirect
    }

}
