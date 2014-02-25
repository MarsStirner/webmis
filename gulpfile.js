var gulp = require('gulp');
var clean = require('gulp-clean');
var replace = require('gulp-replace');
var dateFormat = require('dateformat');
var runSequence = require('gulp-run-sequence');
var version = require('./package.json').version;
var buildDate = dateFormat(new Date(), 'dd.mm.yy.HH.MM');
var buildName = 'webmis-' + version + '-' + buildDate;
var buildDir = 'dist';
var packageDir = buildDir+'/'+buildName;


var filesToMove = ['css/**/*',
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
];

gulp.task('clean', function () {
    return gulp.src([buildDir + '/*'], {
        read: false
    }).pipe(clean());
});

gulp.task('buildName', function () {
    return gulp.src(['js/common.js'],{base:'./'})
        .pipe(replace(/var GUI_VERSION = "(\w+)"/g, 'var GUI_VERSION = "' + buildName + '"'))
        .pipe(gulp.dest(packageDir + '/'));
});
gulp.task('move', function () {
    return gulp.src(filesToMove, {
        base: './', read: true
    }).pipe(gulp.dest(packageDir));
});

gulp.task('default', function (cb) {
    runSequence('clean', 
                'move', 
                'buildName',
                cb);
});
