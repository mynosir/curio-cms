<?php
/**
 * 首页控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
    }


    public function index() {
        if($_SERVER['REQUEST_URI'] == '/') {
          $this->load->helper('url');
          redirect($this->data['base_url'].'tc/', 'location');
        }
        $this->data['bannerlist'] = $this->banner_model->search();
        $this->showPage('index', $this->data);
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
          // case 'search':
          //     $result = $this->index_model->search();
          //     break;
        }
        echo json_encode($result);
    }


    public function post() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
        }
        echo json_encode($result);
    }

}
