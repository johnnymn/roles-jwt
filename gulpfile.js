var gulp = require('gulp')
var exec = require('child_process').exec
var notifier = require('node-notifier')

/**
 * We use a gulp task to make PHP code PSR-2 Compliant
 *
 */
gulp.task('default', ['check-psr2'])

gulp.task('check-psr2', function () {
  exec('php php-cs-fixer.phar fix ./src --level=psr2 &&  php php-cs-fixer.phar fix ./tests --level=psr2'
  , function (err, stdout, stderr) {
    if (err) {
      console.log('An error ocurred')
    }
    console.log(stdout)
    notifier.notify({
      title: 'PHP PSR-2',
      message: 'PSR-2 code style checking executed'
    })
  })
})
