<?php
    // if(isset($_GET['msg'])){
    //     $this->load->view("common/alert",["alert" => "success", "msg" => $_GET['msg']]);
    //     echo "<br>";
    // }

    if ($this->session->flashdata('success')) {
        $this->load->view("common/alert",["alert" => "success", "msg" => $this->session->flashdata('success')]);
        echo "<br>";
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php
                        $ttlUri = count($this->uri->segment_array());
                        for ($i=2; $i <= $ttlUri ; $i++) {
                            $titleSlash = (($i+1) <= $ttlUri) ? " > " : "";
                            $titleColor = ($i!=2) ? " class='text-gray-600' " : "";
                            echo "<span $titleColor>".ucwords(str_replace("-"," ",$this->uri->segment($i))).$titleSlash."</span>";
                        }
                    ?>
                </h6>
            </div>
            <div class="card-body">
