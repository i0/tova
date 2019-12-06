Vue.filter('formatSecond', function (value) {
  return !value ? '-' : value.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + 's';
});
