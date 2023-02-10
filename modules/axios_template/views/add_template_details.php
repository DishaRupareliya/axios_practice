<div class="modal fade" id="axios_template_modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <span class="add-title"><?php echo _l('axios_template'); ?></span>
                </h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('',['id' => 'axios_form']); ?>
                <input type="hidden" name="id" value="" id="id">
                <div class="row">
                    <div class="col-md-6">
                        <?php echo render_input('firstname', 'firstname', ''); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo render_input('lastname', 'lastname', ''); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo render_input('email', 'email', '' ,'email'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo render_input('password', 'password', '' , 'password'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo render_input('city', 'city', ''); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo render_input('phone', 'phone', '','number'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                         <?php echo render_textarea('address', 'address', ''); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="submit" id="add_template"><?php echo _l('save'); ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><?php echo _l('close'); ?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        appValidateForm($('form'), {
          firstname : "required",
          lastname  : "required",
          email     : "required",
          password  : "required",
          phone     : "required",
          city      : "required",
          address   : "required", 
        });        
    });
</script>