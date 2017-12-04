<?php
/**
 * 首页控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Press_release extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
    }


    public function index() {
      $id = $this->get_request('id');
      $this->load->model('press_release_model');
      $this->data['submenu'] = $this->press_release_model->search();
      $this->data['searchNews'] = $this->press_release_model->searchNews($id);
      $this->showPage('press_release_index', $this->data);
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
