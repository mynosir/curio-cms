<?php
/**
 * Static静态页面管理
 *
 * @author huangjiang <qoohj@qq.com>
 *
 */
class Staticpage extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('static_model');
        $data['resource_url'] = $this->resource_url;
        $data['admin_info'] = $this->session->userdata('loginInfo');
        $data['base_url'] = $this->config->item('base_url');
        $data['current_menu'] = 'static';
        $data['sub_menu'] = array();
        $data['current_menu_text'] = '靜態頁面管理';
        $data['menu_list'] = $this->getMenuList();
        $this->data = $data;
    }


    public function index() {
        $this->load->view('include/_header', $this->data);
        $this->load->view('static_index', $this->data);
        $this->load->view('include/_footer', $this->data);
    }

    public function add($nid=0) {
        $this->data['nid'] = $nid;
        $this->data['info'] = $this->static_model->getDetail($nid);
        $this->load->view('include/_header', $this->data);
        $this->load->view('static_update', $this->data);
        $this->load->view('include/_footer', $this->data);
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'getStatic':
                $result = $this->static_model->getStatic();
                break;
            case 'getDetail':
                $id = $this->get_request('id');
                // $result = $this->banner_model->getDetail($id);
                break;
        }
        echo json_encode($result);
    }

    public function post() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'addAds':
                $data = $this->get_request('params');
                $result = $this->banner_model->addAds($data);
                break;
            case 'updateAds':
                $id = $this->get_request('id');
                $data = $this->get_request('params');
                $result = $this->banner_model->updateAds($id, $data);
                break;
            case 'delete':
                $id = $this->get_request('id');
                $result = $this->banner_model->deleteItem($id);
                break;
            case 'upload_photo':
                if(!empty($_FILES)) {
                    $fileParts = pathinfo($_FILES['uploadfile']['name']);
                    $tempFile = $_FILES['uploadfile']['tmp_name'];
                    $targetFolder = '/public/banner/index/';
                    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
                    if(!is_dir($targetPath)) mkdir($targetPath, 0777, true);
                    $now = time();
                    $fileName = $now . '_org.' . $fileParts['extension'];
                    $compressFileName = $now . '.' . $fileParts['extension'];
                    $targetFile = rtrim($targetPath, '/') . '/' . $fileName;
                    $compressTargetFile = rtrim($targetPath, '/') . '/' . $compressFileName;
                    $fileTypes = array('jpg', 'jpeg', 'gif', 'png');
                    if(in_array(strtolower($fileParts['extension']), $fileTypes)) {
                        move_uploaded_file($tempFile, $targetFile);
                        // 开始压缩图片
                        $this->compressImage($targetFile, $compressTargetFile, 1920);
                        $result = array('status'=> 0, 'name'=> 'http://' . $_SERVER['HTTP_HOST'] . $targetFolder . $compressFileName);
                    } else {
                        $result = array('status'=> -1, 'msg'=> '文件格式不正确');
                    }
                }
                break;
        }
        echo json_encode($result);
    }
}
