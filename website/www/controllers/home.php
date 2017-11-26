<?php
/**
 * 首页控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('index_model');
        $data['resource_url'] = $this->resource_url;
        $data['base_url'] = $this->config->item('base_url');
        $this->data = $data;
        $this->lang->load('headfoot');
        $this->data['css'] = lang('hf_css');
        $this->data['title'] = lang('hf_title');
        $this->data['og_description'] = lang('hf_og_description');
        $this->data['description'] = lang('hf_description');
        $this->data['placeholder'] = lang('hf_placeholder');
        $this->data['navi1'] = lang('hf_navi1');
        $this->data['navi2'] = lang('hf_navi2');
        $this->data['navi3'] = lang('hf_navi3');
        $this->data['navi4'] = lang('hf_navi4');
        $this->data['navi5'] = lang('hf_navi5');
        $this->data['navi6'] = lang('hf_navi6');
        $this->data['subnavi1'] = lang('hf_subnavi1');
        $this->data['subnavi2'] = lang('hf_subnavi2');
        $this->data['subnavi3'] = lang('hf_subnavi3');
        $this->data['contact'] = lang('hf_contact');
        $this->data['sitemap'] = lang('hf_sitemap');
        $this->data['terms'] = lang('hf_terms');
        $this->data['privacy'] = lang('hf_privacy');
        $this->data['copyright'] = lang('hf_copyright');
        $this->data['curNav'] = $this->uri->segment(2);
        $this->data['curLang'] = $this->uri->segment(1);
    }


    public function index() {
        if($_SERVER['REQUEST_URI'] == '/') {
          $this->load->helper('url');
          redirect($this->data['base_url'].'tc/', 'location');
        }
        $this->data['bannerlist'] = $this->index_model->search();
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
