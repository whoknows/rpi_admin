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
						<li class="bblue">
                            <div class="pull-left"><i class="icon-exclamation-sign"></i></div>
                            <div class="datas-text pull-right"><span class="bold"><?php echo Rbpi::authenticationFailure();  ?></span> Auth. Failure</div>
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
						<div class="widget-foot">
							<?php
								$data = explode(',',shell_exec('tail -n 1 ../temp/temp.log'));
								$data1 = explode(',',shell_exec('head -n 1 ../temp/temp.log'));
							?>
							<span class="label label-primary">First Check : <strong><?php echo date('d-m-Y H:i:s',strtotime($data1[0])); ?></strong></span>
							<span class="label label-warning">Last Check : <strong><?php echo date('d-m-Y H:i:s',strtotime($data[0])); ?></strong></span>
                            <span class="label label-info pull-right">Current temperature : <strong><?php echo $data[2] ?></strong></span>
							<span class="label label-success pull-right" style="margin-right:3px;">Current humidity : <strong><?php echo $data[1] ?></strong></span>
                            <div class="clearfix"></div>
                        </div>
					</div>
				</div>

				<div class="span4">
					<div class="widget wgreen">
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
									<td>IP Adress (private)</td>
									<td><span class="text-info"><?php echo Rbpi::ip(); ?></span></td>
								</tr>
								<tr>
                                    <td>IP Adress (public)</td>
                                    <td><span class="text-info"><?php echo shell_exec('wget http://ipecho.net/plain -O - -q ; echo'); ?></span></td>
                                </tr>
								<tr>
									<td>Uptime</td>
									<td><span class="text-warning"><?php echo $uptime; ?></span></td>
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
							<div class="pull-left">Disks Informations</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="widget-content">
							<ul class="file-upload">
								<?php
								for ($i=0; $i<sizeof($hdd); $i++) {
									echo '<li>
											<strong><i class="icon-folder-open"></i> ', $hdd[$i]['name'] , '</strong>
											<div class="progress progress-striped">
												<div class="bar bar-', $hdd[$i]['alert'], '" style="width: ', $hdd[$i]['percentage'], '%;">', $hdd[$i]['percentage'], '%</div>
											</div>
											<div class="file-meta">Free: <span class="text-success">', $hdd[$i]['free'], 'b</span> &middot; used: <span class="text-warning">', $hdd[$i]['used'], 'b</span> &middot; total: ', $hdd[$i]['total'], 'b &middot; format: ', $hdd[$i]['format'], '</div>
										</li>';
								}
								?>
							</ul>
						</div>
						<div class="widget-foot">
							<button class="btn pull-right">Refresh All</button>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="span4">
					<div class="widget worange">
						<div class="widget-head">
							<div class="pull-left">Users</div>
							<div class="widget-icons pull-right">
								<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="wclose"><i class="icon-remove"></i></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="widget-content">
							<ul class="project">
								 <?php
									if (sizeof($users) > 0) {
										for ($i=0; $i<sizeof($users); $i++)
											echo '<li><i class="icon-user"></i><span class="text-info">', $users[$i]['user'] ,'</span> since ', $users[$i]['date'], ' at ', $users[$i]['hour'], ' from <strong>', $users[$i]['ip'] ,'</strong> ', $users[$i]['dns'], '</li>', "\n";
									} else {
										echo '<li>No user logged in</li>';
									}
								?>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="widget-foot"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
