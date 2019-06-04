<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("post_model","post");
    }

    function create()
    {
        if (@$_POST['create_post']) {
            $data = $_POST['post'];
            $data['post_date'] = date('Y-m-d H:i:s');
            $this->post->add($data);
            $this->session->set_flashdata('message', "Post created succesfully");
            redirect("post_controller");
        }
        $this->load->view("post/create");
    }

    function index()
    {
        $data['posts'] = $this->post->getAll();
        $this->load->view("post/index",$data);
    }

    function edit()
    {
        $id = $this->uri->segment(3);   
        $post = $this->post->getById($id);
        if (!$post) {
            redirect("post_controller");
        }
        if(@$_POST['update_post'])
        {
            $postdata = $_POST['post'];
            $this->post->update($postdata,$id);
            $this->session->set_flashdata('message',"Post updated succesfully");
            redirect("post_controller");
        }
        $data['post'] = $post;
        $this->load->view("post/edit",$data);
    }
}
