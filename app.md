
Additional details on the App Structure
===================


|Folder| Description  | Comments   |
|---|---|---|
| routes  | Contains routing logic for each important aspect of the application. For example the `auth` folder contains routing logic for login and logout. `projects` folder contains routing logic for both projects related calls.   |   |
| views  | Contains UI for the app interface. The goal is to divide each UI interface into modular parts - `header`, `body`, `footer`. Each page will have similar header and footer but distinct bodies. The `\views\body` contains UI elements for each page's body. Furthermore the goal here is also to use as much template formatting ([pug](https://pugjs.org/)) so as to pass parameters directly used in rendering each UI page.  |   |
|  public | Contains files that can be accessed publicly. Examples include css, js, img files used in rendering the UI pages.  |   |
|  datamodels | Contains datamodels for the different database entities used by the app. For example users.js models the database schema used to keep track of user data.  |   |

License
-------
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

cardSORTER is an open source project by [Victor Dibia](https://victordibia.com) that is licensed under [MIT](http://opensource.org/licenses/MIT). I reserve the right to change the license of future releases.
