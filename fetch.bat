@echo off
echo [92mCopying teht...[0m
robocopy O:\\"Palvelut ja liiketalous"\\"Eerikki Maula"\2008TiviPOk02_sasp .\teht\

echo [92mCopying eerikki...[0m

robocopy S:\eerikki\php .\php\eerikki\
echo [92mBacking up for remote[0m
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
SET /P AREYOUSURE=[91mAre you sure[0m ([91mY[0m/[92m[N][0m)?
IF /I "%AREYOUSURE%" NEQ "y" GOTO END
PAUSE

echo [93m100% sure???[0m
PAUSE

echo [93malright last one, you sure???[0m
PAUSE

git push
echo [92mDone![0m

:END
endlocal
echo [93mNot pushed to main[0m
PAUSE

