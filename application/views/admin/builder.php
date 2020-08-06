<script src="<?= base_url()?>components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-address-card-o"></i> <?= $pageTitle ?>
        <!--small>Myself</small-->
      </h1>
    </section>

    <section class="content">
    
           <? $this->load->view('admin/builderView'); ?>
        
    </section>
    
</div>