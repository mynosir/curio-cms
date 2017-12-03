<?php
/**
 * 系统菜单模型
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Content_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'curio_content';
        $this->fields = 'id, title_en, title_tc, clazz_id, pic, content_en, content_tc, author, create_time';
    }


    /**
     * 查询菜单数据
     * @return [type] [description]
     */
    public function search() {
        $query = $this->db->order_by('id asc')->get($this->table);
        $list = $query->result_array();
        return $list;
    }

    /**
     * 查询最新動態
     * @return [type] [description]
     */
    public function latest() {
        $query = $this->db->where('clazz_id', 4)->get($this->table);
        $row = $query->row();
        return $row;
    }



}
