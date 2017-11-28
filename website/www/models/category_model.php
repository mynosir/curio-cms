<?php
/**
 * 系统菜单模型
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Category_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'app_category';
        $this->fields = 'id, status, name_en, name_tc';
    }


    /**
     * 查询菜单数据
     * @return [type] [description]
     */
    public function search() {
      $query = $this->db->order_by('id desc')->where('status', '1')->get($this->table);
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
