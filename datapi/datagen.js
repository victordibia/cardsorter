/**
 * Author : Victor Dibia
 * description : Generate Sample data
 */

var usermodel = require('./user');

createUser();

function createUser() {
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
