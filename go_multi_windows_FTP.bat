@echo off
color 0A
chcp 1251 >NUL

@echo.
@echo.
@echo.
@echo            Devoleped by ExRecod
@echo            Forum http://xxxreal.ru/
@echo            MULTI SERVERS RCM ADMIN MOD v.9
@echo.
@echo.
@echo.

title RCM ADMIN MOD V.9

IF not EXIST %~dp0\php\ (
MD %~dp0\php\
echo php - folder first install
) 

IF not EXIST %~dp0\php\php.exe (
echo Option Explicit                                                    >  %~dp0\download.vbs
echo Dim args, http, fileSystem, adoStream, url, target, status         >> %~dp0\download.vbs
echo.                                                                   >> %~dp0\download.vbs
echo Set args = Wscript.Arguments                                       >> %~dp0\download.vbs
echo Set http = CreateObject^("WinHttp.WinHttpRequest.5.1"^)              >> %~dp0\download.vbs
echo url = args^(0^)                                                      >> %~dp0\download.vbs
echo target = args^(1^)                                                   >> %~dp0\download.vbs
echo WScript.Echo "Getting '" ^& target ^& "' from '" ^& url ^& "'..."  >> %~dp0\download.vbs
echo.                                                                   >> %~dp0\download.vbs
echo http.Open "GET", url, False                                        >> %~dp0\download.vbs
echo http.Send                                                          >> %~dp0\download.vbs
echo status = http.Status                                               >> %~dp0\download.vbs
echo.                                                                   >> %~dp0\download.vbs
echo If status ^<^> 200 Then                                            >> %~dp0\download.vbs
echo    WScript.Echo "FAILED to download: HTTP Status " ^& status       >> %~dp0\download.vbs
echo    WScript.Quit 1                                                  >> %~dp0\download.vbs
echo End If                                                             >> %~dp0\download.vbs
echo.                                                                   >> %~dp0\download.vbs
echo Set adoStream = CreateObject^("ADODB.Stream"^)                       >> %~dp0\download.vbs
echo adoStream.Open                                                     >> %~dp0\download.vbs
echo adoStream.Type = 1                                                 >> %~dp0\download.vbs
echo adoStream.Write http.ResponseBody                                  >> %~dp0\download.vbs
echo adoStream.Position = 0                                             >> %~dp0\download.vbs
echo.                                                                   >> %~dp0\download.vbs
echo Set fileSystem = CreateObject^("Scripting.FileSystemObject"^)        >> %~dp0\download.vbs
echo If fileSystem.FileExists^(target^) Then fileSystem.DeleteFile target >> %~dp0\download.vbs
echo adoStream.SaveToFile target                                        >> %~dp0\download.vbs
echo adoStream.Close                                                    >> %~dp0\download.vbs
echo.                                                                   >> %~dp0\download.vbs
cscript //Nologo %~dp0\download.vbs https://windows.php.net/downloadS/releases/archives/php-7.3.0-Win32-vc15-x86.zip %~dp0\php\php-7.3.0-Win32-vc15-x86.zip
del %~dp0\download.vbs

powershell.exe -nologo -noprofile -command "& { Add-Type -A 'System.IO.Compression.FileSystem'; [IO.Compression.ZipFile]::ExtractToDirectory('%~dp0\php\php-7.3.0-Win32-vc15-x86.zip', '%~dp0\php\'); }"
del %~dp0\php\php-7.3.0-Win32-vc15-x86.zip
) ELSE (
echo php - ok
)

IF not EXIST %~dp0\php\php.exe (
echo UNZIP %~dp0 php\php-7.3.0-Win32-vc15-x86.zip IN %~dp0 php\ FOLDER
)

IF not EXIST %~dp0\php\bin\ (
MD %~dp0\php\bin\
echo php\bin\ - folder first install
%~dp0\php\php.exe -r "copy('%~dp0\ReCodMod\functions\install\php.ini', '%~dp0\php\php.ini');"
)
 

IF EXIST %~dp0\win_cache_ms\ (
@echo.
echo Deleting folder, reinstall / Удаляем папку, переустановка:
RD /s %~dp0\win_cache_ms\
echo win_cache_ms - ok 
) ELSE (
MD %~dp0\win_cache_ms\
echo win_cache_ms\functions\ - first install
)

IF EXIST %~dp0\win_cache_ms\functions\ (
echo win_cache_ms\functions\ - ok 
) ELSE (
MD %~dp0\win_cache_ms\functions\
echo win_cache_ms\functions\ - first install
)
 
@echo.
setlocal enableDelayedExpansion
for /F "tokens=1,2,3,4 delims=;" %%A in  (%~dp0\cfg\servers.cfg) do (
 
  
break>%~dp0\s.tmp
cmd.exe /c "title="RCM V.9 [SERVER %%A:%%B]" & tasklist /v /fo csv | findstr /i "cmd.exe" >> "%~dp0\s.tmp"

 
FOR /f "tokens=1,2,3,4,5,6,7,8,9 delims=," %%a IN (%~dp0\s.tmp) do (

set "server_pid=%%b"
set "server_status=%%f"
set "server_title=%%i"
)



@echo.

IF EXIST %~dp0\go_%%A_%%B.bat (
echo go_%%A_%%B.bat - ok 
) ELSE (
@echo ******** INSTALL go_%%A_%%B.bat ********
@echo ^@echo off >> %~dp0\go_%%A_%%B.bat
@echo ^color 0A >> %~dp0\go_%%A_%%B.bat
@echo ^ title RCM V.6.2 ^[SERVER %%A:%%B^]>> %~dp0\go_%%A_%%B.bat 
@echo ^ .\php\php.exe -f win_cache_ms\functions\cleaner_%%A_%%B.php >> %~dp0\go_%%A_%%B.bat 
@echo ^ :1 >> %~dp0\go_%%A_%%B.bat 
@echo ^ .\php\php.exe -f win_cache_ms\go_%%A_%%B.php >> %~dp0\go_%%A_%%B.bat 
@echo ^ goto 1 >> %~dp0\go_%%A_%%B.bat
)

@echo.

IF EXIST %~dp0\win_cache_ms\go_%%A_%%B.php (
echo win_cache_ms\go_%%A_%%B.php - ok 
) ELSE (
@echo ******** INSTALL win_cache_ms\go_%%A_%%B.php ********
 
@echo ^<^?php >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^function hxh^($sc^) >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^{ >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^$sc ^= str_replace^(array^( >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^"win_cache_ms/go_%%A_%%B.php^", ^"win_cache_ms\go_%%A_%%B.php^", ^"win_cache_ms\\go_%%A_%%B.php^", ^"win_cache_ms//go_%%A_%%B.php^" >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^), ^"^", $sc^); >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^  return $sc . ^"^"; >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^} >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo ^$cpath = hxh^(__FILE__^); >> %~dp0\win_cache_ms\go_%%A_%%B.php 
@echo header^(^"Content-Type: text/html; charset^=UTF-8^"^); >> %~dp0\win_cache_ms\go_%%A_%%B.php
@echo error_reporting^(E_ALL^);  >> %~dp0\win_cache_ms\go_%%A_%%B.php
@echo ini_set^(^"ignore_repeated_errors^", TRUE^); ini_set^(^"display_errors^", TRUE^); ini_set^(^"log_errors^", TRUE^); ini_set^(^"error_log^", $cpath.^"ReCodMod/php-all-errors.log^"^);>> %~dp0\win_cache_ms\go_%%A_%%B.php
@echo $server_ip ^= "%%A"; $server_port ^= "%%B"^; $server_rconpass = "%%C"; $mplogfile ^= "%%D"^; $server_port ^= trim^(^$server_port^)^; require $cpath."w.php"^;>> %~dp0\win_cache_ms\go_%%A_%%B.php
)


@echo.

IF EXIST %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php (
echo win_cache_ms\functions\cleaner_%%A_%%B.php - ok 
) ELSE (
@echo ******** INSTALL win_cache_ms\functions\cleaner_%%A_%%B.php ********
 
@echo ^<^?php >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 

@echo ^function hxhn^($sc^) >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php  
@echo ^{ >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo ^$sc ^= str_replace^("win_cache_ms/functions/cleaner_%%A_%%B.php^", ^"^", $sc^); >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
@echo ^$sc ^= str_replace^("win_cache_ms\functions\cleaner_%%A_%%B.php^", ^"^", $sc^); >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo ^$sc ^= str_replace^("win_cache_ms//functions//cleaner_%%A_%%B.php", ^"^", $sc^); >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo ^$sc ^= str_replace^("win_cache_ms\\functions\\cleaner_%%A_%%B.php", ^"^", $sc^); >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo ^  return $sc . ^"^"; >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo ^} >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo ^$cpath = hxhn^(__FILE__^); >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php 
@echo header^(^"Content-Type: text/html; charset^=UTF-8^"^); >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
@echo error_reporting^(E_ALL^);  >> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
@echo ini_set^(^"ignore_repeated_errors^", TRUE^); ini_set^(^"display_errors^", TRUE^); ini_set^(^"log_errors^", TRUE^); ini_set^(^"error_log^", $cpath.^"ReCodMod/php-all-errors.log^"^);>> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
@echo $server_ip ^= "%%A"; $server_port ^= "%%B"^; $server_rconpass = "%%C"; $mplogfile ^= "%%D"^; $server_port ^= trim^(^$server_port^)^;>> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
@echo ^echo ^" ^======^> %%A_%%B cleaner.php loaded successfully \n^";>> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
@echo ^require $cpath . ^"ReCodMod/functions/cleaner.php^";>> %~dp0\win_cache_ms\functions\cleaner_%%A_%%B.php
)


start %~dp0\go_%%A_%%B.bat


echo ******************************************
@echo.
@echo.
 
)

echo ******end******
