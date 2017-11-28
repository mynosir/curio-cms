<?php
/**
 * 首页控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Sell extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
    }


    public function index() {
      $this->showPage('sell_index', $this->data);
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
