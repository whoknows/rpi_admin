<!-- Main bar -->
<div class="mainbar">
	<!-- Page heading -->
	<div class="page-head">
        <!-- Page heading -->
		<h2 class="pull-left">Charts
			<!-- page meta -->
			<span class="page-meta">System and home monitoring</span>
        </h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
			<a href="index.html"><i class="icon-home"></i> Home</a>
			<!-- Divider -->
			<span class="divider">/</span>
			<a href="#" class="bread-current">Charts</a>
        </div>
        <div class="clearfix"></div>
	</div>
	<!-- Page heading ends -->

	<!-- Matter -->
	<div class="matter">
        <div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">

					<!-- Bar Chart -->
					<div class="widget wlightblue">
						<div class="widget-head">
							<div class="pull-left">Temperature and Humidity</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<div class="padd">
								<!-- Barchart. jQuery Flot plugin used. -->
								<div style="width:100%; height:300px;" id="graphdiv1"></div>
								<hr />
								Temperature and humidity in my house (in real time) !
							</div>
						</div>
					</div>
					<!-- Bar chart ends -->

					<!-- Curve chart starts -->
					<div class="widget wgreen">
						<div class="widget-head">
							<div class="pull-left">CPU Temperature</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<div class="padd">
								<div style="width:100%; height:300px;" id="graphdiv2"></div>
							</div>
						</div>
					</div>
					<!-- Curve chart ends -->


					<!-- Realtime chart starts -->

					<div class="widget wred">
						<div class="widget-head">
							<div class="pull-left">CPU Frequency</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="widget-content">
                            <div class="padd">
								<div style="width:100%; height:300px;" id="graphdiv3"></div>
                            </div>
                        </div>

					</div>
					<!-- Realtime chart ends -->

					<!-- Pie chart starts -->
					<div class="widget wviolet">
						<div class="widget-head">
							<div class="pull-left">Memory Usage</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<div class="padd">
								<div style="width:100%; height:300px;" id="graphdiv4"></div>
							</div>
						</div>
					</div>
					<!-- Pie chart ends -->
				</div>
			</div>
        </div>
	</div>
	<!-- Matter ends -->
</div>
