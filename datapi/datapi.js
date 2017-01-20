/***************
 * Author: Victor Dibia
 * victor.dibia@gmail.com
 * victordibia.com
 *
 * This file handles Data Retrieval Functions
 * URl paths for data manipulation (create, delete)
 */

var express = require('express');
var router = express.Router();
var usermodel = require('./user');
//var datagen = require("./datagen")

// middleware specific to this router
router.use(function timeLog(req, res, next) {
    //console.log('Time: ', Date.now());
    next();
});

var bodyParser = require('body-parser');
router.use(bodyParser.json());

router.get("/constructs/all/", function(req, res) {
    res.json("videodata");
});


module.exports = router;
