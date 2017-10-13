const HomeController = require('../controllers/HomeController')
const UserController = require('../controllers/UserController')

module.exports = function(app){
    app.get('/', HomeController.Index)
    app.get('/login', UserController.LoginForm)
    app.post('/login', UserController.Login)
    app.get('/logout', UserController.Logout)

    app.get('/users', UserController.Index)
    app.get('/users/create', UserController.CreateForm)
    app.post('/users/create', UserController.Create)
    app.get('/users/edit/:id', UserController.EditForm)
    app.put('/users/edit/:id', UserController.Edit)
    app.delete('/users/delete/:id', UserController.Delete)
}
