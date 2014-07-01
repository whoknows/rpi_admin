<!-- Main bar -->
<div class="mainbar">

	<!-- Page heading -->
	<div class="page-head">
		<!-- Page heading -->
		<h2 class="pull-left">Tables
			<!-- page meta -->
			<span class="page-meta">Something Goes Here</span>
		</h2>


		<!-- Breadcrumb -->
		<div class="bread-crumb pull-right">
			<a href="index.html"><i class="icon-home"></i> Home</a>
			<!-- Divider -->
			<span class="divider">/</span>
			<a href="#" class="bread-current">Tables</a>
		</div>

		<div class="clearfix"></div>

	</div>
	<!-- Page heading ends -->



	<!-- Matter -->

	<div class="matter">
		<div class="container-fluid">

			<div class="row-fluid">

				<div class="span12">

					<div class="widget wred">

						<div class="widget-head">
							<div class="pull-left">Temperature and humidity</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content" style="max-height:400px; overflow:auto;">

							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Humidity</th>
										<th>Temperature</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if (($handle = fopen('../temp/temp.log','r')) !== FALSE) {
											$i=0;
											while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
												if(!isset($data[1]) || !isset($data[2])) continue;
												echo "<tr>
														<td>$i</td>
														<td>". date('d-m-Y H:i:s', strtotime($data[0])) ."</td>
														<td>".$data[1]."</td>
														<td>".$data[2]."</td>
													</tr>";
												$i++;
												//if($i == 10) break;
											}
											fclose($handle);
										}
									?>
								</tbody>
							</table>

						</div>

						<div class="widget-foot">

							<div class="pagination pull-right">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>

						</div>
					</div>



					<div class="widget wviolet">

						<div class="widget-head">
							<div class="pull-left">Tables</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">

							<table class="table  table-bordered ">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Location</th>
										<th>Date</th>
										<th>Type</th>
										<th>Status</th>
										<th>Control</th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td>1</td>
										<td>Ravi Kumar</td>
										<td>India</td>
										<td>23/12/2012</td>
										<td>Paid</td>
										<td><span class="label label-success">Active</span></td>
										<td>

											<button class="btn btn-mini btn-success"><i class="icon-ok"></i> </button>
											<button class="btn btn-mini btn-warning"><i class="icon-pencil"></i> </button>
											<button class="btn btn-mini btn-danger"><i class="icon-remove"></i> </button>

										</td>
									</tr>


									<tr>
										<td>2</td>
										<td>Parneethi Chopra</td>
										<td>USA</td>
										<td>13/02/2012</td>
										<td>Free</td>
										<td><span class="label label-important">Banned</span></td>
										<td>

											<button class="btn btn-mini"><i class="icon-ok"></i> </button>
											<button class="btn btn-mini"><i class="icon-pencil"></i> </button>
											<button class="btn btn-mini"><i class="icon-remove"></i> </button>

										</td>
									</tr>

									<tr>
										<td>3</td>
										<td>Kumar Ragu</td>
										<td>Japan</td>
										<td>12/03/2012</td>
										<td>Paid</td>
										<td><span class="label label-success">Active</span></td>
										<td>

											<div class="btn-group">
												<button class="btn btn-mini"><i class="icon-ok"></i> </button>
												<button class="btn btn-mini"><i class="icon-pencil"></i> </button>
												<button class="btn btn-mini"><i class="icon-remove"></i> </button>
											</div>

										</td>
									</tr>

									<tr>
										<td>4</td>
										<td>Vishnu Vardan</td>
										<td>Bangkok</td>
										<td>03/11/2012</td>
										<td>Paid</td>
										<td><span class="label label-success">Active</span></td>
										<td>

											<div class="btn-group">
												<button class="btn btn-mini btn-success"><i class="icon-ok"></i> </button>
												<button class="btn btn-mini btn-warning"><i class="icon-pencil"></i> </button>
												<button class="btn btn-mini btn-danger"><i class="icon-remove"></i> </button>
											</div>

										</td>
									</tr>

									<tr>
										<td>5</td>
										<td>Anuksha Sharma</td>
										<td>Singapore</td>
										<td>13/32/2012</td>
										<td>Free</td>
										<td><span class="label label-important">Banned</span></td>
										<td>

											<div class="btn-group1">
												<button class="btn btn-mini btn-success"><i class="icon-ok"></i> </button>
												<button class="btn btn-mini btn-warning"><i class="icon-pencil"></i> </button>
												<button class="btn btn-mini btn-danger"><i class="icon-remove"></i> </button>
											</div>

										</td>
									</tr>

								</tbody>
							</table>


						</div>

						<div class="widget-foot">

							<div class="pagination pull-right">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>

						</div>

					</div>


				</div>

			</div>

			<div class="row-fluid">

				<div class="span6">
					<div class="widget worange">

						<div class="widget-head">
							<div class="pull-left">Tables</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">

							<table class="table  table-bordered ">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Location</th>
										<th>Type</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td>1</td>
										<td>Ravi Kumar</td>
										<td>India</td>
										<td>Paid</td>
										<td><span class="label label-success">Active</span></td>

									</tr>


									<tr>
										<td>2</td>
										<td>Parneethi Chopra</td>
										<td>USA</td>
										<td>Free</td>
										<td><span class="label label-important">Banned</span></td>

									</tr>

									<tr>
										<td>3</td>
										<td>Kumar Ragu</td>
										<td>Japan</td>
										<td>Paid</td>
										<td><span class="label label-success">Active</span></td>

									</tr>

									<tr>
										<td>4</td>
										<td>Vishnu Vardan</td>
										<td>Bangkok</td>
										<td>Paid</td>
										<td><span class="label label-success">Active</span></td>

									</tr>

									<tr>
										<td>5</td>
										<td>Anuksha Sharma</td>
										<td>Singapore</td>
										<td>Free</td>
										<td><span class="label label-important">Banned</span></td>

									</tr>

								</tbody>
							</table>



						</div>

						<div class="widget-foot">

							<div class="pagination pull-right">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>

						</div>
					</div>
				</div>

				<div class="span6">

					<div class="widget wlightblue">

						<div class="widget-head">
							<div class="pull-left">Tables</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">

							<table class="table  table-bordered ">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Location</th>
										<th>Date</th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td>1</td>
										<td>Ravi Kumar</td>
										<td>India</td>
										<td>23/12/2012</td>
										<td>Paid</td>
									</tr>


									<tr>
										<td>2</td>
										<td>Parneethi Chopra</td>
										<td>USA</td>
										<td>13/02/2012</td>
										<td>Free</td>
									</tr>

									<tr>
										<td>3</td>
										<td>Kumar Ragu</td>
										<td>Japan</td>
										<td>12/03/2012</td>
										<td>Paid</td>
									</tr>

									<tr>
										<td>4</td>
										<td>Vishnu Vardan</td>
										<td>Bangkok</td>
										<td>03/11/2012</td>
										<td>Paid</td>
									</tr>

									<tr>
										<td>5</td>
										<td>Anuksha Sharma</td>
										<td>Singapore</td>
										<td>13/32/2012</td>
										<td>Free</td>
									</tr>

								</tbody>
							</table>

						</div>

						<div class="widget-foot">

							<div class="pagination pull-right">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>

						</div>

					</div>

				</div>

			</div>

		</div>
	</div>

	<!-- Matter ends -->

</div>
