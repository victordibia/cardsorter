//Lets load the mongoose module in our program
var mongoose = require('mongoose');
var exports = module.exports = {};
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


exports.projects = projects;
