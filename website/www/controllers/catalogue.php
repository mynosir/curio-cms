<?php
/**
 * 首页控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Catalogue extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
    }


    public function index() {
      $cid = $this->get_request('cid');
      $this->load->model('catalogue_model');
      $this->data['catalogue'] = $this->catalogue_model->search($cid);
      $this->load->model('notice_model');
      $this->data['notice'] = $this->notice_model->search();
      $this->data['catalogueParent'] = $this->catalogue_model->searchParent($cid);
      $this->showPage('catalogue_index', $this->data);
    }

    public function detail() {
      $id = $this->get_request('id');
      $this->load->model('catalogue_model');
      $this->data['catalogueDetail'] = $this->catalogue_model->searchDetail($id);
      $this->showPage('catalogue_detail_index', $this->data);
    }


    public function get() {
        $this->load->model('catalogue_model');
        $actionxm = $this->get_request('actionxm');
        $id = $this->get_request('id');
        $result = array();
        switch($actionxm) {
          case 'getaid':
              $result = $this->catalogue_model->getParent($id);
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
