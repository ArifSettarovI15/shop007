module.exports = {
    fonts: {
        files : [
            {
                expand : true,
                cwd : 'src/fonts',
                src : '**',
                dest : 'build/fonts'
            }
        ]
    },
    vendors: {
        files : [
            {
                expand : true,
                cwd : 'bower_components',
                src : '**',
                dest : '../assets/vendors'
            },
            {
                expand : true,
                cwd : 'src/js/vendors',
                src : 'tinymce/**',
                dest : '../assets/vendors'
            }
        ]
    },
    deploy: {
        files : [
            {
                cwd: 'build',
                expand : true,
                src : '**',
                dest : '../assets/'
            }
        ]
    }
};