//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
var bcrypt = require('bcryptjs');
//Lets connect to our database using the DB server URL.
mongoose.connect('mongodb://localhost/cardsorter');


var users = mongoose.model('users', {
    username: String,
    email: String,
    firstname: String,
    lastname: String,
    password: String,
    datecreated: Date
});
exports.users = users;

// Helper Functions

module.exports.createUser = function(newuser, callback) {
    bcrypt.genSalt(10, function(err, salt) {
        bcrypt.hash(newuser.password, salt, function(err, hash) {
            newuser.password = hash;
            console.log("saving new user hash ", hash)
            newuser.save(callback);
        });
    });
}

module.exports.comparePassword = function(candidatePassword, hash, callback) {
    bcrypt.compare(candidatePassword, hash, function(err, isMatch) {
        if (err) throw err;
        callback(null, isMatch);
    });
}

module.exports.getUserByUsername = function(username, callback) {
    var query = {
        username: username
    };
    users.findOne(query, callback);
}

module.exports.getUserById = function(id, callback) {
    users.findById(id, callback);
}

exports.deleteAllUsers = function() {
    users.remove({}, function(err) {
        if (err) return handleError(err);
        console.log("All users deleted")
    });
}
