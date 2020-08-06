        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <!--
                    <div class="box-header">
                        <h3 class="box-title">Edit Info</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editForm" action="<?= base_url() . adminPath ?>/<?= $topPage ?>" method="post" role="form">
                        <div class="box-body">
                            <? 
                            foreach ($fields as $k=>$field)
                            {
                            ?>
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="short_text"><?= $field[0] ?></label>
                                        <? 
                                        switch ($field[2]) { // field type
                                            case "text": 
                                            {
                                            ?>
                                            <input type="text" class="form-control required" id="<?= $k ?>" name="<?= $k ?>" value="<?= $row->$k ?>" />
                                            <? 
                                            }
                                            break;
                                            case "textarea": 
                                            {
                                            ?>
                                            <textarea class="form-control required" id="<?= $k ?>" name="<?= $k ?>"><?= $row->$k ?></textarea>
                                            <? 
                                            }
                                            break;
                                        } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <? 
                            } 
                            ?>
                       
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
            <div class="col-md-3">
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
