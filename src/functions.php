<?php
/*
 * Copyright (C) 2020 The Dirty Unicorns Project
 * Copyright (C) 2020 James Taylor <jmz.taylor16@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once "check.php";

function getChecks() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL,"https://healthchecks.io/api/v1/checks/");
    $headers = [
        'X-Api-Key: ' . getenv($API_KEY)
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result=curl_exec($ch);
    curl_close($ch);
    $output = json_decode($result, true);

    $checks = array();

    for ($i=0; $i < count($output['checks']); $i++) {
        $up = false;
        if (trim($output['checks'][$i]['status']) == "up") {
            $up = true;
        }
        $checks[] = new check($output['checks'][$i]['name'], $up, $output['checks'][$i]['last_ping']);
    }

    return $checks;
}
