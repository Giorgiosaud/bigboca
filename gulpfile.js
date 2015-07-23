var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
 config.appPath='/';
 elixir(function(mix) {
  mix.sass('style.scss').
  scripts([
      'vendor/jquery/jquery.js',
      'vendor/animateScroll/animateScroll.js',
      'vendor/bootstrap/bootstrap.min.js',
      'vendor/greensock/TweenMax.min.js',
      'vendor/greensock/plugins/ScrollToPlugin.min.js',
      'vendor/animateScroll/animateScroll.js',
      'vendor/modernizr/Modernizr.custom.min.js',
      'vendor/iscroll-probe/iscroll-probe.js',
      'vendor/scrollmagic/ScrollMagic.min.js',
      'vendor/scrollmagic/plugins/animation.gsap.min.js',
      'vendor/scrollmagic/plugins/debug.addIndicators.min.js',
      'vendor/bootstrap/bootstrap.min.js',
      'custom/customfunctions.js',
      'custom/scrollScripts.js',
      'custom/resizeScripts.js',
      'custom/ready.js',
      'custom/animations.js',

      ]);
});
