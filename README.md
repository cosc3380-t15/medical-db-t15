# medical-db-t15

**Webapp location**: https://medical-db-team15.herokuapp.com/
Deployed using Heroku, MySQL hosted on PC, and Github with html/css/js frontend and php backend (no frameworks).

All entities in the system have a login, but three examples are:
- Patient Account:
**Username**: test@example.org
**Password**: password

- Doctor Account:
**Username**: nolan@clinico.org
**Password**: nolan1234

- Admin Account:
**Username**: admin
**Password**: admin1234
Plus any account that is created by a user of the webapp.

The 11 sample doctors we have loaded can all be logged into with **'lastname'@clinico.org** and **'lastname'1234**
Any ID's present in data editing forms are read-only and only present for the purpose of demonstration and debugging. In a real application, the necessary ID boxes would be removed.

To refresh the 80 random patients, log in as an Admin and click "New Random Data" under "Records". This file is only active when the user is logged in as an administrator for security reasons. The patient information listed above will be retained along with two other users, but all other user-created accounts that were made since the last data refresh will be dropped.

The three (or four) triggers that we have are repeating_appt, max_capacity, max_capacity2, and no_patient which can be found in the sql dump file in the /backend subdirectory.

Any changes to 'main' will automatically redeploy the webapp once Heroku resolves OAuth conflicts.
If the database is not loading, contact Michael Summers. The SQL server is hosted on his PC for the time being, but will eventually be migrated to Azure.