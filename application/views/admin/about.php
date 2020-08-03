<script src="<?= base_url()?>components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-address-card-o"></i> About
        <small>Myself</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit About Myself</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editAbout" action="<?= base_url() . adminPath ?>/about" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="short_text">About short</label>
                                        <textarea class="form-control required" id="short_text" name="short_text" rows="5"><?= $about->short_text ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="fname">Specialization</label>
                                        <input type="text" class="form-control required" value="<?= $about->name?>" id="name" name="name" maxlength="128">
                                    </div>
                                </div>
                            </div>
                  
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="fname">About full</label>
                                        <textarea class="form-control required" id="full_text" name="full_text" rows="8"><?= $about->full_text ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <script>
        CKEDITOR.replace('short_text', {
          height: 120,
          width: 750,
        });
        CKEDITOR.replace('full_text', {
          height: 270,
          width: 750,
        });
  </script>
                        <!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" name="sbm" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>                    
                    </div>
                    <? } ?>
                <?  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <? } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>js/addUser.js" type="text/javascript"></script>