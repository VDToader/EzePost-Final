# Windows stand-in for ./vendor/bin/sail
# Sail's bash script only supports macOS, Linux, and Ubuntu WSL — not Git Bash.
param(
    [Parameter(Position = 0)]
    [string]$Command = 'up',
    [Parameter(ValueFromRemainingArguments = $true)]
    [string[]]$Rest
)

$ErrorActionPreference = 'Stop'
Set-Location $PSScriptRoot
$env:WWWUSER = '1000'
$env:WWWGROUP = '1000'

switch ($Command) {
    'up' { docker compose up -d @Rest }
    'down' { docker compose down @Rest }
    'stop' { docker compose stop @Rest }
    'ps' { docker compose ps @Rest }
    'logs' { docker compose logs @Rest }
    'build' { docker compose build @Rest }
    'artisan' { docker compose exec laravel.test php artisan @Rest }
    'composer' { docker compose exec laravel.test composer @Rest }
    'npm' { docker compose exec laravel.test npm @Rest }
    'test' { docker compose exec laravel.test php artisan test @Rest }
    'mysql' { docker compose exec mysql mysql -usail -ppassword eze_post @Rest }
    'shell' { docker compose exec laravel.test bash @Rest }
    default { docker compose exec laravel.test @($Command + $Rest) }
}
