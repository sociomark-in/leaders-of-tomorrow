<?php

class EntriesController extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();

        /**
         * LOAD MODELS:
         * -----------------------------
         * EntriesModel
         * 
         */
    }

    public function single_detail($nonce)
    {
        $this->data['nonce'] = $nonce;
        $this->load->admin_dashboard('entries/single', $this->data);
    }
}
