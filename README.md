## RCM-Admintool-V9
# RECODMOD-V9/0.7.2 (14/09/2020)

- Stable RECODMOD admintool version 9  ->  JUNE 20, 2020
- Stable RECODMOD stats web and ADMIN TOOL version 9  ->  https://github.com/EXRecod/CODBoX
--------------------------------------------------------

- PHP: 5.6 < 7.2 (After 7.2 version not working)

For Linux need install php extensions: php-fpm php-pear php-dev php-common php-fpm php-gd php-cli php-mbstring php-curl php-gd php-gettext php-intl php-mbstring php-sqlite3 php-mysql php-pear php-pspell php-recode php-xml php-zip

- In game .cfg

set g_logsync 2

set logfile 1

set sv_log_damage 1

set g_antilag 1



### How?: 
- Русский: Установка; https://github.com/EXRecod/RCM-Admintool-V9/wiki/Install_rus 
- Как обновить: заменяем эти 3 папки с архива https://github.com/EXRecod/RCM-Admintool-V9/tree/master/ReCodMod  на свои со всем содержимым в них.

- English: How install; https://github.com/EXRecod/RCM-Admintool-V9/wiki/How-Install
- How update: replace this 3 folders from archive https://github.com/EXRecod/RCM-Admintool-V9/tree/master/ReCodMod  to yours with all files from this 3 folders.




# HIDE MESSAGES Support CoDaM CodCommands 2.3 [cod1 1.1

Open __CoDaM_CodCommands.pk3 and in file callback.gsc 

+ find

self playerMsg( level.cocoColor + "Command not found: ^7" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ));

+ add after that line - this 2 lines

    printconsole("say;0;" + self.getEntityNumber() + ";" + self.name + ";" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ) + "\n");

    logPrint("say;0;" + self.getEntityNumber() + ";" + self.name + ";" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ) + "\n");

# HIDE MESSAGES b3hide FOR Call OF Duty 4 X 1.8 - Modern Warfare



+ download -> https://bitbucket.org/msgaming/cod4x_b3hide/downloads

+ b3hide.so place in  ->  call of duty 4/plugins/

+ in main server configuration   .cfg

loadplugin "b3hide"

b3Hide "1"

b3Prefix "!"

b3HideLvl "0" 





### Support:
- RUS https://kwork.ru/website-repair/15260745/skripty-php-s-msql-na-vashem-sayte

- ENG https://kwork.ru/website-revision/15264676/website-loading-speed-optimization

- New version RECODMOD V9 not compatible with old RECODMOD versions 
-    and not compatible with old WEB RECODMOD versions!!
--------------------------------------------------------
--------------------------------------------------------
