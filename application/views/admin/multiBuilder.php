<script src="<?= base_url()?>components/ckeditor/ckeditor.js"></script>

<script src="<?= base_url()?>components/datepicker/moment.js"></script>
<script src="<?= base_url()?>components/datepicker/bootstrap-datetimepicker.min.js"></script>

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
        
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
            <!-- general form elements -->
                
                <div class="box box-primary" id="recordsTbl" style="display:<?= $act == 'edit' ? "none" : "block"?>">
                    <div class="box-header">
                        <h3 class="box-title"><?= $pageSubTitle ?></h3>
                    </div>
                    
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="form-group">
                                    <a class="btn btn-primary addRec" href="<?= base_url().adminPath; ?>/<?= $topPage ?>"><i class="fa fa-plus"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-body table-responsive no-padding">
                                  <table class="table table-hover">
                                    <tr>
                                        <? foreach($subFields as $k=>$val) { ?>
                                            <th><?= $val[0]?></th>
                                        <? } ?>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    <?
                                    if(!empty($recordList))
                                    {
                                        foreach($recordList as $record)
                                        {
                                        ?>
                                        <tr>
                                            <? foreach($subFields as $k=>$val) { 
                                                if ($val[2] == "img") {
                                                    ?><td><img src="<?= base_url() ?>/images/<?= $record->$k ?>" width="70" /></td><? 
                                                } else {
                                                    ?><td><?= $record->$k ?></td><? 
                                                }
                                           } 
                                            //    <td><?= date("d-m-Y", strtotime($record->createDT)) ? ></td>
                                            ?>
                                          
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" href="<?= base_url().adminPath.'/'. $topPage .'/edit/'.$record->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
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
                
                <div class="box box-primary" id="recordsEdit" style="display:<?= $act == 'edit' ? "block" : "none"?>;">
                    <div class="box-header">
                        <h3 class="box-title">Edit Record</h3>
                    </div>
                    
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="editRecord" enctype="multipart/form-data" action="<?= base_url() . adminPath ?>/<?= $topPage ?>" method="post" role="form">
                    <input type="hidden" name="rowId" value="<?=$editRow->id?>" />   
                    <section class="content">
                        <div class="row">
                            
                            <? 
                        foreach($editRow as $k=>$val) { 
                            $fieldType = 'hidden';
                            $fieldTitle = '';
                            if (array_key_exists($k, $subFields))
                            {
                                $field = $subFields[$k];
                                $fieldType = $field[2];
                                $fieldTitle = $field[0];
                            }
                            switch ($fieldType)
                            {
                                case "hidden":
                                {
                                     ?>
                                    <input type="hidden" id="<?= $k ?>" name="<?= $k ?>" value="<?=$val?>"/>
                                    <?
                                }
                                break;
                                case "text":
                                {
                                    ?>
                                     <div class="col-md-10">                                
                                        <div class="form-group">
                                            <label for="<?= $k ?>"><?= $fieldTitle ?></label>
                                            <input type="text" class="form-control required" id="<?= $k ?>" name="<?= $k ?>" value="<?=$val?>"/>
                                        </div>
                                    </div>
                                    <?
                                }
                                break;
                                case "textarea":
                                {
                                     ?>
                                     <div class="col-md-10">                                
                                        <div class="form-group">
                                            <label for="full_text"><?= $fieldTitle ?></label>
                                            <textarea class="form-control required" id="<?= $k ?>" name="<?= $k ?>"><?=$val?></textarea>
                                        </div>
                                    </div>
                                    <?
                                }
                                break;
                                case "date":
                                {
                                     ?>
                                     <div class="col-md-10">                                
                                        <div class="form-group">
                                            <label for="full_text"><?= $fieldTitle ?></label>
                                            <input type="text" class="form-control required" id="<?= $k ?>" name="<?= $k ?>" value="<?=$val?>"/>
                                        </div>
                                    </div>
                                    <?
                                }
                                break;
                                case "img":
                                {
                                    $img_src = $val ? $val : "no_image.png";
                                    ?>
                                     <div class="col-md-6">                                
                                        <div class="form-group">
                                            <label for="<?= $k ?>"><?= $fieldTitle ?></label>
                                            <input type="file" class="form-control required" id="<?= $k ?>" name="<?= $k ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">                                
                                        <div class="form-group">
                                            <img id="preview" src="<?=base_url()?>images/<?= $img_src ?>" height="150">
                                        </div>
                                    </div>
                                    <?
                                }
                                break;
                            }
                        }
                        ?>
                            
                        </div>
                            <div class="box-footer">
                                <input type="submit" name="editRecord" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default back" value="Cancel" />
                            </div>
                    </section>
                    </form>
                </div>
                
            </div>

        </div>    
    </section>
    
</div>
<script type="text/javascript">
$(document).ready(function(){ 
    
    $(".addRec").click(function(){
        
        $("#recordsTbl").hide();
        $("#recordsEdit").show();
        
        return false;
    });
    
    $(".back").click(function(){
        
        //$('#AddServices')[0].reset();
        $("#recordsTbl").show();
        $("#recordsEdit").hide();
        
        return false;
    });
    
	
	$(document).on("click", ".deleteRow", function(){
		var rowId = $(this).data("rowid"),
			hitURL = baseURL + "adminator/<?= $topPage ?>/deleteRow",
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
    
    $('#createDT').datetimepicker({format: 'YYYY-MM-DD HH:ss', locale: 'ru'});

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#image").change(function() {
      readURL(this);
    });
    
    
});
</script>