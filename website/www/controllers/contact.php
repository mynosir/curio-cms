<?php
/**
 * 联络我们控制器
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Contact extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->init_head_foot();
        $this->load->library('mailer');
        $this->mailer->MakeMailInfo('email', 'haha', 'test');
        $res = $this->mailer->send();
        var_dump($res);
    }


    public function index() {
      $this->load->model('content_model');
      $this->data['contact1'] = $this->content_model->contact();
      $this->showPage('contact_index', $this->data);
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
        $this->load->model('contact_model');
        $actionxm = $this->get_request('actionxm');
        $result = array();
        switch($actionxm) {
          case 'cataRequest':

        //   $this->email->from('your@example.com', 'Your Name');
        //   $this->email->to('someone@example.com');
        //   $this->email->cc('another@another-example.com');
        //   $this->email->bcc('them@their-example.com');
        //   $this->email->subject('Email Test');
        //   $this->email->message('Testing the email class.');
        //   $this->email->send();
            $params = $this->get_request('params');
            $result = $this->contact_model->cataRequest($params);
            break;
        }
        echo json_encode($result);
    }

}
