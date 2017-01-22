/**
 * Author : Victor Dibia
 * description : Generate Sample data
 */

var usermodel = require('./users');

//createUser();

function createUser() {
    usermodel.deleteAllUsers();
    var newuser = new usermodel.users({
        firstname: "Admin",
        email: "admin@admin.com",
        username: "admin@admin.com",
        password: "password"
    });

    usermodel.createUser(newuser, function(err, user) {
        if (err) throw err;
        console.log("new user created", user);
    });

}
