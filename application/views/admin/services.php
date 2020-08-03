<script src="<?= base_url()?>components/ckeditor/ckeditor.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-address-card-o"></i> Services
        <small>What i do</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Services info</h3>
                    </div>
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editServices" action="<?= base_url() . adminPath ?>/services" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="fname">Services short</label>
                                        <textarea class="form-control required" id="short_text" name="short_text" rows="5"><?= $service->short_text ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" name="sbm" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                     <script>
                        CKEDITOR.replace('short_text', {
                          height: 60,
                          width: 750,
                        });

                     </script>
                </div>
                
                <div class="box box-primary" id="serviceTbl" style="display:<?= $act == 'edit' ? "none" : "block"?>">
                    <div class="box-header">
                        <h3 class="box-title">Services Icon</h3>
                    </div>
                    
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="form-group">
                                    <a class="btn btn-primary addService" href="<?= base_url().adminPath; ?>/services"><i class="fa fa-plus"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-body table-responsive no-padding">
                                  <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Created On</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    <?
                                    if(!empty($serviceIcons))
                                    {
                                        foreach($serviceIcons as $record)
                                        {
                                    ?>
                                    <tr>
                                        <td><?= $record->name ?></td>
                                        <td><?= $record->short_text ?></td>
                                        <td><?= date("d-m-Y", strtotime($record->createDT)) ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="<?= base_url().adminPath.'/services/edit/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger deleteRow" href="#" data-rowId="<?= $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?
                                        }
                                    }
                                    ?>
                                  </table>

                                </div><!-- /.box-body -->
                               
                              </div><!-- /.box -->
                            </div>
                        </div>
                    </section>
                </div>
                
                <div class="box box-primary" id="serviceEdit" style="display:<?= $act == 'edit' ? "block" : "none"?>;">
                    <div class="box-header">
                        <h3 class="box-title">Edit Service</h3>
                    </div>
                    
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="EditServices" action="<?= base_url() . adminPath ?>/services" method="post" role="form">
                    <input type="hidden" name="rowId" value="<?=$editRow->id?>" />   
                    <section class="content">
                        <div class="row">
                            <div class="col-md-10">                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control required" id="name" name="name" value="<?=$editRow->name?>" />
                                </div>
                            </div>
                            <div class="col-md-10">                                
                                <div class="form-group">
                                    <label for="short_text">Icon</label>
                                    <input type="text" class="form-control required" id="short_text" name="short_text" value="<?=$editRow->short_text?>"/>
                                </div>
                            </div>
                            <div class="col-md-10">                                
                                <div class="form-group">
                                    <label for="full_text">Text</label>
                                    <input type="text" class="form-control required" id="full_text" name="full_text" value="<?=$editRow->full_text?>"/>
                                </div>
                            </div>
                        </div>
                            <div class="box-footer">
                                <input type="submit" name="editService" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default back" value="Cancel" />
                            </div>
                    </section>
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
<script type="text/javascript">
$(document).ready(function(){ 
    
    $(".addService").click(function(){
        
        $("#serviceTbl").hide();
        $("#serviceEdit").show();
        
        return false;
    });
    
    $(".back").click(function(){
        
        //$('#AddServices')[0].reset();
        $("#serviceTbl").show();
        $("#serviceEdit").hide();
        
        return false;
    });
    
	
	$(document).on("click", ".deleteRow", function(){
		var rowId = $(this).data("rowid"),
			hitURL = baseURL + "adminator/services/deleteRow",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this row ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { rowId : rowId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Row successfully deleted"); }
				else if(data.status = false) { alert("Row deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});


    
    
});
</script>