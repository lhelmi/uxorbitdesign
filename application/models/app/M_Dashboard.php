<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_Dashboard extends CI_Model
{

    public $table_lms_courses = 'tb_lms_courses';
    public $table_user = 'tb_user';

    public $table_site_visitor = 'tb_site_visitor';
    public $table_lms_user_payment = 'tb_lms_user_payment';

    public function get_notif()
    {
        $this->db->where('is_read', '0');
        $this->db->where('status_penarikan', '1');
        $this->db->from('tb_tarik');
        $this->db->group_by('permintaan_id');
        return $this->db->count_all_results();
    }

    public function get_top_rating()
    {
        $this->db->select('tb_lms_user_review.*, count(rating) as jumlah, tb_lms_courses.title as judul, tb_user.username, tb_lms_category.name as kategori');
        $this->db->join('tb_lms_courses', 'tb_lms_user_review.id_courses = tb_lms_courses.id');
        $this->db->join('tb_lms_category', 'tb_lms_courses.id_sub_category = tb_lms_category.id');
        $this->db->join('tb_user', 'tb_lms_courses.id_user = tb_user.id');
        $this->db->where('tb_lms_user_review.rating', '5');
        $this->db->group_by('tb_lms_user_review.id_courses');
        $this->db->order_by('jumlah', 'desc');
        $this->db->limit(3);
        return $this->db->get('tb_lms_user_review')->result_array();
    }

    public function get_top_buy()
    {
        $this->db->select('tb_lms_courses.*, count(tb_lms_user_payment.id_courses) as jumlah, tb_user.username,  tb_lms_category.name as kategori');
        $this->db->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id');
        $this->db->join('tb_lms_category', 'tb_lms_courses.id_sub_category = tb_lms_category.id');
        $this->db->join('tb_user', 'tb_lms_courses.id_user = tb_user.id');
        $this->db->group_by('tb_lms_user_payment.id_courses');
        $this->db->order_by('jumlah', 'desc');
        $this->db->limit(3);
        return $this->db->get('tb_lms_user_payment')->result_array();
    }

    public function get_invoice_notif()
    {
        $names = array('Purchased', 'Pending', 'Failed');
        $this->db->where('is_read', '0');
        $this->db->where('status_penarikan <>', '1');
        $this->db->from('tb_tarik');
        return $this->db->count_all_results();
    }

    public function kelas_verified()
    {
        $this->db->where('is_new', 'Belum Verifikasi');
        $this->db->from('tb_lms_courses');
        return $this->db->count_all_results();
    }

    public function update_notif($id)
    {
        $this->db->set('is_read','1');
        $this->db->where('permintaan_id', $id);
        $this->db->update('tb_tarik');
    }

    public function get_statistic()
    {

        /**
         * count courses
         */
        $count_courses = $this->db->from($this->table_lms_courses)->count_all_results();


        /**
         * count user
         */
        $count_user = $this->db->from($this->table_user)->where("grade = 'User'")->count_all_results();

        /**
         * count user
         */
        $count_mentor = $this->db->from($this->table_user)->where("grade = 'Instructor'")->count_all_results();

        /**
         * total amount 
         */
        // $this->db->select("sum(amount) as data");
        // $this->db->from($this->table_lms_user_payment);
        // if ($this->session->userdata('app_grade') == 'Instructor') {
        //     $this->db->where('id_courses_user', $this->session->userdata('id'));
        // }
        // $total_amount = $this->db->where('status', 'Purchased')->get()->row_array();
        // $total_amount = set_currency($total_amount['data']);
        $xxo = $this->db->select("sum(amount) as data")->from('tb_lms_user_payment')->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id')->join('tb_user', 'tb_lms_courses.id_user = tb_user.id')->where('tb_user.grade', 'app')->where('tb_lms_user_payment.status', 'Purchased')->get()->row_array();
        $xx1 = $this->db->select("0.6 * sum(amount) as data")->from('tb_lms_user_payment')->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id')->join('tb_user', 'tb_lms_courses.id_user = tb_user.id')->where('tb_user.grade <>', 'app')->where('tb_lms_user_payment.status', 'Purchased')->get()->row_array();
        $total_amount = set_currency($xxo['data'] + $xx1['data']);


        /**
         * count total visitor
         */
        $total_visitor = $this->db
            ->select("id")
            ->from($this->table_site_visitor)
            ->group_by('ip')
            ->group_by('DATE(date)')
            ->count_all_results();

        /**
         * hits today
         */
        $hits_today = $this->db
            ->select("SUM(hits) as hits")
            ->from($this->table_site_visitor)
            ->where('DATE(date) = DATE(CURDATE())')
            ->get()->row()->hits;

        /**
         * Statistic Visitor Chart.js
         * 7 Last Day
         */
        $visitor = $this->db
            ->select('DATE_FORMAT(date,"%d") AS tanggal, DATE_FORMAT(date,"%b") AS bulan, COUNT(DISTINCT ip) AS jumlah')
            ->from($this->table_site_visitor)
            ->where('DATE(date) > DATE(NOW() - INTERVAL 7 DAY)')
            ->group_by('DATE(date)')
            ->get();

        if ($visitor->num_rows() > 0) {
            foreach ($visitor->result_array() as $result) {
                $label_visitor[] = $result['tanggal'] . ' ' . $result['bulan'];
                $data_visitor[] = (float) $result['jumlah'];
            }

            $last_array = end($data_visitor);

            if ($prev_before_last = prev($data_visitor)) {
                $get_two_data = $last_array - $prev_before_last;
                $from_end_to_prev_pecent = @number_format(($get_two_data * 100) / $prev_before_last, 2);
                $from_end_to_prev_pecent_status = ($from_end_to_prev_pecent > 0) ? 'up' : 'down';
            } else {
                $from_end_to_prev_pecent = 100;
                $from_end_to_prev_pecent_status = 'up';
            }
        } else {
            $from_end_to_prev_pecent = 0;
            $from_end_to_prev_pecent_status = 'up';
        }

        /**
         * pageview today
         */
        $page_view_today = $this->db
            ->select("id")
            ->from($this->table_site_visitor)
            ->where('DATE(date) = DATE(CURDATE())')
            ->count_all_results();

        /**
         * pageview yesterday
         */
        $page_view_yesterday = $this->db
            ->select("id")
            ->from($this->table_site_visitor)
            ->where('DATE(date) = DATE(CURRENT_DATE - INTERVAL 1 DAY)')
            ->count_all_results();


        /**
         * pageview last month
         */
        $page_view_last_month = $this->db
            ->select("id")
            ->from($this->table_site_visitor)
            ->where('YEAR(date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)')
            ->where('MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')
            ->count_all_results();

        /**
         * pageview all time
         */
        $page_view_all_time = $this->db
            ->select("id")
            ->from($this->table_site_visitor)
            ->count_all_results();

        $page_view_by_browser = $this->db
            ->select("
            browser,            
            COUNT(browser) AS jumlah
            ")
            ->from($this->table_site_visitor)
            ->group_by('browser')
            ->get();

        $page_view_by_browser_data = false;
        if ($page_view_by_browser->num_rows() > 0) {
            $page_view_by_browser_count = 0;
            foreach ($page_view_by_browser->result_array() as $data) {
                $page_view_by_browser_count = $page_view_by_browser_count + $data['jumlah'];
            }

            foreach ($page_view_by_browser->result_array() as $data) {
                $page_view_by_browser_data[] = [
                    'browser' => $data['browser'],
                    'jumlah' => $data['jumlah'],
                    'percentage' => number_format(($data['jumlah'] * 100) / $page_view_by_browser_count, 2) . "%",
                ];
            }
        }

        /**
         * pageview by os
         */
        $page_view_by_os = $this->db
            ->select("
            os,            
            COUNT(os) AS jumlah           
            ")
            ->from($this->table_site_visitor)
            ->group_by('os')
            ->get();

        $page_view_by_os_data = false;
        if ($page_view_by_os->num_rows() > 0) {
            $page_view_by_os_count = 0;
            foreach ($page_view_by_os->result_array() as $data) {
                $page_view_by_os_count = $page_view_by_os_count + $data['jumlah'];
            }

            foreach ($page_view_by_os->result_array() as $data) {
                $page_view_by_os_data[] = [
                    'os' => $data['os'],
                    'jumlah' => $data['jumlah'],
                    'percentage' => number_format(($data['jumlah'] * 100) / $page_view_by_os_count, 2) . "%",
                ];
            }
        }

        return array(
            'count_courses' => $count_courses,
            'count_user' => $count_user,
            'count_mentor' => $count_mentor,
            'total_amount' => $total_amount,
            'total_visitor' => $total_visitor,
            'hits_today' => $hits_today,
            'statistic_chart_js' => true,
            'statistic_chart_js_label' => !empty($label_visitor) ? json_encode($label_visitor) : '0',
            'statistic_chart_js_data' => !empty($data_visitor) ? json_encode($data_visitor) : '0',
            'statistic_month' => date('d F Y'),
            'statistic_percent' => !empty($from_end_to_prev_pecent) ? $from_end_to_prev_pecent : '0',
            'statistic_percent_status' => $from_end_to_prev_pecent_status,
            'page_view_today' => $page_view_today,
            'page_view_yesterday' => $page_view_yesterday,
            'page_view_last_month' => $page_view_last_month,
            'page_view_all_time' => $page_view_all_time,
            'page_view_by_browser_data' => $page_view_by_browser_data,
            'page_view_by_os_data' => $page_view_by_os_data,
        );
    }
}
