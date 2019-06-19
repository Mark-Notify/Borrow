<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_model
{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_book()
    {
        // $id = $this->session->userdata("id_store");
        $name       = $this->input->post('name');
        $category   = $this->input->post('category');
        $amount     = $this->input->post('amount');
        if($name != "") 
        {
            $data = array(
                        'name'      => $name,
                        'category'  => $category,
                        'amount'    => $amount,
                        'balance'   => $amount
                    );
            // var_dump($data);exit();
                $result=$this->db->insert('tbl_books',$data);
            redirect('/');
                return $result;
        }else{
            echo "error";
        }
    }

    public function save_borrow()
    {
        // $id = $this->session->userdata("id_store");
        $book_name    = $this->input->post('book_name');
        $book_id      = $this->input->post('book_id');
        $amount       = $this->input->post('amount');
        $balance      = $this->input->post('balance');
        $member_name  = $this->input->post('member_name');
        $status       = $this->input->post('status');
        $return_date  = $this->input->post('return_date');
        // var_dump($book_name);exit();
        if($book_name != "") 
        {
                $data = array(
                    'member_name'      => $member_name,
                    'book_id'  => $book_id,
                    'book_name'    => $book_name,
                    'amount_book'    => $amount,
                    'end_date'    => $return_date,
                    'status_borrow'   => $status
                );
                // echo "<pre>";
                // var_dump($data);exit();
                $result=$this->db->insert('tbl_booking',$data);

                $array = array(
                    'balance' => $balance-$amount,
                );
                $this->db->where('id', $book_id);
                $result = $this->db->update('tbl_books',$array);

                redirect('/');
                return $result;
        }else{
            echo "error";
        }
    }

    public function edit($id=null)
    {
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('id' , (int) $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_books');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_id($id=null)
    {
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('id' , (int) $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_history()
    {
        // SELECT * FROM `atbl_booking` `a` LEFT JOIN `tbl_books` `b` ON `b`.`id`=`a`.`book_id` ORDER BY `id` DESC
        $this->db->select('*');
        $this->db->from('tbl_booking a');
        $this->db->join('tbl_books b', 'b.id=a.book_id', 'right');
        // $this->db->order_by('b.id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function send()
    {
        $id = $this->input->post('id');
        $amount_book = $this->input->post('amount_book');
        $book_id = $this->input->post('book_id');
        $balance = $this->input->post('balance');
        var_dump($amount_book);
        $array = array(
            'status_borrow' => 'คืนหนังสือ'
        );
        $this->db->where('id_book', $id);
        $result = $this->db->update('tbl_booking',$array);

        $array = array(
            'balance' => $balance+$amount_book,
        );
        $this->db->where('id', $book_id);
        $result = $this->db->update('tbl_books',$array);
    }

}