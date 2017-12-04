<?php
/**
 * 产品菜单模型
 *
 * @author qoohj <qoohj@qq.com>
 *
 */
class Catalogue_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'curio_pic_clazz';
        $this->table2 = 'curio_pic_content';
        // $fields = 'id, title_en, title_tc, clazz_id, pic, num, prize_en, prize_tc, size_en, size_tc, standard_en, standard_tc, descript_en, descript_tc, sort';
    }


    /**
     * 查询菜单数据
     * @return [type] [description]
     */
    public function search($cid) {
        if(!empty($cid)){
          $query = $this->db->where('clazz_id', $cid)->order_by('id asc, sort desc')->get($this->table2);
        }else{
          $query = $this->db->where('parent_id', 1)->order_by('sort desc, id asc')->limit(1)->get($this->table);
          $arr = $query->row();
          $query = $this->db->where('clazz_id', $arr->id)->get($this->table2);          
        }
        $list = $query->result_array();
        // foreach ($list as $k=>&$v) {
        //
        // }
        return $list;
    }


    /**
     * 查询父菜单数据
     * @return [type] [description]
     */
    public function searchParent($cid) {
        $query = $this->db->where('id', $cid)->get($this->table);
        $list = $query->row();
        // foreach ($list as $k=>&$v) {
        //
        // }
        return $list;
    }

    /**
     * 获取父菜单数据
     * @return [type] [description]
     */
    public function getParent($cid) {
        $query = $this->db->where('id', $cid)->get($this->table);
        $result['data'] = $query->row();
        $result['status'] = 0;
        $result['msg'] = '成功';
        // foreach ($list as $k=>&$v) {
        //
        // }
        return $result;
    }

    /**
     * 查询子菜单详情
     * @return [type] [description]
     */
    public function searchDetail($id) {
        $query = $this->db->where('id', $id)->get($this->table2);
        $list = $query->row();
        if(count($list->pic)>0){
          $list->pic = explode(',', $list->pic);
        }
        return $list;
    }


}
