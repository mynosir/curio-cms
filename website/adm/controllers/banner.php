<?php
/**
 * 系统菜单控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Banner extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->load->helper(array('form', 'url'));
        $this->load->model('banner_model');
        $data['resource_url'] = $this->resource_url;
        $data['admin_info'] = $this->session->userdata('loginInfo');
        $data['base_url'] = $this->config->item('base_url');
        $data['current_menu'] = 'banner';
        $data['current_menu_text'] = 'banner菜单';
        $data['sub_menu'] = array();
        $data['menu_list'] = $this->getMenuList();
        $this->data = $data;
    }


    public function index() {
        $this->showPage('banner_index', $this->data);
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'search':
                $result = $this->banner_model->search();
                break;
            case 'detail':
                $id = $this->get_request('id');
                $result = $this->banner_model->getMenuById($id);
                break;
        }
        echo json_encode($result);
    }


    public function post() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'add':
                $params = $this->get_request('params');
                $result = $this->banner_model->add($params);
                break;
            case 'update':
                $id = $this->get_request('id');
                $params = $this->get_request('params');
                $result = $this->banner_model->update($params, array('id'=> $id));
                break;
            case 'delete':
                $id = $this->get_request('id');
                $result = $this->banner_model->delete($id);
                break;
        }
        echo json_encode($result);
    }

    public function uploadify() {
      $targetFolder = 'uploads'; // Relative to the root

      $verifyToken = md5('unique_salt' . $_POST['timestamp']);

      if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
      	$tempFile = $_FILES['Filedata']['tmp_name'];
      	$targetPath = rtrim($_SERVER['SCRIPT_FILENAME'],'index.php') . $targetFolder;
      	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
      	// Validate the file type
      	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
      	$fileParts = pathinfo($_FILES['Filedata']['name']);

      	if (in_array($fileParts['extension'],$fileTypes)) {
      		move_uploaded_file($tempFile,$targetFile);
      		echo '1';
      	} else {
      		echo 'Invalid file type.';
      	}
      }
    }
}
