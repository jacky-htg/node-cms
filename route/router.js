const HomeController = require('../controllers/HomeController')
const UserController = require('../controllers/UserController')

module.exports = function(app){
    app.get('/', HomeController.Index)
    app.get('/login', UserController.LoginForm)
    app.post('/login', UserController.Login)
    app.get('/logout', UserController.Logout)
}
