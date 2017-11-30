<?php
/**
 * 内容资讯控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Content extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $data['resource_url'] = $this->resource_url;
        $data['admin_info'] = $this->session->userdata('loginInfo');
        $data['base_url'] = $this->config->item('base_url');
        $data['current_menu'] = 'content';
        $data['current_menu_text'] = '内容管理';
        $data['sub_menu'] = array();
        $this->data = $data;
        $this->load->model('content_model');
    }


    public function index() {
        $this->load->view('include/_header', $this->data);
        $this->load->view('content_index', $this->data);
        $this->load->view('include/_footer', $this->data);
    }


    public function add($nid=0) {
        $this->data['nid'] = $nid;
        if($nid > 0) {
            // 更新
            $this->data['info'] = $this->news_model->getDetail($nid);
            $this->load->view('include/_header', $this->data);
            $this->load->view('news_update', $this->data);
            $this->load->view('include/_footer', $this->data);
        } else {
            // 新增
            $this->load->view('include/_header', $this->data);
            $this->load->view('news_add', $this->data);
            $this->load->view('include/_footer', $this->data);
        }
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'getList':
                $page = $this->get_request('page');
                $size = $this->get_request('size');
                $keyword = $this->get_request('keyword');
                $result = $this->news_model->getList($page, $size, $keyword);
                break;
        }
        echo json_encode($result);
    }

    public function post() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'upload_photo':
                if(!empty($_FILES)) {
                    $fileParts = pathinfo($_FILES['uploadfile']['name']);
                    $tempFile = $_FILES['uploadfile']['tmp_name'];
                    $targetFolder = '/public/news/img/';
                    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
                    $now = time();
                    $fileName = $now . '_org.' . $fileParts['extension'];
                    $compressFileName = $now . '.' . $fileParts['extension'];
                    $targetFile = rtrim($targetPath, '/') . '/' . $fileName;
                    $compressTargetFile = rtrim($targetPath, '/') . '/' . $compressFileName;
                    $fileTypes = array('jpg', 'jpeg', 'gif', 'png');
                    if(in_array(strtolower($fileParts['extension']), $fileTypes)) {
                        move_uploaded_file($tempFile, $targetFile);
                        // 开始压缩图片
                        $this->compressImage($targetFile, $compressTargetFile);
                        $result = array('status'=> 0, 'name'=> 'http://' . $_SERVER['HTTP_HOST'] . $targetFolder . $compressFileName);
                    } else {
                        $result = array('status'=> -1, 'msg'=> '文件格式不正确');
                    }
                }
                break;
            case 'upload_contentImg':
                if(!empty($_FILES)) {
                    $fileParts = pathinfo($_FILES['file']['name']);
                    $tempFile = $_FILES['file']['tmp_name'];
                    $targetFolder = '/public/news/img_contents/';
                    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
                    $now = time();
                    $fileName = $now . '_org.' . $fileParts['extension'];
                    $compressFileName = $now . '.' . $fileParts['extension'];
                    $targetFile = rtrim($targetPath, '/') . '/' . $fileName;
                    $compressTargetFile = rtrim($targetPath, '/') . '/' . $compressFileName;
                    $fileTypes = array('jpg', 'jpeg', 'gif', 'png');
                    if(in_array(strtolower($fileParts['extension']), $fileTypes)) {
                        move_uploaded_file($tempFile, $targetFile);
                        // 开始压缩图片
                        $this->compressImage($targetFile, $compressTargetFile);
                        $result = array('status'=> 0, 'name'=> 'http://' . $_SERVER['HTTP_HOST'] . $targetFolder . $compressFileName);
                    } else {
                        $result = array('status'=> -1, 'msg'=> '文件格式不正确');
                    }
                }
                break;
            case 'add':
                $params = $this->get_request('params');
                $nid = $this->get_request('nid');
                $result = $this->news_model->add($nid, $params);
                break;
            case 'delete':
                $id = $this->get_request('id');
                $result = $this->news_model->delete($id);
                break;
        }
        echo json_encode($result);
    }
}
