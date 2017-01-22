var express = require('express');
var router = express.Router();
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;
var usermodel = require('../datamodels/user');
//var flash = require('connect-flash');
var session = require('express-session');




// Get Homepage
// //Handles Every other page/url request
router.get("/", function(req, res) {
    res.render('index', {
        title: "bingoo is big girl"
    });
});

router.get("/login", function(req, res) {
    res.render('login', {});
});

router.get('/projects', ensureAuthenticated, function(req, res) {
    res.render('projects');
});

// Setup login strategy using passport
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;

router.use(passport.initialize());
router.use(passport.session());


router.post('/login',
    passport.authenticate('local', {
        successRedirect: '/projects',
        failureRedirect: '/',
        failureFlash: true
    })
);



passport.use(new LocalStrategy({
        usernameField: 'email',
        passwordField: 'password'
    },
    function(username, password, done) {
        usermodel.users.findOne({
            username: username
        }, function(err, user) {

            if (err) {
                return done(err);
            }
            if (!user) {
                return done(null, false, {
                    message: 'Incorrect username.'
                });
            }
            usermodel.comparePassword(password, user.password, function(err, isMatch) {
                if (err) throw err;
                if (isMatch) {
                    return done(null, user);
                } else {
                    return done(null, false, {
                        message: 'Invalid password'
                    });
                }
            });
        });
    }
));

passport.serializeUser(function(user, done) {
    done(null, user._id);
});

passport.deserializeUser(function(id, done) {
    usermodel.getUserById(id, function(err, user) {
        done(err, user);
    });
});

function ensureAuthenticated(req, res, next) {
    if (req.isAuthenticated()) {
        return next();
    } else {
        //req.flash('error_msg', 'You are not logged in');
        console.log("you are not logged in")
        res.redirect('/');
    }
}

module.exports = router;
