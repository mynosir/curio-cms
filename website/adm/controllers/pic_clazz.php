<?php
/**
 * 图录分类控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Pic_clazz extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('pic_clazz_model');
        $data['resource_url'] = $this->resource_url;
        $data['admin_info'] = $this->session->userdata('loginInfo');
        $data['base_url'] = $this->config->item('base_url');
        $data['current_menu'] = 'pic_clazz';
        $data['current_menu_text'] = '图录分类';
        $data['sub_menu'] = array();
        $data['menu_list'] = $this->getMenuList();
        $this->data = $data;
    }


    public function index() {
        $this->showPage('pic_clazz_index', $this->data);
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
            case 'search':
                $result = $this->pic_clazz_model->search();
                break;
            case 'detail':
                $id = $this->get_request('id');
                $result = $this->pic_clazz_model->getClazzById($id);
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
                $result = $this->pic_clazz_model->add($params);
                break;
            case 'update':
                $id = $this->get_request('id');
                $params = $this->get_request('params');
                $result = $this->pic_clazz_model->update($params, array('id'=> $id));
                break;
            case 'delete':
                $id = $this->get_request('id');
                $result = $this->pic_clazz_model->delete($id);
                break;
        }
        echo json_encode($result);
    }
}
