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
        $this->table = 'curio_pic_clazz';
        $this->fields = 'id, name_en, name_tc, parent_id, sort, clazz_id';
    }


    /**
     * 查询整个菜单数据
     * @return [type] [description]
     */
    public function search() {
        $query = $this->db->where('parent_id', '0')->order_by('sort desc, id asc')->get($this->table);
        $list = $query->result_array();
        foreach ($list as $k => &$v) {
            $id = $v['id'];
            // var_dump($this->searchSub($id));
            $subarr = $this->searchSub($id);
            if (count($subarr)>0) {
              # code...
                $v['sub_nav'] = $subarr;
            }
        }
        return $list;
    }

    /**
     * 查询父菜单数据
     * @return [type] [description]
     */
    public function searchParent() {
        $query = $this->db->where('parent_id', '0')->order_by('sort desc, id asc')->get($this->table);
        $list = $query->result_array();
        return $list;
    }

    /**
     * 查询子菜单数据
     * @return [type] [description]
     */
    public function searchSub($id) {
        $query = $this->db->where('parent_id', $id)->order_by('sort desc, id asc')->get($this->table);
        $list = $query->result_array();
        return $list;
    }




}
