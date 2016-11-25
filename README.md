mssql-vagrant
---

# HOW TO USE

```sh
$ git clone https://github.com/kaz29/mssql-vagrant.git
$ cd mssql-vagrant
$ vagrant up
...
$ vagrant ssh


$ sudo /opt/mssql/bin/sqlservr-setup
Microsoft(R) SQL Server(R) Setup

You can abort setup at anytime by pressing Ctrl-C. Start this program
with the --help option for information about running it in unattended
mode.

The license terms for this product can be downloaded from
http://go.microsoft.com/fwlink/?LinkId=746388 and found
in /usr/share/doc/mssql-server/LICENSE.TXT.

Do you accept the license terms? If so, please type "YES": YES

Please enter a password for the system administrator (SA) account:
Please confirm the password for the system administrator (SA) account:

Setting system administrator (SA) account password...

Do you wish to start the SQL Server service now? [y/n]: y
Do you wish to enable SQL Server to start on boot? [y/n]: y
Created symlink from /etc/systemd/system/multi-user.target.wants/mssql-server.service to /lib/systemd/system/mssql-server.service.
Created symlink from /etc/systemd/system/multi-user.target.wants/mssql-server-telemetry.service to /lib/systemd/system/mssql-server-telemetry.service.

Setup completed successfully.

$ sqlcmd -S localhost -U SA -P '<YourPassword>'
1> SELECT Name from sys.Databases;
2> GO
Name
--------------------------------------------------------------------------------------------------------------------------------
master
tempdb
model
msdb

(4 rows affected)
1> quit
```

See - https://docs.microsoft.com/ja-jp/sql/linux/sql-server-linux-get-started-tutorial