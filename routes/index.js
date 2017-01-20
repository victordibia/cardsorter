var express = require('express');
var router = express.Router();
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;
var usermodel = require('../datapi/user');
var flash = require('connect-flash');
var session = require('express-session');

router.use(session({
    secret: 'secret',
    saveUninitialized: true,
    resave: true
}));

// Connect Flash
router.use(flash());
// Global Vars
router.use(function(req, res, next) {
    res.locals.success_msg = req.flash('success_msg');
    res.locals.error_msg = req.flash('error_msg');
    res.locals.error = req.flash('error');
    res.locals.user = req.user || null;
    next();
});

// Get Homepage
// //Handles Every other page/url request
router.get("/", function(req, res) {
    res.render('index', {});
});

router.get('/constructs', ensureAuthenticated, function(req, res) {
    res.render('index');
});

// Setup login strategy using passport
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;
router.use(passport.initialize());
router.use(passport.session());


router.post('/login',
    passport.authenticate('local', {
        successRedirect: '/',
        failureRedirect: '/loginfail',
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
            console.log(user, username, password)
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
    done(null, user.id);
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
        //req.flash('error_msg','You are not logged in');
        res.redirect('/users/login');
    }
}

module.exports = router;
