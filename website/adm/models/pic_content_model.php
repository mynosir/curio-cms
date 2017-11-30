<?php
/**
 * 图录内容模型
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Pic_content_model extends MY_Model {

    private $table = 'curio_pic_content';
    private $fields = 'id, title_en, title_tc, clazz_id, pic, prize_en, prize_tc, size_en, size_tc, standard_en, standard_tc, descript_en, descript_tc, sort';

    public function __construct() {
        parent::__construct();
        $this->loginInfo = $this->session->userdata('loginInfo');
    }


    /**
     * 获取图录
     * @param  integer $page     [description]
     * @param  integer $size     [description]
     * @param  integer $clazz_id [description]
     * @return [type]            [description]
     */
    public function getList($page=1, $size=20, $clazz_id=0) {
        $limitStart = ($page - 1) * $size;
        if($clazz_id > 0) {
            $where = ' where clazz_id = ' . $clazz_id;
        } else {
            $where = ' 1=1 ';
        }
        $query = $this->db->query('select ' . $this->fields . ' from ' . $this->table . $where . ' order by sort desc limit ' . $limitStart . ', ' . $size);
        $result = $query->result_array();

        $pageQuery = $this->db->query('select count(1) as num from ' . $this->ads_table);
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
     * 新增图录
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function addAds($data) {
        $data['sort'] = (int)$data['sort'];
        $this->db->insert($this->table, $data);
        $result['status'] = 0;
        $result['msg'] = '新增数据成功';
        return $result;
    }


    /**
     * 更新图录
     * @param  [type] $id   [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function update($id, $data) {
        $this->db->where('id', $id)->update($this->table, $data);
        $result['status'] = 0;
        $result['msg'] = '更新数据成功';
        return $result;
    }


    /**
     * 获取图录详情
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getDetail($id) {
        $query = $this->db->query('select ' . $this->fields . ' from ' . $this->table . ' where id="' . $id . '"');
        $result = $query->result_array();
        return $result[0];
    }
}
