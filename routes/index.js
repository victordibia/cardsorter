var express = require('express');
var router = express.Router();
var projects = require("./projects")
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;
var usermodel = require('../datamodels/user');
var session = require('express-session');




// Get Homepage
// //Handles Every other page/url request
router.get("/", function(req, res) {
    res.render('index', {
        title: "bingoo is big girl",
        user: {
            name: "Graziado",
            authenticated: req.isAuthenticated()
        }
    });
    console.log("authenticated .. " + req.isAuthenticated());
});
module.exports = router;
