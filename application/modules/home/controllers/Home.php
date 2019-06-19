<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index() 
    {
        $data['books'] = $this->Home_model->get_all();

        // display
        $data['page_view'] = 'index';
        $data['template'] = 'default/main';

        $this->load->view('page', $data);
    }

    public function history() 
    {
        $data['list_history'] = $this->Home_model->get_all_history();

        // display
        $data['page_view'] = 'history';
        $data['template'] = 'default/main';

        $this->load->view('page', $data);
    }

    public function save(){
        $data=$this->Home_model->save_book();
        echo json_encode($data);
    }

    public function borrow(){
        $data=$this->Home_model->save_borrow();
        var_dump($data);
        echo json_encode($data);
    }

    public function send()
    {
        $data=$this->Home_model->send();
        echo json_encode($data);
    }

    public function edit($id)
    {
        // var_dump($id);
        $data['book'] = $this->Home_model->edit($id);
        // display
        $data['page_view'] = 'edit';
        $data['template'] = 'default/main';

        $this->load->view('page', $data);
    }
}
