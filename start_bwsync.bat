@echo off
cd /d %~dp0
browser-sync start --proxy "localhost/Community/" --files "*.php, *.html, *.css, *.js"
pause
