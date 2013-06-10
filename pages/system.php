<?php
function shell_to_html_table_result($shellExecOutput) {
	$shellExecOutput = preg_split('/[\r\n]+/', $shellExecOutput);

	// remove double (or more) spaces for all items
	foreach ($shellExecOutput as &$item) {
		$item = preg_replace('/[[:blank:]]+/', ' ', $item);
		$item = trim($item);
	}

	// remove empty lines
	$shellExecOutput = array_filter($shellExecOutput);

	// the first line contains titles
	$columnCount = preg_match_all('/\s+/', $shellExecOutput[0]);
	$shellExecOutput[0] = '<tr><th>' . preg_replace('/\s+/', '</th><th>', $shellExecOutput[0], $columnCount) . '</th></tr>';
	$tableHead = $shellExecOutput[0];
	unset($shellExecOutput[0]);

	// others lines contains table lines
	foreach ($shellExecOutput as &$item) {
		$item = '<tr><td>' . preg_replace('/\s+/', '</td><td>', $item, $columnCount) . '</td></tr>';
	}

	// return the build table
	return '<table class=\'table table-striped table-bordered\'>'
				. '<thead>' . $tableHead . '</thead>'
				. '<tbody>' . implode($shellExecOutput) . '</tbody>'
			. '</table>';
}

$ram = Memory::ram();
$cpu_heat = Cpu::heat();
?>
<!-- Main bar -->
<div class="mainbar">

	<!-- Page heading -->
	<div class="page-head">
		<!-- Page heading -->
		<h2 class="pull-left">System Management
			<!-- page meta -->
			<span class="page-meta">Scripts and system management</span>
		</h2>


		<!-- Breadcrumb -->
		<div class="bread-crumb pull-right">
			<a href="?page=index"><i class="icon-home"></i> Home</a>
			<!-- Divider -->
			<span class="divider">/</span>
			<a href="#" class="bread-current">System Management</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- Page heading ends -->



	<!-- Matter -->

	<div class="matter">
		<div class="container-fluid">
			<div class="row-fluid">
				<!-- Operating System -->
				<div class="span4">
					<div class="widget wred">
						<!-- Widget title -->
						<div class="widget-head">
							<div class="pull-left">Log Files</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content referrer">
							<!-- Widget content -->

							<table class="table  table-bordered ">
								<tr>
									<th><center>#</center></th>
									<th>File name</th>
									<th>File Size</th>
								</tr>
								<tr>
									<td><img src="img/icons/metro.png" alt="" />
									<td>temp.log</td>
									<td>245Kb</td>
								</tr>
								<tr>
									<td><img src="img/icons/metro.png" alt="" />
									<td>cpu.log</td>
									<td>178Kb</td>
								</tr>
							</table>

						</div>
					</div>
				</div>


				<!-- Browsers -->
				<div class="span4">
					<div class="widget wlightblue">
						<!-- Widget title -->
						<div class="widget-head">
							<div class="pull-left">Scripts</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content referrer">
							<!-- Widget content -->

							<table class="table  table-bordered ">
								<tr>
									<th><center>#</center></th>
									<th>Browsers</th>
									<th>Visits</th>
								</tr>
								<tr>
									<td><img src="img/icons/chrome.png" alt="" />
									<td>mopidy.sh</td>
									<td><button class="btn btn-danger">Exec</button></td>
								</tr>
								<tr>
									<td><img src="img/icons/chrome.png" alt="" />
									<td>archiveLog.sh</td>
									<td><button class="btn btn-danger">Exec</button></td>
								</tr>
							</table>

						</div>
					</div>
				</div>

				<!-- Services -->
				<div class="span4">
					<div class="widget wviolet">
						<!-- Widget title -->
						<div class="widget-head">
							<div class="pull-left">Services</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content referrer">
							<!-- Widget content -->
							<table class="table  table-bordered ">
								<tr>
									<th><center>#</center></th>
									<th>Service name</th>
									<th>Service status</th>
									<th>Actions</th>
								</tr>
								<tr>
									<td><img src="img/icons/chrome.png" alt="" />
									<td>Shairport</td>
									<td>Runnig</td>
									<td>
										<button class="btn btn-success">Start</button>
										<button class="btn btn-danger">Stop</button>
										<button class="btn btn-info">Restart</button>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<!-- RAM Eaters -->
				<div class="span4">
					<div class="widget wgreen">
						<!-- Widget title -->
						<div class="widget-head">
							<div class="pull-left">Top RAM eaters</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content referrer">
							<!-- Widget content -->
							<?php echo shell_to_html_table_result($ram['detail']); ?>
						</div>
					</div>
				</div>

				<div class="span4">
					<div class="widget worange">
						<!-- Widget title -->
						<div class="widget-head">
							<div class="pull-left">Top CPU eaters</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content referrer">
							<!-- Widget content -->
							<?php echo shell_to_html_table_result($cpu_heat['detail']); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Matter ends -->

</div>