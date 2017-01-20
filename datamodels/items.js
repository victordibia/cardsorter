//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
//Lets connect to our database using the DB server URL.
mongoose.connect('mongodb://localhost/cardsorter');

var items = mongoose.model('items', {
    id: String,
    title: String,
    code: String,
    constructid: String,
    projectid: String,
    datecreated: Date
});
exports.items = items;
