<?php
    echo $this->Html->css('/assets/plugins/select2/select2.css');
    echo $this->Html->css('/assets/plugins/datepicker/css/datepicker.css');
    echo $this->Html->css('/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css');
    echo $this->Html->css('/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css');
    echo $this->Html->css('/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css');
    echo $this->Html->css('/assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css');
    echo $this->Html->css('/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css');
    echo $this->Html->css('/assets/plugins/summernote/build/summernote.css');
    echo $this->Html->css('/assets/plugins/ckeditor/contents.css');
?>
<div class="row">
    <?php
        if (isset($formErrors)) {
            echo $this->element('form_errors', ['errors' => $formErrors]);
        }
    ?>
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- start: SELECT BOX PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>
                <?php echo $this->fetch('form-title') ?>
                <div class="panel-tools">
                    <a href="#" class="btn btn-xs btn-link panel-collapse collapses">
                    </a>
                    <a data-toggle="modal" href="#panel-config" class="btn btn-xs btn-link panel-config">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-link panel-refresh">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-link panel-expand">
                        <i class="fa fa-resize-full"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-link panel-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php echo $this->fetch('form-elements'); ?>
            </div>
        </div>
        <!-- end: SELECT BOX PANEL -->
    </div>
    <?php echo $this->fetch('right-panel') ?>
</div>


<?php echo $this->fetch('content'); ?>
<?php
    echo $this->Html->script('/assets/plugins/jquery-validation/dist/jquery.validate.min', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard', ['block' => 'scriptBottom']);


    echo $this->Html->script('/assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min',
            ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/autosize/jquery.autosize.min', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/autosize/jquery.autosize.min', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/select2/select2.min', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/jquery.maskedinput/src/jquery.maskedinput', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker',
            ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min',
            ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/bootstrap-daterangepicker/moment.min', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/bootstrap-daterangepicker/daterangepicker', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker',
            ['block' => 'scriptBottom']);
    //echo $this->Html->script('/assets/plugins/bootstrap-colorpicker/js/commits', array('block' => 'scriptBottom'));
    echo $this->Html->script('/assets/plugins/jQuery-Tags-Input/jquery.tagsinput', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min',
            ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/summernote/build/summernote.min', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/ckeditor/ckeditor', ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/plugins/ckeditor/adapters/jquery', ['block' => 'scriptBottom']);
    echo $this->Html->script(['/assets/plugins/jquery-ui/jquery.ui.widget'], ['block' => 'scriptBottom']);
    echo $this->Html->script(['/assets/plugins/jquery-ui/jquery.ui.position'], ['block' => 'scriptBottom']);
    echo $this->Html->script(['/assets/plugins/jquery-ui/jquery.ui.menu'], ['block' => 'scriptBottom']);
    echo $this->Html->script(['/assets/plugins/jquery-ui/jquery.ui.autocomplete'], ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/js/form-matricular-candidato-elements', ['block' => 'scriptBottom'],
            ['block' => 'scriptBottom']);
    echo $this->Html->script('/assets/js/form-matricular-candidato-wizard', ['block' => 'scriptBottom'],
            ['block' => 'scriptBottom']);
?>

