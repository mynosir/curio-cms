<?php
/**
 * 首页控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Auction extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
    }


    public function index() {
      // var_dump($_SERVER);      
      $this->load->model('content_model');
      $this->data['newcontent'] = $this->content_model->latest();
      $this->showPage('auction_index', $this->data);
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
