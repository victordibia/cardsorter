//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
//Lets connect to our database using the DB server URL.
mongoose.connect('mongodb://localhost/cardsorter');

var permissions = mongoose.model('permissions', {
    id: String,
    userid: String,
    projectid: String,
    accesstype: String,
    datecreated: Date
});
exports.permissions = permissions;
