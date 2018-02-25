<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'recipe/npm.php';


// Project name
set('application', 'acer');

// Project repository
set('repository', 'git@github.com:matf86/acer_site.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

set('allow_anonymous_stats', false);

//set('writable_mode', 'chown');
//set('writable_use_sudo', false); // Using sudo in writable commands?


// Hosts

host('139.162.176.36')
    ->set('deploy_path', '/var/www/html/websites/{{application}}')
    ->set('http_user', 'www-data')
    ->user('mat86')
    ->port(22)
    ->identityFile('~/.ssh/01_4248407_linode')
    ->forwardAgent(true)
    ->multiplexing(true);

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

after('deploy:update_code', 'npm:install');
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


