<?php
$uptime = Uptime::uptime();
$ram = Memory::ram();
$swap = Memory::swap();
$cpu = Cpu::cpu();
$cpu_heat = Cpu::heat();
$hdd = Storage::hdd();
//$net_connections = Network::connections();
$net_eth = Network::ethernet();
$users = Users::connected();
?>
<!-- Main bar -->
<div class="mainbar">

	<div class="page-head">
		<h2 class="pull-left">Dashboard
			<span class="page-meta">Main page</span>
		</h2>

		<div class="bread-crumb pull-right">
			<a href="index.html"><i class="icon-home"></i> Home</a>
			<span class="divider">/</span>
			<a href="#" class="bread-current">Dashboard</a>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="matter">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<ul class="today-datas">
						<li class="bred">
							<div class="pull-left"><i class="icon-fire"></i></div>
							<div class="datas-text pull-right"><span class="bold"><?php echo $cpu_heat['degrees']; ?>°C</span> CPU Temp.</div>
							<div class="clearfix"></div>
						</li>
						<li class="bgreen">
							<div class="pull-left"><i class="icon-tasks"></i></div>
							<div class="datas-text pull-right"><span class="bold"><?php echo $cpu['loads']; ?></span> CPU Load</div>
							<div class="clearfix"></div>
						</li>
						<li class="blightblue">
							<div class="pull-left"><i class="icon-bolt"></i></div>
							<div class="datas-text pull-right"><span class="bold"><?php echo $cpu['current']; ?></span> CPU Freq.</div>
							<div class="clearfix"></div>
						</li>
						<li class="bviolet">
							<div class="pull-left"><i class="icon-save"></i></div>
							<div class="datas-text pull-right"><span class="bold"><?php echo $ram['free']; ?>Mb</span> Free RAM</div>
							<div class="clearfix"></div>
						</li>
						<li class="borange">
							<div class="pull-left"><i class="icon-hdd"></i></div>
							<div class="datas-text pull-right"><span class="bold"><?php echo $hdd[0]['free'];  ?></span> Free Disk</div>
							<div class="clearfix"></div>
						</li>
					</ul>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span8">
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
								<div style="width:100%; height:302px;" id="graphdiv1"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="span4">
					<div class="widget wblue">
						<div class="widget-head">
							<div class="pull-left">Server Informations</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="widget-content">
							<table class="table  table-bordered ">
								<tr>
									<td>Hostname</td>
									<td><?php echo Rbpi::hostname(); ?></td>
								</tr>
								<tr>
									<td>IP Adress</td>
									<td><?php echo Rbpi::ip(); ?></td>
								</tr>
								<tr>
									<td>Uptime</td>
									<td><?php echo $uptime; ?></td>
								</tr>
								<tr>
									<td>CPU Freq.</td>
									<td><span class="text-info"><?php echo $cpu['current']; ?></span> (min: <?php echo $cpu['min']; ?>  &middot;  max: <?php echo $cpu['max']; ?>)</td>
								</tr>
								<tr>
									<td>Governor</td>
									<td><?php echo $cpu['governor']; ?></td>
								</tr>
								<tr>
									<td>Firmware</td>
									<td><?php echo Rbpi::firmware(); ?></td>
								</tr>
								<tr>
									<td>Kernel</td>
									<td><?php echo Rbpi::kernel(); ?></td>
								</tr>
								<tr>
									<td>Distribution</td>
									<td><?php echo Rbpi::distribution(); ?></td>
								</tr>
								<tr>
									<td>Web Server</td>
									<td><?php echo Rbpi::webServer(); ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Dashboard graph ends -->

			<div class="row-fluid">
				<div class="span4">
					<div class="widget wviolet">
						<div class="widget-head">
							<div class="pull-left">System Health</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<ul class="file-upload">
								<li>
									<strong><i class="icon-fire red"></i> CPU Temperature</strong>
									<div class="progress progress-striped">
										<div class="bar bar-<?php echo $cpu_heat['alert']; ?>" style="width: <?php echo $cpu_heat['percentage']; ?>%;"><?php echo $cpu_heat['percentage']; ?>%</div>
									</div>
									<div class="file-meta">Heat: <span class="text-info"><?php echo $cpu_heat['degrees']; ?>°C</span> - Load: <span class="text-info"><?php echo $cpu['loads']; ?></span> [1 min] &middot; <span class="text-info"><?php echo $cpu['loads5']; ?></span> [5 min] &middot; <span class="text-info"><?php echo $cpu['loads15']; ?></span> [15 min]</div>
								</li>
								<li>
									<strong><i class="icon-save orange"></i> RAM Usage</strong>
									<div class="progress progress-striped">
										<div class="bar bar-<?php echo $ram['alert']; ?>" style="width: <?php echo $ram['percentage']; ?>%;"><?php echo $ram['percentage']; ?>%</div>
									</div>
									<div class="file-meta">free: <span class="text-success"><?php echo $ram['free']; ?>Mb</span>  &middot; used: <span class="text-warning"><?php echo $ram['used']; ?>Mb</span> &middot; total: <?php echo $ram['total']; ?>Mb</div>
								</li>
								<li>
									<strong><i class="icon-refresh blue"></i> Swap Usage</strong>
									<div class="progress progress-striped">
										<div class="bar bar-<?php echo $swap['alert']; ?>" style="width: <?php echo $swap['percentage']; ?>%;"><?php echo $swap['percentage']; ?>%</div>
									</div>
									<div class="file-meta">free: <span class="text-success"><?php echo $swap['free']; ?>Mb</span>  &middot; used: <span class="text-warning"><?php echo $swap['used']; ?>Mb</span> &middot; total: <?php echo $swap['total']; ?>Mb</div>
								</li>
							</ul>
						</div>
						<div class="widget-foot">
							<button class="btn pull-right">Refresh All</button>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="span4">
					<div class="widget wred">
						<div class="widget-head">
							<div class="pull-left">System Health</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<ul class="file-upload">
								for ($i=0; $i<sizeof($hdd); $i++) {
									echo '<li>
											<strong><i class="icon-folder-open"></i> ', $hdd[$i]['name'] , '</strong>
											<div class="progress progress-striped">
												<div class="bar bar-', $hdd[$i]['alert'], '" style="width: ', $hdd[$i]['percentage'], '%;">', $hdd[$i]['percentage'], '%</div>
											</div>
											<div class="file-meta">Free: <span class="text-success">', $hdd[$i]['free'], 'b</span> &middot; used: <span class="text-warning">', $hdd[$i]['used'], 'b</span> &middot; total: ', $hdd[$i]['total'], 'b &middot; format: ', $hdd[$i]['format'], '</div>
										</li>';
								}
							</ul>
						</div>
						<div class="widget-foot">
							<button class="btn pull-right">Refresh All</button>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="span4">
					<div class="widget wlightblue">
						<div class="widget-head">
							<div class="pull-left">Project</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<ul class="project">
								<li>
									<p>
										<input value="check1" type="checkbox">
										Dynamisation du template
									</p>
									<p class="p-meta">
										<span>90% Done</span>
									</p>
									<div class="progress progress-striped">
										<div class="bar bar-danger" style="width: 90%;"></div>
									</div>
								</li>
								<li>
									<p>
										<input value="check1" type="checkbox">
										Création des cron de récupération de données
									</p>
									<p class="p-meta">
										<span>40% Done</span>
									</p>
									<div class="progress progress-striped">
										<div class="bar bar-success" style="width: 40%;"></div>
									</div>
								</li>
								<li>
									<p>
										<input value="check1" type="checkbox">
										Récupération de la taille des fichiers de log
									</p>
									<p class="p-meta">
										<span>0% Done</span>
									</p>
									<div class="progress progress-striped">
										<div class="bar bar-success" style="width: 0%;"></div>
									</div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="widget-foot"></div>
					</div>
				</div>

			<div class="row-fluid">
				<!--<div class="span6">
					<div class="widget wblue">
						<div class="widget-head">
							<div class="pull-left">Curve Chart</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="widget-content">
							<div class="padd">
								<div id="curve-chart"></div>
								<hr />
								<div id="hoverdata">Mouse hovers at
									(<span id="x">0</span>, <span id="y">0</span>). <span id="clickdata"></span></div>
							</div>
						</div>
						<div class="widget-foot"></div>
					</div>
				</div>-->
				<div class="span6">
					<div class="widget wgreen">
						<div class="widget-head">
							<div class="pull-left">Quick Post</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="widget-content">
							<div class="padd">
								<div class="form quick-post">
									<form class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="title">Title</label>
											<div class="controls">
												<input type="text" class="input-large" id="title">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="content">Content</label>
											<div class="controls">
												<textarea class="input-large" id="content"></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Category</label>
											<div class="controls">
												<select>
													<option value="">- Choose Cateogry -</option>
													<option value="1">General</option>
													<option value="2">News</option>
													<option value="3">Media</option>
													<option value="4">Funny</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="tags">Tags</label>
											<div class="controls">
												<input type="text" class="input-large" id="tags">
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-info">Publish</button>
											<button type="submit" class="btn">Save Draft</button>
											<button type="reset" class="btn">Reset</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="widget-foot"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
