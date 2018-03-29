module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    //Describe each task
    concat : {
      dist: {
        src: [
          'public/js/main.js'
        ],
        dest: 'public/js/prod/concat.js'
      }
    },

    babel: {
      options: {
          sourceMap: false,
          presets: ['env']
      },
    dist: {
      files: {
                'public/js/prod/production.js' : 'public/js/prod/concat.js'
          }
      }
    },

    uglify : {
      build: {
        src: 'public/js/prod/production.js',
        dest: 'public/js/prod/production.min.js'
      }
    },
    sass: {
      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'none',
          debugInfo : true,
          noCache: true
        },
        files : {
          'public/css/main.css' : 'public/css/sass/main.scss'
        }
      }
    },

    postcss: {
      options: {
        map: false,
        processors: [
          require('autoprefixer')({browsers: 'last 2 versions'}),
        ]
      },
      dist: {
        src: 'public/css/main.css'
      }
    },
    imagemin: {
          dynamic: {
              files: [{
                  expand: true,
                  cwd: 'images/',
                  src: ['*.{png,jpg,gif}'],
                  dest: 'images/prod/'
              }]
          }
      },

    watch : {
      scripts : {
        files : ['public/js/main.js'],
        tasks : ['concat', 'babel', 'uglify'],
        options : {
          spawn : false
        }
      },
      sass: {
        files: ['public/css/sass/*.scss'],
        tasks: ['sass','postcss'],
        options: {
            spawn: false,
        }
      },
      images: {
        files: ['public/images/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
        options: {
            spawn: false,
        }
      }
    }
  });

  //Plugis used in the task
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify-es');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');

  //Tasks performs when grunt run
  grunt.registerTask('default', ['concat', 'babel', 'uglify', 'sass', 'watch', 'imagemin']);
};
