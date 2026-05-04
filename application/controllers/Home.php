<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function index($slug = null)
    {
        if (empty($slug)) {
            $slug = "HOME";
        }
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $domain = $this->Domain_model->getDomain($host);

        if (!$domain) {
            show_404('Domain tidak terdaftar atau nonaktif');
        }

        // ✅ MAPPING EXPLICIT: Ambil dari table_domain & kirim ke view
        $data = [
            'domain'      => $domain,

            // Meta Tags (fallback pakai title/domain_name jika meta kosong)
            'title'       => !empty($domain->meta_title) ? $domain->meta_title : $domain->title,
            'description' => $domain->meta_description ?? '',
            'keywords'    => $domain->meta_keywords ?? '',
            'author'      => $domain->meta_author ?? '',
            'image'       => !empty($domain->image_domain) ? base_url($domain->image_domain) : base_url('assets/monoline/assets/images/og-default.jpg'),
            'url'         => base_url(),
            'type'        => 'website',

            // Data tambahan untuk header/footer
            'contact'     => [
                'email'   => $domain->email,
                'phone'   => $domain->telepon,
                'address' => $domain->alamat,
                'wa'      => $domain->wa_link
            ],
            'socials'     => [
                'fb' => $domain->link_facebook,
                'tw' => $domain->link_twitter,
                'ig' => $domain->link_instagram,
                'yt' => $domain->link_youtube
            ]
        ];
        // Di controller sebelum kirim ke view
        $data['iframe_content'] = html_escape($domain->iframe);
        $data['domain'] = $this->domain;
        $page = $this->Page_model->getPage($slug, $this->domain->id);
        $sections = $this->Page_model->getSections($page->id_page);
        $data['page'] = $page;
        $data['sections'] = $sections;
        $data['menus'] = $this->Menu_model->getMenuTree($this->domain->id);
        // Load template dengan theme dinamis
        $this->template->load($domain->theme ?? 'monoline', 'page', $data);
    }
    public function page($slug)
    {
        $host = $_SERVER['HTTP_HOST'];
        $this->domain_data = $this->Domain_model->getDomain($host);
        if (!$this->domain_data) {
            show_404();
        }

        $page = $this->Page_model->getPage($slug, $this->domain->id);

        if (!$page) {
            show_404();
        }

        $data['page'] = $page;
        $sections = $this->Page_model->getSections($page->id_page);
        $data['sections'] = $sections;
        $data['domain'] = $this->domain;
        $data['menus'] = $this->Menu_model->getMenuTree($this->domain->id);
        // Di controller sebelum kirim ke view
        $data['iframe_content'] = html_escape($this->domain->iframe);
        $this->template->load($this->domain->theme, 'page', $data);
    }



    public function ajax_list()
    {
        $page     = $this->input->get('page');
        $search   = $this->input->get('search');
        $limit = 6;
        $this->db->from('table_pages');
        $this->db->where('category', '2');

        if (!empty($search)) {
            $this->db->like('title', $search);
        }

        $total = $this->db->count_all_results('', false);

        $query = $this->db->get();
        $data['news'] = $query->result();
        // Render HTML
        $html = $this->load->view('news/_list', $data, TRUE);

        // Pagination manual
        $totalPages = ceil($total / $limit);
        $pagination = "";

        for ($i = 1; $i <= $totalPages; $i++) {
            $active = ($i == $page) ? "active" : "";
            $pagination .= "<a href='#' class='$active' data-page='$i'>$i</a>";
        }

        echo json_encode([
            "html" => $html,
            "pagination" => $pagination
        ]);
    }
}
