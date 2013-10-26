var mysql = require('mysql');
var pool = mysql.createPool({
  host     : '172.16.5.112',
  user     : 'root',
  password : '123456',
  database : 'discuz_x2'
});
exports.execute = function(sql, args,callback){
  pool.getConnection(function(err, db) {
    if(err){
       callback(err);
    }
    db.execute(sql, args, function(err, results, fields) {
      callback(err, results, fields);
      db.end();
    });
  });
}
