var job = require('./controllers/job');
var member = require('./controllers/member');
module.exports = function (app) {
  app.get('/job', job.get);
  app.post('/job', job.post);
  app.post('/member', member.post);
  app.get('/member', member.get);
};
