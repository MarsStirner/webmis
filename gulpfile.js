var gulp = require('gulp');
var compass = require('gulp-compass');
var clean = require('gulp-clean');
var zip = require('gulp-zip');
var filter = require('gulp-filter');
var git = require('git-rev');
var Q = require('q');
var moment = require('moment');


var gitBranchPromise = function () {
    var deferred = Q.defer();

    git.branch(function (branchName) {
        deferred.resolve(branchName);
    });

    return deferred.promise;
};


gulp.task('sass', function () {
    return gulp.src('./sass/*.scss')
        .pipe(compass())
        .pipe(filter('!**/*.scss'))
        .pipe(gulp.dest('./css'));
});


gulp.task('clean-dist', function () {
    return gulp.src('./dist/*', {
        read: false
    }).pipe(clean());
});


gulp.task('zip-build', function () {
    var buildDate = moment().format('DDMMYYYY');

    return gitBranchPromise().then(function (branchName) {
        var buildName = branchName + '-' + buildDate;
        return gulp.src(['css/**/*',
            'docs/**/*',
            'api/**/*',
            'font/**/*',
            'images/**/*',
            'js/**/*',
            'lib/**/*',
            'pdf/**/*',
            '.htaccess',
            'index.html',
            'proxy.php'
        ])
            .pipe(zip(buildName + '.zip'))
            .pipe(gulp.dest('dist'));
    });

});


gulp.task('default', function () {
    gulp.run('sass');
});


gulp.task('build', function () {
    gulp.run('sass', 'clean-dist', 'zip-build');
});
