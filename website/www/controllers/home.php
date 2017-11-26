<?php
/**
 * 首页控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('index_model');
        $data['resource_url'] = $this->resource_url;
        $data['base_url'] = $this->config->item('base_url');
        $this->data = $data;
    }


    public function index() {
        $this->lang->load('index');
        $this->data['css'] = lang('index_css');
        $this->data['title'] = lang('index_title');
        $this->data['og_description'] = lang('index_og_description');
        $this->data['description'] = lang('index_description');
        $this->data['placeholder'] = lang('index_placeholder');
        $this->data['navi1'] = lang('index_navi1');
        $this->data['navi2'] = lang('index_navi2');
        $this->data['navi3'] = lang('index_navi3');
        $this->data['navi4'] = lang('index_navi4');
        $this->data['navi5'] = lang('index_navi5');
        $this->data['navi6'] = lang('index_navi6');
        $this->data['subnavi1'] = lang('index_subnavi1');
        $this->data['subnavi2'] = lang('index_subnavi2');
        $this->data['subnavi3'] = lang('index_subnavi3');
        $this->data['contact'] = lang('index_contact');
        $this->data['sitemap'] = lang('index_sitemap');
        $this->data['terms'] = lang('index_terms');
        $this->data['privacy'] = lang('index_privacy');
        $this->data['copyright'] = lang('index_copyright');
        $this->showPage('index', $this->data);
    }


    public function get() {
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
          case 'search':
              $result = $this->index_model->search();
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
