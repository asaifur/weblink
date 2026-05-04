<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    function index($slug = null)
    {

        if (!$slug) {
            $slug = 'home';
            $theme = $this->domain->theme;
            $page = $this->Page_model->getPage($slug, $this->domain->id);
            $sections = $this->Page_model->getSections($page->id_page);
            $data['page'] = $page;
            $data['domain'] = $this->domain;
            $data['sections']  = $sections;
            $data['menu_header_utama_website'] = $this->Page_model->getMenuHeader($this->domain->id);
            $this->template->load($theme, 'page', $data);
        } else {

            $slug = $this->uri->segment(1);
            if ($slug == "admin") {
                redirect('dashboard');
            } else {
                $theme = $this->domain->theme;
                $page = $this->Page_model->getPage($slug, $this->domain->id);
                $sections = $this->Page_model->getSections($page->id_page);
                $data['page'] = $page;
                $data['domain'] = $this->domain;
                $data['sections']  = $sections;
                $data['menu_header_utama_website'] = $this->Page_model->getMenuHeader($this->domain->id);
                $this->template->load($theme, 'page', $data);
            }
        }
    }
    public function home()
    {
        $theme = $this->domain->theme;
        $page = $this->Page_model->getPage($slug, $this->domain->id);
        $sections = $this->Page_model->getSections($page->id_page);
        $data['page'] = $page;
        $data['domain'] = $this->domain;
        $data['sections']  = $sections;
        $data['menu_header_utama_website'] = $this->Page_model->getMenuHeader($this->domain->id);
        $this->template->load($theme, 'page', $data);
    }
}
