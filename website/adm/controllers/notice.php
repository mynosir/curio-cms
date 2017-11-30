<?php
/**
 * 站内通知控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Notice extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkLogin();
        $data['resource_url'] = $this->resource_url;
        $data['admin_info'] = $this->session->userdata('loginInfo');
        $data['base_url'] = $this->config->item('base_url');
        $data['current_menu'] = 'notice';
        $data['current_menu_text'] = '站内通知';
        $data['sub_menu'] = array();
        $this->data = $data;
        $this->load->model('notice_model');
    }


    public function index() {
        $this->load->view('include/_header', $this->data);
        $this->load->view('notice_index', $this->data);
        $this->load->view('include/_footer', $this->data);
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
