//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
//Lets connect to our database using the DB server URL.
mongoose.connect('mongodb://localhost/cardsorter');

var responses = mongoose.model('responses', {
    id: String,
    userid: String,
    itemid: String,
    constructid: String,
    responsestatus: String,
    responsetype: String, // training or real
    datecreated: Date
});
exports.responses = responses;
