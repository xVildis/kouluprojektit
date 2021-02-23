@echo off


IF exist ".\teht" (
	echo Removing old files
	rmdir /S /Q teht
)
echo Copying...
Xcopy /E /I O:\"Palvelut ja liiketalous"\"Eerikki Maula"\2008TiviPOk02_sasp .\teht\

echo Copying eerikki...
IF exist .\php\eerikki (
	echo Removing old files
	rmdir /S /Q php\eerikki
)
Xcopy /E /I S:\eerikki\php .\php\eerikki\
echo Done!