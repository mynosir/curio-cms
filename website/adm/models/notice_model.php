<?php
/**
 * 站内通知模型
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Notice_model extends MY_Model {

    private $table = 'curio_notice';
    private $fields = 'id, content_en, content_tc, url_en, url_tc, sort';

    public function __construct() {
        parent::__construct();
        $this->loginInfo = $this->session->userdata('loginInfo');
    }



    /**
     * 新增/更新站内通知
     * @param [type] $nid    [description]
     * @param [type] $params [description]
     */
    public function add($nid, $params) {
        if($nid == 0) {
            $this->db->insert($this->table, $params);
            $result['status'] = 0;
            $result['msg'] = '保存成功！';
            return $result;
        } else {
            $this->db->where('id', $nid)->update($this->table, $params);
            $result['status'] = 0;
            $result['msg'] = '更新成功！';
            return $result;
        }
    }


    /**
     * 分页获取站内通知数据
     * @param  integer $page    [description]
     * @param  integer $size    [description]
     * @param  string  $keyword [description]
     * @return [type]           [description]
     */
    public function getList($page=1, $size=20, $keyword='') {
        $result = array();
        if($keyword!='') {
            $where = ' where title like "%' . $keyword . '%" ';
        } else {
            $where = ' where 1=1 ';
        }
        $limitStart = ($page - 1) * $size;
        $query = $this->db->query('select ' . $this->fields . ' from ' . $this->table . $where . ' order by id desc limit ' . $limitStart . ', ' . $size);
        $result = $query->result_array();
        $pageQuery = $this->db->query('select count(1) as num from ' . $this->table . $where);
        $pageResult = $pageQuery->result_array();
        $num = $pageResult[0]['num'];
        $rtn = array(
            'total' => $num,
            'size'  => $size,
            'page'  => $page,
            'list'  => $result
        );
        return $rtn;
    }


    /**
     * 删除站内通知
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id) {
        $this->db->where('id', $id)->delete($this->table);
        $result['status'] = 0;
        $result['msg'] = '删除成功';
        return $result;
    }

}
