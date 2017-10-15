const HomeController = require('../controllers/HomeController')
const UserController = require('../controllers/UserController')
const CityController = require('../controllers/CityController')
const GroupController = require('../controllers/GroupController')

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

    app.get('/cities', CityController.Index)
    app.get('/cities/create', CityController.CreateForm)
    app.post('/cities/create', CityController.Create)
    app.get('/cities/edit/:id', CityController.EditForm)
    app.put('/cities/edit/:id', CityController.Edit)
    app.delete('/cities/delete/:id', CityController.Delete)

    app.get('/groups', GroupController.Index)
    app.get('/groups/create', GroupController.CreateForm)
    app.post('/groups/create', GroupController.Create)
    app.get('/groups/edit/:id', GroupController.EditForm)
    app.put('/groups/edit/:id', GroupController.Edit)
    app.delete('/groups/delete/:id', GroupController.Delete)
    //app.get('/groups/grant/:id', GroupController.GrantForm)

}
