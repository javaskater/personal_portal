module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-postcss');
    //https://github.com/postcss/autoprefixer
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.initConfig({

        postcss: {
            options: {
                map: false,
                processors: [
                    require('autoprefixer')({
                        // browsers: [
                        //     "Android 2.3",
                        //     "Android >= 4",
                        //     "Chrome >= 20",
                        //     "Firefox >= 24",
                        //     "Explorer >= 8",
                        //     "iOS >= 6",
                        //     "Opera >= 12",
                        //     "Safari >= 6"
                        // ],
                        browsers: ["last 2 versions"]

                    })
                ]
            },
            dist: {
                src: 'css/styles.css'
            }
        },

        //grunt-contrib-sass https://www.npmjs.com/package/grunt-contrib-sass
        //Compile Sass to css
        sass: {              // Task 
            dist: {            // Target 
                    options: {    // Target options 
                        style: 'expanded',
                        precision: 8, // How many digits of precision to use when outputting decimal numbers.
                        lineNumbers: true //Emit comments in the generated CSS indicating the corresponding source line.
                    },
                    files: { // Dictionary of files
                          // 'destination': 'source' 
                        'css/bootstrap-compile.css': 'bower_components/bootstrap/scss/bootstrap.scss', 
                        'css/styles.css': 'scss/styles.scss'
                    }
                },
            prod_dist: {            // Target 
                 options: {    // Target options 
                    style: 'compressed',
                    precision: 8, // How many digits of precision to use when outputting decimal numbers.
                    lineNumbers: false //Emit comments in the generated CSS indicating the corresponding source line.
                 },
                 files: { // Dictionary of files
                          // 'destination': 'source'
                    'css/styles.css': 'scss/styles.scss'
                }
            }
        },

        watch: {
            styles: {
                files: ['scss/**/*.scss'],
                tasks: ['compile']
            }
        }

      
    });

    grunt.registerTask('prefix',['postcss:dist']);
    grunt.registerTask('compile',['sass:dist']);
    grunt.registerTask('package',['sass:prod_dist']);
    //grunt.registerTask('default',['watch']);
};