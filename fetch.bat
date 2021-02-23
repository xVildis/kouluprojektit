@echo off
IF exist ".\teht" (
	echo Removing old files
	rmdir /S /Q teht
)
echo Copying...
Xcopy /E /I O:\"Palvelut ja liiketalous"\"Eerikki Maula"\2008TiviPOk02_sasp .\teht\
echo Copying eerikki...
IF exist .\php\eerikki (
	echo Removing old examples
	rmdir /S /Q php\eerikki
)
Xcopy /E /I S:\eerikki\php .\php\eerikki\
echo Backing up for remote
IF exist *-backup.zip (
	echo Removing old backup
	del *-backup.zip
)
tar -c -f "%date%"-backup.zip *
move "%date%"-backup.zip C:\Users\viljami.sillanpaa\"OneDrive - Tampereen seudun toisen asteen koulutus"\backup

git add *
git commit -m "Backup %date%"
setlocal
:PROMPT
SET /P AREYOUSURE=Are you sure (Y/[N])?
IF /I "%AREYOUSURE%" NEQ "y" GOTO END
PAUSE
echo 100% sure???
PAUSE
echo alright last one, you sure???
PAUSE
git push
echo Done!

:END
endlocal
echo Not pushed to main

