module.exports = function(grunt) {
	var theme_name = 'branded';

	var global_vars = {
		theme_name: theme_name,
		theme_css: 'css',
		theme_scss: 'scss'
	}

	grunt.initConfig({
		global_vars: global_vars,
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				options: {
					outputStyle: 'expanded',
					lineNumbers: true,
					debugInfo: true,
					sourcemap: true,
					trace: true,
					sourcemap:true,
					includePaths: ['<%= global_vars.theme_scss %>', require('node-bourbon').includePaths]
				},
				files: {
					'<%= global_vars.theme_css %>/<%= global_vars.theme_name %>.css': '<%= global_vars.theme_scss %>/main.scss'
				}
			}
		},

		watch: {
			grunt: { files: ['Gruntfile.js'] },

			sass: {
				files: '<%= global_vars.theme_scss %>/**/*.scss',
				tasks: ['sass'],
				sourceComments: 'normal',
				options: {
					livereload: true
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('build', ['sass']);
	grunt.registerTask('default', ['build','watch']);
}