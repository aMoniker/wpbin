module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        notify_hooks: {
            options: {
                enabled: true,
                title: '[WPBin]'
            }
        },
        notify: {
            css: {
                options: {
                    title: '[WPBin] CSS',
                    message: 'compass compilation'
                }
            },
            js: {
                options: {
                    title: '[WPBin] JS',
                    message: 'javascript compiled'
                }
            }
        },
        compass: {
            dist: {
                options: {
                    config: 'config.rb'
                }
            }
        },
        uglify: {
            main: {
                files: {
                    'js/wpbin.min.js': [
                        'bower_components/modernizr/modernizr.js',
                        'bower_components/jquery/dist/jquery.js',
                        'bower_components/prism/prism.js',
                        // 'bower_components/foundation/js/foundation.abide.js',
                        // 'bower_components/foundation/js/foundation.accordion.js',
                        // 'bower_components/foundation/js/foundation.alert.js',
                        // 'bower_components/foundation/js/foundation.clearing.js',
                        // 'bower_components/foundation/js/foundation.dropdown.js',
                        // 'bower_components/foundation/js/foundation.equalizer.js',
                        // 'bower_components/foundation/js/foundation.interchange.js',
                        // 'bower_components/foundation/js/foundation.joyride.js',
                        // 'bower_components/foundation/js/foundation.js',
                        // 'bower_components/foundation/js/foundation.magellan.js',
                        // 'bower_components/foundation/js/foundation.offcanvas.js',
                        // 'bower_components/foundation/js/foundation.orbit.js',
                        // 'bower_components/foundation/js/foundation.reveal.js',
                        // 'bower_components/foundation/js/foundation.slider.js',
                        // 'bower_components/foundation/js/foundation.tab.js',
                        // 'bower_components/foundation/js/foundation.tooltip.js',
                        // 'bower_components/foundation/js/foundation.topbar.js',
                    ]
                },
                options: {
                    sourceMap: 'wpbin.min.js.map',
                    beautify: {
                        beautify: true,
                        ascii_only: true
                    }
                }
            },
            ie: {
                files: {
                    'js/iehack.min.js': [
                        'bower_components/html5shiv/dist/html5shiv.min.js',
                        'bower_components/respond/dest/respond.min.js',
                    ]
                },
                options: {
                    sourceMap: 'wpbin-ie.min.js.map',
                    beautify: {
                        beautify: false,
                        ascii_only: true
                    }
                }
            }
        },
        watch: {
            scss: {
                files: ['sass/**/*.scss'],
                tasks: ['compile-sass']
            },
            css: {
                files: ['css/**/*.css'],
                options: {
                    livereload: true
                }
            },
            scripts: {
                files: [
                    'Gruntfile.js',
                    'js/**/*.js',
                    '!js/wpbin.min.js',
                    '!js/iehack.min.js'
                ],
                tasks: ['compile-js']
            },
            minscripts: {
                files: ['js/wpbin.min.js'],
                options: {
                    livereload: true
                }
            },
            etc: {
                files: [
                    '../app/{,**}/*.php',
                    '../app/views/{,**}/*.twig'
                ],
                options: {
                    livereload: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-notify');
    
    grunt.task.run('notify_hooks');
    grunt.registerTask('compile-sass', ['compass', 'notify:css']);
    grunt.registerTask('compile-js', ['uglify', 'notify:js']);
    grunt.registerTask('default', ['watch']);
};