<?php
include "conf/init.php";

$uptime = Uptime::uptime();
$ram = Memory::ram();
$swap = Memory::swap();
$cpu = Cpu::cpu();
$cpu_heat = Cpu::heat();
$hdd = Storage::hdd();
$net_connections = Network::connections();
$net_eth = Network::ethernet();
$users = Users::connected();

//echo '<pre>';
//print_r($users);
//echo '</pre>';

/*
uptime :

1 jour 4 heures 5 minutes 12 secondes

ram :

Array
(
    [percentage] => 10
    [alert] => success
    [free] => 435
    [used] => 50
    [total] => 485
    [detail] => %MEM USER     COMMAND
 1.6 root     /usr/sbin/apache2 -k start
 1.4 www-data /usr/sbin/apache2 -k start
 1.4 www-data /usr/sbin/apache2 -k start
 1.3 www-data /usr/sbin/apache2 -k start

)

cpu :

Array
(
    [alert] => success
    [loads] => 0.06
    [loads5] => 0.07
    [loads15] => 0.08
    [current] => 700MHz
    [min] => 700MHz
    [max] => 900MHz
    [governor] => ondemand
)

cpu heat :

Array
(
    [degrees] => 43
    [percentage] => 51
    [alert] => success
    [detail] => %CPU USER     COMMAND
 2.0 pi       nano test.php
 0.2 pi       -bash

)

hdd :

Array
(
    [0] => Array
        (
            [name] => /
            [total] => 14.55G
            [free] => 12.35G
            [used] => 2.2G
            [format] => ext4
            [percentage] => 12
            [alert] => success
        )
    [1] => Array
        (
            [name] => /boot
            [total] => 55.95M
            [free] => 37.5M
            [used] => 18.45M
            [format] => vfat
            [percentage] => 33
            [alert] => success
        )
)

net eth :

Array
(
    [up] => 9.18
    [down] => 26.36
    [total] => 35.54
)

users :

Array
(
    [0] => Array
        (
            [user] => pi
            [ip] => 109.3.174.58
            [dns] => (58.174.3.109.rev.sfr.net)
            [date] => Jun 7
            [hour] => 09:51
        )
)

*/
?>
