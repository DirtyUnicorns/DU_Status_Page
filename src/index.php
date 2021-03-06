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
require_once __DIR__.'/vendor/autoload.php';
require_once "functions.php";

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader);

$checks = getChecks();

echo $twig->render(
    'index.html',
    [
        'checks' => $checks
    ]
);
