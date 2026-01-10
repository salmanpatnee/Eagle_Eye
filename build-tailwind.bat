@echo off
echo Building Tailwind CSS...
cd public\tailadmin
call npm run build
cd ..\..
echo.
echo Build complete! Refresh your browser to see the changes.
