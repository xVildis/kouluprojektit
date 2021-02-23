@echo off
echo [92mCopying teht...[37m
robocopy O:\\"Palvelut ja liiketalous"\\"Eerikki Maula"\2008TiviPOk02_sasp .\teht\

echo [92mCopying eerikki...[37m

robocopy S:\eerikki\php .\php\eerikki\
echo [92mBacking up for remote[37m
IF exist *-backup.zip (
	echo [92mRemoving old backup[37m
	del *-backup.zip
)
tar -c -f "%date%"-backup.zip *
move "%date%"-backup.zip C:\Users\viljami.sillanpaa\"OneDrive - Tampereen seudun toisen asteen koulutus"\backup

git add *
git commit -m "Backup %date%"
setlocal
:PROMPT
SET /P AREYOUSURE=[31mCommit? [37m ([31mY[37m/[92m[N][37m)?
IF /I "%AREYOUSURE%" NEQ "y" GOTO END
git commit 

SET /P AREYOUSURE2=[31mPush?[37m ([31mY[37m/[92m[N][37m)?
IF /I "%AREYOUSURE2%" NEQ "y" GOTO END

echo [93m100% sure???[37m
PAUSE

echo [93malright last one, you sure???[37m
PAUSE

git push
echo [92mDone![37m

:END
endlocal
echo [96mNot pushed to main[0m
PAUSE

