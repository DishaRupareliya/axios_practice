<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel_s">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div class="_buttons">
									<a href="#" data-toggle="modal" data-target="#axios_template_modal" class="btn btn-primary tw-mb-3"><?= _l('add_template') ?></a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="clearfix"></div>
								<hr class="hr-panel-heading"/>
								<?= 
								render_datatable([
									_l('#'),
									_l('name'),
									_l('email'),
									_l('phone'),
									_l('city'),
									_l('address'),
								], 'axios_template_table');
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php init_tail(); ?>
<?php $this->load->view('add_template_details') ?>
<script type="text/javascript">
	initDataTable('.table-axios_template_table', admin_url+"axios_template", undefined, undefined, undefined, undefined);
</script>

