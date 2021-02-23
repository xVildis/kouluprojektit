@echo off
echo [92mCopying teht...[33m
robocopy O:\\"Palvelut ja liiketalous"\\"Eerikki Maula"\2008TiviPOk02_sasp .\teht\

echo [92mCopying eerikki...[33m

robocopy S:\eerikki\php .\php\eerikki\
echo [92mBacking up for remote[33m
IF exist *-backup.zip (
	echo [92mRemoving old backup[33m
	del *-backup.zip
)
tar -c -f "%date%"-backup.zip *
move "%date%"-backup.zip C:\Users\viljami.sillanpaa\"OneDrive - Tampereen seudun toisen asteen koulutus"\backup

git add *
git commit -m "Backup %date%"
setlocal
:PROMPT
SET /P AREYOUSURE=[31mAre you sure[33m ([31mY[33m/[92m[N][33m)?
IF /I "%AREYOUSURE%" NEQ "y" GOTO END
PAUSE

echo [93m100% sure???[33m
PAUSE

echo [93malright last one, you sure???[33m
PAUSE

git push
echo [92mDone![33m

:END
endlocal
echo [93mNot pushed to main[0m
PAUSE

