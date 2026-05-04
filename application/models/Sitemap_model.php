<?php
class Sitemap_model extends CI_Model
{

    public function get_all_post()
    {
        return $this->db
            ->select('slug, created_at')
            ->from('table_pages')
            ->where('status', 1)
            ->get()
            ->result();
    }

    public function get_active_links()
    {
        return $this->db
            ->select('slug, url, updated_at')
            ->where('status', 1)  // hanya yang aktif
            ->order_by('updated_at', 'DESC')
            ->get('table_pages')      // sesuaikan dengan nama tabel Anda
            ->result_array();
    }

    // Ambil halaman statis (jika ada)
    public function get_static_pages()
    {
        return $this->db
            ->select('slug, updated_at')
            ->where('status', 1)
            ->get('pages')
            ->result_array();
    }
}
