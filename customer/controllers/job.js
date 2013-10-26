exports.get = function(req, res){
  res.send('aaa');
}
exports.post = function(req, res){
  res.send('aaa'+req.body.password + req.body.email);
}
