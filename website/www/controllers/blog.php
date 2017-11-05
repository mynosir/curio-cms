<?php
/**
 * 多语言测试demo控制器
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Blog extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }


    public function index() {
        // 按当前语言载入语言文件
        $this->lang->load('blog');
        // 定义网页中的文字
        $this->data['title'] = lang('blog_title');
        $this->data['heading'] = lang('blog_heading');
        $this->data['copyright'] = lang('blog_copyright');
        // 不同的语言使用同一主体模板示例
        $this->load->view('blog_body', $this->data);
        // 不同的语言使用不同的页脚示例
        $this->load->view('blog_footer', $this->config->item('post_lang'), $this->data);
    }
}
