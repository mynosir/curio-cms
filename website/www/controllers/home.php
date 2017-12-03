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
        $this->load->model('banner_model');
        $this->load->model('content_model');
        $this->load->model('pic_content_model');
        $this->load->model('pic_clazz_model');
        $this->data['bannerlist'] = $this->banner_model->search();
        $this->data['newcontent'] = $this->content_model->latest();
        $this->data['pic_clazz'] = $this->pic_clazz_model->search();
        foreach ($this->data['pic_clazz'] as $k => &$v) {
          $id = $v['id'];
          $v['pic_content'] = $this->pic_content_model->search($id);
        }
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
