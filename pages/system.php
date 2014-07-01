<?php

function shell_to_html_table_result($shellExecOutput)
{
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
                <!-- RAM Eaters -->
                <div class="span8">
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
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th><center>#</center></th>
	                                <th>Service name</th>
	                                <th>Service status</th>
	                                <th>Actions</th>
                                </tr>
                                <tr>
                                    <td><center><i class="icon-cog"></i></center></td>
	                                <td>Shairport</td>
	                                <td>Runnig</td>
	                                <td>
	                                    <button class="btn btn-success">Start</button>
	                                    <button class="btn btn-danger">Stop</button>
	                                    <button class="btn btn-info">Restart</button>
	                                </td>
                                </tr>
                                <tr>
                                    <td><center><i class="icon-cog"></i></center></td>
	                                <td>XBMC</td>
	                                <td>Runnig</td>
	                                <td>
	                                    <button class="btn btn-success">Start</button>
	                                    <button class="btn btn-danger">Stop</button>
	                                    <button class="btn btn-info">Restart</button>
	                                </td>
                                </tr>
                                <tr>
                                    <td><center><i class="icon-cog"></i></center></td>
	                                <td>Mopidy</td>
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
                <div class="span8">
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

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><center><strong>#</strong></center></th>
                                <th>File name</th>
                                <th>File Size</th>
                                </tr></thead>
                                <tbody><?php
                                    $dirname = '../temp/';
                                    $dir = opendir($dirname);

                                    while ($file = readdir($dir)) {
                                        if ($file != '.' && $file != '..' && !is_dir($dirname . $file)) {
                                            echo
                                            '<tr>
											<td><center><i class="icon-file-alt"></i></center></td>
											<td>' . $file . '</td>
											<td><strong class="text-success">' . round(filesize($dirname . $file) / 1024) . ' Kb</strong></td>
										</tr>';
                                        }
                                    }
                                    closedir($dir);

                                    ?></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Matter ends -->

</div>
