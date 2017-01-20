//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
//Lets connect to our database using the DB server URL.
mongoose.connect('mongodb://localhost/cardsorter');

var constructs = mongoose.model('constructs', {
    id: String,
    title: String,
    code: String,
    parentid: String,
    projectid: String,
    datecreated: Date
});

exports.constructs = constructs;
