<?php
/**
 * 首页控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
    }


    public function index() {
      $this->load->model('content_model');
      $this->data['about'] = $this->content_model->about();
      $this->showPage('about_index', $this->data);
    }

    public function auction() {
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
          case 'search':
              // $result = $this->banner_model->search();
              break;
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
