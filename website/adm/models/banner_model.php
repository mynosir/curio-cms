<?php
/**
 * 系统菜单模型
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Banner_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'app_banner';
        $this->fields = 'id, status, image, urlen, urltc';
        $this->loginInfo = $this->session->userdata('loginInfo');
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
        return array(
            'status'    => 0,
            'msg'       => '操作成功！',
            'data'      => array_values($list)
        );
    }

    /**
     * 添加菜单
     * @param [type] $params [description]
     */
    public function add($params) {
        $msg = '';
        if($params['status']=='') $msg = '狀態不可為空！';
        if(!isset($params['image'])) $msg = '圖片不可为空！';
        if($msg != '') {
            return array(
                'status'    => -1,
                'msg'       => $msg
            );
        }
        $data = array(
            'status'          => $params['status'],
            'image'           => $params['image'],
            'urlen'     => $params['urlen'],
            'urltc'          => $params['urltc']
        );
        $this->db->insert($this->table, $data);
        return array(
            'status'    => 0,
            'msg'       => '操作成功！'
        );

    }


    /**
     * 更新菜单信息
     * @param  [type] $params [description]
     * @param  [type] $where  [description]
     * @return [type]         [description]
     */
    public function update($params, $where) {
        $data = array(
            'status'          => $params['status'],
            'image'           => $params['image'],
            'urlen'     => $params['urlen'],
            'urltc'          => $params['urltc']
        );
        $this->db->where($where)->update($this->table, $data);
        return array(
            'status'    => 0,
            'msg'       => '操作成功！'
        );
    }


    /**
     * 删除菜单
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id) {

        $this->db->delete($this->table, array('id'=> $id));
        return array(
            'status'    => 0,
            'msg'       => '操作成功！'
        );
    }


    /**
     * 根据菜单ID查询菜单信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getMenuById($id) {

        $query = $this->db->query('select ' . $this->fields . ' from ' . $this->table . ' where `id`=' . $id);
        $result = $query->result_array();
        return array(
            'status'    => 0,
            'msg'       => '操作成功！',
            'data'      => $result[0]
        );

    }


}
