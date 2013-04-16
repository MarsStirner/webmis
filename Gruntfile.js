module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		compass: { // Task
			dist: { // Target
				options: { // Target options
					sassDir: 'sass',
					cssDir: 'css',
					outputStyle: 'compressed',
					force: true,
					environment: 'production'
				}
			},
			dev: { // Another target
				options: {
					sassDir: 'sass',
					cssDir: 'css',
					raw: 'output_style:nested'
				}
			}
		},
		watch: {
			scss: {
				files: ['sass/*.scss', 'sass/**/*.scss'],
				tasks: ['compass:dev'],
				options: {
					nospawn: true
				}
			}
		},
		clean: {
			build: ["build"]
		},
		copy: {
			build: {
				files: [{
					src: ['css/**', 'font/**', 'images/**', 'js/**', 'pdf/**', 'index.html', 'proxy.php', '.htaccess'],
					dest: 'build/'
				}]
			}
		}
		// ,compress: {
		// 	build: {
		// 		options: {
		// 			archive: 'build.zip',
		// 			mode: 'zip',
		// 			level: 5
		// 		},
		// 		files: [{
		// 			expand: true,
		// 			cwd: 'build/',
		// 			src: '**',
		// 			dest: '<%= pkg.name %>-<%= pkg.version %>/'
		// 		}]
		// 	}
		// }
	});

	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-compress');


	grunt.registerTask('default', ['watch:scss']);

	//grunt.registerTask('dev', ['watch:scss']);

	grunt.registerTask('build', ['clean:build', 'compass:dist', 'copy:build']);



}
