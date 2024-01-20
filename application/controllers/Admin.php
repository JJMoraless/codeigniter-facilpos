<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->helper("post_helper");
        $this->load->library('form_validation');
        $this->load->library('parser');
        $this->load->model("Post");
    }

    public function index()
    {
        $this->load->view("admin/test");
    }

    /*     * ***
     * CRUD PARA LOS POST
     */

    public function post_list()
    {
        $data["posts"] = $this->Post->findAll();
        $view["body"] = $this->load->view("admin/post/list", $data, true);
        $this->parser->parse("admin/template/body", $view);
    }

    public function post_save()
    {
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $this->form_validation->set_rules('title', 'title', 'required|min_length[10]|max_length[65]');
            $this->form_validation->set_rules('url_clean', 'url_clean', 'required|max_length[100]');
            $this->form_validation->set_rules('content', 'content', 'required|min_length[10]');
            $this->form_validation->set_rules('description', 'description', 'required|max_length[100]');
            $this->form_validation->set_rules('posted', 'posted', 'required|max_length[100]');
        }
        if ($this->form_validation->run()) {
            $save = [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'description' => $this->input->post('description'),
                'posted' => $this->input->post('posted'),
                'url_clean' => $this->input->post('url_clean'),
            ];
            $postId = $this->Post->insert($save);
            $this->upload($postId, $this->input->post('title'));
        }
        $data['data_posted'] = posted();
        $view["body"] = $this->load->view("admin/post/save", $data, true);
        $this->parser->parse("admin/template/body", $view);
    }
    private function upload($postId, $title)
    {
        $title = clean_name($title);
        $this->load->library('upload', [
            'upload_path' => './uploads/post',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => $title,
            'max_size' => 500000,
            'overwrite' => true
        ]);

        $image = "image";
        if ($this->upload->do_upload($image)) {
            $dataUploadImage = $this->upload->data();
            $save = [
                'image' => $title . $dataUploadImage['file_ext']
            ];
            $this->resize_image($dataUploadImage['full_path'], $title . $dataUploadImage['file_ext']);
            $this->Post->update($postId, $save);
        }
        $this->upload->display_errors();
    }

    private function resize_image($path, $title)
    {
        $this->load->library('image_lib', [
            'image_library' => 'gd2',
            'source_image' => $path,
            'maintain_ratio' => true,
            'width' => 100,
            'height' => 100,
            'new_image' => './uploads/post/' . $title,
        ]);
        $this->image_lib->resize();
    }
}
