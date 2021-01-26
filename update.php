<?php

require_once('vendor/autoload.php');

$email = 'EMAIL GOES HERE';
$gApiKey = 'GLOBAL API KEY GOES HERE';
$domain = 'DOMAIN GOES HERE';

$key = new \Cloudflare\API\Auth\APIKey($email, $gApiKey);
$adapter = new Cloudflare\API\Adapter\Guzzle($key);
$zones = new \Cloudflare\API\Endpoints\Zones($adapter);

$zoneID = $zones->getZoneID($domain);
$id = array();
$name = array();
$ips = array();

$dns = new \Cloudflare\API\Endpoints\DNS($adapter);
foreach ($dns->listRecords($zoneID)->result as $record) {
    array_push($id, $record->id);
    array_push($name, $record->name);
    array_push($ips, $record->content);
}


$externalContent = file_get_contents('http://checkip.dyndns.com/');
preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
$externalIp = $m[1];


for ($i = 0; $i <= count($ips)-1; $i++) {
    if ($ips[$i] != $externalIp) {
        $query = [
            'type' => 'A',
            'name' => $name[$i],
            'content' => $externalIp,
            'ttl' => 1,
            'proxied' => true
        ];

        $dns->updateRecordDetails($zoneID, $id[$i], $query);
    }
}


?>
