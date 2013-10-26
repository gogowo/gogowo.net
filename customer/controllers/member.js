var memberModel = require('../models/member');
exports.post = function(req, res){
  memberModel.insert(function(err,rusult){
    res.send(result);
  });
}
exports.get = function(req, res, next){
  memberModel.getList(function(err, results, fields){
    if(err){
      return next(err);
    }
    //console.log(result);
    return res.json(results);
  });
  //res.send("respond with a resourcessssssssssssssssssss");
};
