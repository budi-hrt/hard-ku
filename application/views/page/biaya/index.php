<div class="main-content">
	<div class="main-content-inner">


		<div class="page-content">
			<!-- skin disini -->
			<?php $this->load->view('template/skin'); ?>
			<div class="page-header">
				<h1>
					Biaya
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Input Biaya Kanvas
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">

							<h4 class="widget-title lighter">Nomor : <?= $this->session->userdata('nomorBiaya'); ?> </h4>
							<div class="widget-toolbar">
								<label>
									<small class="green">
										<b>Validation</b>
									</small>

									<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4" />
									<span class="lbl middle"></span>
								</label>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<div id="fuelux-wizard-container">
									<div>
										<ul class="steps">
											<li data-step="1" class="active">
												<span class="step">1</span>
												<span class="title">Informasi</span>
											</li>

											<li data-step="2">
												<span class="step">2</span>
												<span class="title">BBM</span>
											</li>

											<li data-step="3">
												<span class="step">3</span>
												<span class="title">Penginapan</span>
											</li>

											<li data-step="4">
												<span class="step">4</span>
												<span class="title">Lainnya</span>
											</li>
										</ul>
									</div>

									<hr />

									<div class="step-content pos-rel">
										<div class="step-pane active" data-step="1">
											<!-- form informasi -->
											<?php $this->load->view('page/biaya/informasi'); ?>
										</div>
										<!-- Step 2 -->

										<div class="step-pane" data-step="2">
											<!-- form BBM -->
											<?php $this->load->view('page/biaya/form-biayabbm'); ?>
										</div>
										<div class="step-pane" data-step="3">
											<!-- <div class="center">
												<h3 class="blue lighter">This is step 3</h3>
											</div> -->
											<?php $this->load->view('page/biaya/form-biayahotel'); ?>
										</div>

										<div class="step-pane" data-step="4">
											<?php $this->load->view('page/biaya/form-biayaLainnya'); ?>
										</div>
									</div>
								</div>

								<hr />
								<div class="wizard-actions">
									<button class="btn btn-prev">
										<i class="ace-icon fa fa-arrow-left"></i>
										Prev
									</button>

									<button class="btn btn-success btn-next" data-last="Finish">
										Next
										<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
									</button>
								</div>
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<!-- modal here -->
<?php $this->load->view('page/biaya/modal'); ?>
<!-- end modal -->

<?php $this->load->view('template/footer'); ?>
<script src="<?= base_url(); ?>assets/js/app/biaya/index.js"></script>
<script src="<?= base_url(); ?>assets/js/app/biaya/biayaBbm.js"></script>
<script src="<?= base_url(); ?>assets/js/app/biaya/biayaHotel.js"></script>
<script src="<?= base_url(); ?>assets/js/app/biaya/biayaLainnya.js"></script>

<script>
	var $validation = false;
	$('#fuelux-wizard-container')
		.ace_wizard({
			//step: 2 //optional argument. wizard will jump to step "2" at first
			//buttons: '.wizard-actions:eq(0)'
		})
		.on('actionclicked.fu.wizard', function(e, info) {
			if (info.step == 1 && $validation) {
				if (!$('#validation-form').valid()) e.preventDefault();
			}
		})
		//.on('changed.fu.wizard', function() {
		//})
		.on('finished.fu.wizard', function(e) {
			alert('success');
		}).on('stepclick.fu.wizard', function(e) {
			//e.preventDefault();//this will prevent clicking and selecting steps
		});
</script>


<?php $this->load->view('template/foothtml'); ?>