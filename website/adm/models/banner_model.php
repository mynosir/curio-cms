<?php
/**
 * banner图片模型
 *
 * @author linzequan <lowkey361@gmail.com>
 *
 */
class Banner_model extends MY_Model {

    private $ads_table = 'curio_banners';
    private $ads_fields = 'id, title_en, title_tc, pic, sort';

    public function __construct() {
        parent::__construct();
    }


    /**
     * 获取广告
     * @param  integer $page [description]
     * @param  integer $size [description]
     * @return [type]        [description]
     */
    public function getAds($page=1, $size=20) {
        $limitStart = ($page - 1) * $size;
        $where = ' where 1=1 ';
        $query = $this->db->query('select ' . $this->ads_fields . ' from ' . $this->ads_table . $where . ' order by sort desc limit ' . $limitStart . ', ' . $size);
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
     * 更新广告
     * @param  [type] $id   [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function updateAds($id, $data) {
        $this->db->where('id', $id)->update($this->ads_table, $data);
        $result['status'] = 0;
        $result['msg'] = '更新数据成功';
        return $result;
    }


    /**
     * 删除
     * @param  [type] $id   [description]
     * @return [type]       [description]
     */
    public function deleteItem($id) {
        $this->db->where('id', $id)->delete($this->ads_table);
        $result['status'] = 0;
        $result['msg'] = '删除成功';
        return $result;
    }


    /**
     * 新增广告
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function addAds($data) {
        $data['sort'] = (int)$data['sort'];
        $this->db->insert($this->ads_table, $data);
        $result['status'] = 0;
        $result['msg'] = '新增数据成功';
        return $result;
    }


    /**
     * 获取广告详情
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getDetail($id) {
        $query = $this->db->query('select ' . $this->ads_fields . ' from ' . $this->ads_table . ' where id="' . $id . '"');
        $result = $query->result_array();
        return $result[0];
    }
}
