<?php
/**
 * 系统菜单模型
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Index_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'app_banner';
        $this->fields = 'id, status, image, urlen, urltc';
    }


    /**
     * 查询菜单数据
     * @return [type] [description]
     */
    public function search() {
        $query = $this->db->order_by('id asc')->get($this->table);
        $list = $query->result_array();
        $status = ['hide', 'show'];
        foreach($list as &$item) {
          if(isset($item['status'])){
            $item['status'] = $status[$item['status']];
          }else{
            $item['status'] = '';
          }
        }
        return $list;
    }



}
