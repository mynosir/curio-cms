<?php
/**
 * 图录内容模型
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Pic_content_model extends MY_Model {

    private $table = 'curio_pic_content';
    private $fields = 'id, title_en, title_tc, clazz_id, pic, num, prize_en, prize_tc, size_en, size_tc, standard_en, standard_tc, descript_en, descript_tc, sort';

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
            $where = ' where 1=1 ';
        }
        $query = $this->db->query('select ' . $this->fields . ' from ' . $this->table . $where . ' order by sort desc, id desc limit ' . $limitStart . ', ' . $size);
        $result = $query->result_array();

        $this->load->model('pic_clazz_model');
        $CI = &get_instance();
        foreach($result as &$item) {
            if($item['clazz_id'] && $clazz_info = $CI->pic_clazz_model->getClazzById($item['clazz_id'])) {
                $item['clazz_name_en'] = $clazz_info['data']['name_en'];
                $item['clazz_name_tc'] = $clazz_info['data']['name_tc'];
            } else {
                $item['clazz_name_en'] = '';
                $item['clazz_name_tc'] = '';
            }
        }

        $pageQuery = $this->db->query('select count(1) as num from ' . $this->table);
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
     * 新增/更新图录
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function add($nid, $data) {
        if($nid == 0) {
            $data['sort'] = (int)$data['sort'];
            $this->db->insert($this->table, $data);
            $result['status'] = 0;
            $result['msg'] = '新增数据成功';
            return $result;
        } else {
            $this->db->where('id', $nid)->update($this->table, $data);
            $result['status'] = 0;
            $result['msg'] = '更新数据成功';
            return $result;
        }
    }


    /**
     * 删除图录
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id) {
        $this->db->where('id', $id)->delete($this->table);
        $result['status'] = 0;
        $result['msg'] = '删除成功';
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
