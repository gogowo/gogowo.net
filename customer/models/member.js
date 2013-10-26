var model = require('./model');
exports.getList = function(callback){
  model.execute('select * from pre_common_member where uid<?', [10] , function(err, results, fields){
    callback(err, results, fields);
  });
}
