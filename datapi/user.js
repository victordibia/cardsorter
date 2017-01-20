//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
var bcrypt = require('bcryptjs');
//Lets connect to our database using the DB server URL.
mongoose.connect('mongodb://localhost/cardsorter');


/**
 * [projects description]
 * @type {[type] construct | items | video }
 */
var projects = mongoose.model('projects', {
    id: String,
    title: String,
    type: String,
    description: String,
    datecreated: Date
});





var items = mongoose.model('items', {
    id: String,
    title: String,
    code: String,
    constructid: String,
    projectid: String,
    datecreated: Date
});

var responses = mongoose.model('responses', {
    id: String,
    userid: String,
    itemid: String,
    constructid: String,
    responsestatus: String,
    responsetype: String, // training or real
    datecreated: Date
});

var permissions = mongoose.model('permissions', {
    id: String,
    userid: String,
    projectid: String,
    accesstype: String,
    datecreated: Date
});

var users = mongoose.model('users', {
    id: String,
    username: String,
    email: String,
    firstname: String,
    lastname: String,
    password: String,
    datecreated: Date
});



exports.projects = projects;
exports.items = items;
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
    User.findOne(query, callback);
}

module.exports.getUserById = function(id, callback) {
    User.findById(id, callback);
}
