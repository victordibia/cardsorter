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


var constructs = mongoose.model('constructs', {
	id: String,
	title: String,
	code: String,
	parentid : String,
	projectid: String,
	datecreated: Date
});


var items = mongoose.model('items', {
	id: String,
	title: String,
	code: String,
	constructid : String,
	projectid: String,
	datecreated: Date
});

var responses = mongoose.model('responses', {
	id: String,
	userid: String,
	itemid: String,
	constructid : String,
	responsestatus: String,
	responsetype: String,               // training or real
	datecreated: Date
});

var permissions = mongoose.model('permissions', {
	id: String,
	userid: String,
	projectid: String,
	accesstype : String,
	datecreated: Date
});



exports.projects = projects ;
exports.constructs = constructs ;
exports.items = items ;
